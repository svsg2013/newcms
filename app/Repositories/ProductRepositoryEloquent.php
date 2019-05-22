<?php

namespace App\Repositories;

use App\Models\ObjectMedia;
use App\Models\ProductBlock;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Product;
use App\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     *
     * Specify Validator class name
     *
     *
     * @return mixed
     */
    public function validator()
    {
        return ProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->withTranslation();
    }

    public function create(array $input)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_product'] = !empty($input['is_product']) ? 1 : 0;

        $product = $this->model->create($input);

        if (!empty($input['photos'])) {
            foreach ($input['photos'] as $value) {
                $product->createMedia($value);
            }
        }

        if (!empty($input['blocks'])) {
            $this->createBlocks($product, $input['blocks']);
        }

        if (!empty($input['metadata'])) {
            $product->metaCreateOrUpdate($input['metadata']);
        }

        $product->updateSlugTranslation();

        return $product;
    }

    public function update(array $input, $id)
    {
        $product = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_product'] = !empty($input['is_product']) ? 1 : 0;

        $product->update($input);

        if (!empty($input['photos'])) {
            foreach ($input['photos'] as $value) {
                $product->createMedia($value);
            }
        }

        //update old block
        if (!empty($input['old_blocks'])) {
            $this->updateBlocks($product, $input['old_blocks']);
        }

        // insert new block
        if (!empty($input['blocks'])) {
            $this->createBlocks($product, $input['blocks']);
        }

        if (!empty($input['metadata'])) {
            $product->metaCreateOrUpdate($input['metadata']);
        }

        if (!empty($input['delete_photos'])) {
            ObjectMedia::whereIn('id', $input['delete_photos'])->delete();
        }

        if (!empty($input['delete_blocks'])) {

            $blocks = $product->blocks()->whereIn('product_block.id', $input['delete_blocks'])->get();

            foreach ($blocks as $block) {
                if ($block->type === ProductBlock::TYPE_MULTI_PHOTOS) {
                    $block->medias()->delete();
                }
                $block->delete();
            }
        }

        $product->updateSlugTranslation();

        return $product;
    }

    public function delete($id)
    {
        $product = $this->model->findOrFail($id);

        //delete metadata
        $product->meta()->delete();

        $product->medias()->delete();

        foreach ($product->blocks as $block) {
            if ($block->type === ProductBlock::TYPE_MULTI_PHOTOS) {
                $block->medias()->delete();
            }
            $block->delete();
        }

        //delete
        $product->delete();
    }

    private function createBlocks($product, $blocks)
    {
        foreach ($blocks as $key => $value2) {
            $value2['product_id'] = $product->id;
            switch ($value2['type']) {
                case ProductBlock::TYPE_PHOTO_TRANSLATION:
                case ProductBlock::TYPE_CONTENT:
                    ProductBlock::create($value2);
                    break;

                case ProductBlock::TYPE_IMAGE_MAP:
                    $value2['image_map_id'] = !empty($value2['image_map']) ? $value2['image_map'] : null;
                    ProductBlock::create($value2);
                    break;

                case ProductBlock::TYPE_PHOTO:
                    $value2['path'] = !empty($value2['photo']) ? $value2['photo'] : null;
                    ProductBlock::create($value2);
                    break;

                case ProductBlock::TYPE_MULTI_PHOTOS:
                    $block = ProductBlock::create($value2);
                    if (!empty($value2['photos'])) {
                        $block->createMedia($value2['photos']);
                    }
                    break;
            }

        }
    }

    private function updateBlocks($product, $blocks)
    {
        foreach ($blocks as $key => $value2) {
            if (empty($value2['is_change'])) {
                continue;
            }

            $block = $product->blocks()->where('product_block.id', $key)->firstOrFail();
            switch ($block->type) {
                case ProductBlock::TYPE_PHOTO_TRANSLATION:
                case ProductBlock::TYPE_CONTENT:
                    $block->update($value2);
                    break;

                case ProductBlock::TYPE_IMAGE_MAP:
                    $value2['image_map_id'] = !empty($value2['image_map']) ? $value2['image_map'] : null;
                    $block->update($value2);
                    break;

                case ProductBlock::TYPE_PHOTO:
                    $value2['path'] = !empty($value2['photo']) ? $value2['photo'] : null;
                    $block->update($value2);
                    break;

                case ProductBlock::TYPE_MULTI_PHOTOS:
                    $block->update($value2);
                    if (!empty($value2['photos'])) {
                        $block->createMedia($value2['photos']);
                    }
                    break;
            }
        }
    }

    public function sortPhoto($positions)
    {
        $arr = explode('&', $positions);
        if ($arr && count($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                $_arr = explode('=', $arr[$i]);
                ObjectMedia::where('id', $_arr[0])->update(['position' => $_arr[1]]);
            }
        }
    }

    public function listProducts()
    {
        return $this->model->active()->requiredTranslation()
            ->withTranslation()
            ->orderBy('type', 'asc')
            ->orderBy('is_product', 'desc')
            ->orderBy('position', 'asc')
            ->get();
    }

    public function findBySlug($slug)
    {
        $locale = \App::getLocale();
        return $this->model->active()->requiredTranslation()
            ->isProduct()
            ->whereTranslation('slug', $slug, $locale)
            ->with('translations', 'blocks', 'meta')
            ->firstOrFail();
    }

    public function listProductsOther($id, $type = null)
    {
        $model = $this->model->active()->requiredTranslation()->isProduct();
        if ($type) {
            $model->where('type', $type);
        }
        return $model->where('id', '!=', $id)
            ->withTranslation()
            ->orderBy('position', 'asc')
            ->get();
    }

    public function search(array $input)
    {
        $model = $this->model->select('*', \DB::raw('"product" as table_type'))
            ->active()
            ->requiredTranslation()
            ->where(function ($q) use ($input) {
                if (!empty($input['key'])) {
                    $q->whereTranslationLike('name', '%' . $input['key'] . '%')
                        ->orWhereTranslationLike('information', '%' . $input['key'] . '%')
                        ->orWhereTranslationLike('classification', '%' . $input['key'] . '%')
                        ->orWhereTranslationLike('vase_life_market', '%' . $input['key'] . '%')
                        ->orWhereTranslationLike('note', '%' . $input['key'] . '%');
                }
            })
            ->withTranslation();
        if (!empty($input['status']) && $input['status'] == 'oldest') {
            $model->orderBy('id', 'asc');
        } else {
            $model->orderBy('id', 'desc');
        }

        return $model->limit(1000)->get();
    }
}
