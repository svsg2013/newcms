<?php

namespace App\Repositories;

use App\Models\ProductCategoryPhoto;
use App\Traits\UploadPhotoTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductCategoryRepository;
use App\Models\ProductCategory;
use App\Validators\ProductCategoryValidator;

/**
 * Class ProductCategoryRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class ProductCategoryRepositoryEloquent extends BaseRepository implements ProductCategoryRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductCategory::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return ProductCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function categoriesByParent($parent_id)
    {
        $model = $this->model->select("*")
            ->where('parent_id', $parent_id);
        return $model->orderBy('position', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    public function arrTreeCategories($parent_id)
    {
        $result = $this->categoriesByParent($parent_id);
        foreach ($result as $rs) {
            $rs->trees = $this->arrTreeCategories($rs->id);
        }
        return $result;
    }

    public function outTreeCategorySortTable($tree)
    {
        $string = '';
        if (empty($tree) || !$tree->count()) {
            $string .= '';
        } else {
            $string .= '<ul class="list-unstyled sortable-categories">';
            foreach ($tree as $rs) {
                $status = $rs->active ? 'checked' : '';
                $linkEdit = route("admin.product_category.edit", $rs->id);
                $linkDelete = route("admin.product_category.destroy", $rs->id);
                $linkUpdateStatus = route("admin.product_category.update_status", $rs->id);

                $string .= "<li class='ui-sortable-placeholder list-group-item' data-id='{$rs->id}'>";
                $string .= "<div class='tree-name'>{$rs->name}</div>";
                $string .= "<div class='buttons-control'>";
                $string .= '<div class="switch" style="display: inline-block;">';
                $string .= '<label><input class="update_category_status" data-href="'.$linkUpdateStatus.'" type="checkbox" ' . $status . '><span class="lever switch-col-light-green"></span></label>';
                $string .= '</div>';
                $string .= "<a class='btn btn-xs btn-info' href='{$linkEdit}'>" . trans("button.edit") . "</a>";
                $string .= " <button class='btn-delete-record btn btn-xs btn-danger' type='button' data-title='" . trans('admin_message.alert_delete', ['id' => $rs->name]) . "' data-url='{$linkDelete}'>" . trans("button.delete") . "</button>";
                $string .= "</div>";
                if (!empty($rs->trees) && $rs->trees->count()) {
                    $string .= $this->outTreeCategorySortTable($rs->trees);
                }
                $string .= "</li>";
            }
            $string .= "</ul>";
        }
        return $string;
    }

    public function outTreeCategoryRadioCheckbox($tree, $type = "radio", $list_id = [], $disable_id = [], $root = false)
    {
        $string = '';
        if ((empty($tree) || !$tree->count()) && !$root) {
            $string .= '';
        } else {
            $string .= '<ul class="list-unstyled">';
            if ($root) {
                $checked = '';
                if (in_array(0, $list_id)) {
                    $checked = 'checked';
                }
                $string .= '<li class="root-tree"><input type="radio" class="with-gap radio-col-green" level="-1" id="category-0" name="category_id" ' . $checked . ' value="0" />';
                $string .= '<label for="category-0"> ' . trans("admin_product_category.attr.root") . '</label></li>';
                $root = false;
            }
            foreach ($tree as $rs) {
                $checked = '';
                if (in_array($rs->id, $list_id)) {
                    $checked = 'checked';
                }

                $disabled = '';
                if (in_array($rs->id, $disable_id)) {
                    $disabled = 'disabled';
                }

                $string .= '<li>';

                if ($type === 'checkbox') {
                    $string .= '<input type="' . $type . '" class="chk-col-green level="' . $rs->level . '" id="category-' . $rs->id . '" name="category_id[]" ' . $checked . ' ' . $disabled . ' value="' . $rs->id . '" />';
                } else {
                    $string .= '<input type="' . $type . '" class="with-gap radio-col-green" level="' . $rs->level . '" id="category-' . $rs->id . '" name="category_id" ' . $checked . ' ' . $disabled . ' value="' . $rs->id . '" />';
                }

                $statusClass = !$rs->active ? 'col-pink' : '';

                $string .= '<label for="category-' . $rs->id . '" class="'.$statusClass.'"> ' . $rs->name . '</label>';

                if (!empty($rs->trees) && $rs->trees->count()) {
                    $string .= $this->outTreeCategoryRadioCheckbox($rs->trees, $type, $list_id, $disable_id, $root);
                }
                $string .= '</li>';
            }
            $string .= '</ul>';
        }
        return $string;
    }

    public function store(array $input)
    {
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input["parent_id"] = $input["category_id"];
        unset($input["category_id"]);

        $level = 0;
        if (!empty($input["parent_id"])) {
            $parentCategory = $this->model->findOrFail($input["parent_id"]);
            $level = $parentCategory->level + 1;
        }
        $input["level"] = $level;

        $this->uploadPhotos($input);

        $model = $this->model->create($input);

        if (!empty($input["catalogue"])) {
            $model->storeCatalogues($input["catalogue"]);
        }

        $this->removeCache();

        return $model;
    }

    public function update(array $input, $id)
    {
        $category = $this->model->findOrFail($id);

        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input["parent_id"] = $input["category_id"];
        unset($input["category_id"]);

        $level = 0;
        if (!empty($input["parent_id"])) {
            $parentCategory = $this->model->findOrFail($input["parent_id"]);
            $level = $parentCategory->level + 1;
        }
        $input["level"] = $level;

        // Delete icon and image 1, 2, 3, gallery_image
        $this->deletePhoto($input, "delete_logo", "logo");

        $this->deletePhoto($input, "delete_icon", "icon");

        $this->deletePhoto($input, "delete_image", "image");

        $this->uploadPhotos($input);

        $category->update($input);

        // Delete catalogues
        if (!empty($input["delete_catalogue"])) {
            $category->deleteCatalogues($input["delete_catalogue"]);
        }
        //Upload
        if (!empty($input["catalogue"])) {
            $category->storeCatalogues($input["catalogue"]);
        }

        $this->removeCache();

        return $category;
    }

    private function uploadPhotos(&$input)
    {
        if (!empty($input['category_logo'])) {
            $config = config("files.product_category_logo");
            $info = $this->storePhoto($input["category_logo"], $config);
            $input["logo"] = $info["full_path"];
            unset($input["category_logo"]);
        }

        if (!empty($input['category_icon'])) {
            $config = config("files.product_category_icon");
            $info = $this->storePhoto($input["category_icon"], $config);
            $input["icon"] = $info["full_path"];
            unset($input["category_icon"]);
        }

        if (!empty($input['category_image'])) {
            $config = config("files.product_category_image");
            $info = $this->storePhoto($input["category_image"], $config);
            $input["image"] = $info["full_path"];
            unset($input["category_image"]);
        }

        return $input;
    }

    private function deletePhoto(&$input, $key, $column)
    {
        if (!empty($input[$key])) {
            \Storage::delete($input[$key]);
            $input[$column] = null;
        }
        return $input;
    }

    public function destroy($id)
    {
        $category = $this->model->findOrFail($id);

        // Delete icon and image 1, 2, 3, gallery_image
        $input = [
            "delete_logo" => $category->logo,
            "delete_icon" => $category->icon,
            "delete_image" => $category->image,
        ];
        $this->deletePhoto($input, "delete_logo", "logo");
        $this->deletePhoto($input, "delete_icon", "icon");
        $this->deletePhoto($input, "delete_image", "image");

        // Remove child categories
        foreach ($category->children as $child) {
            $this->destroy($child->id);
        }

        $category->deleteCatalogues([], true);

        $category->delete();

        $this->removeCache();

        return true;
    }

    public function topCategories($limit)
    {
        return $this->model
            ->where('is_top', 1)
            ->orderBy('position', 'asc')
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }

    public function allChildrenIds(&$array, $parent_id)
    {
        $a = $this->model->where("parent_id", $parent_id)->pluck("id")->toArray();
        foreach ($a as $key => $value) {
            $array[] = $value;
            $this->allChildrenIds($array, $value);
        }
    }

    public function findBySlug($slug, $level = null, $with = [])
    {
        $model = $this->model->active()->whereTranslation('slug', $slug);

        if ($level !== null) {
            $model->where('level', $level);
        }

        if (!empty($with)) {
            $model->with($with);
        }

        return $model->firstOrFail();
    }

    public function sort($positions)
    {
        $arr = explode('&', $positions);
        if ($arr && count($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                $_arr = explode('=', $arr[$i]);
                $this->model->where('id', $_arr[0])->update(['position' => $_arr[1]]);
            }
        }

        $this->removeCache();
    }

    // Remove cache composer
    public function removeCache()
    {
        // translation url
        $locales = \LaravelLocalization::getSupportedLanguagesKeys();

        foreach ($locales as $key) {
            \Cache::forget("{$key}_composer_categories");
        }
    }

    public function menuCategories(){
        $model = $this->model->select("*")
            ->with(['children' => function ($query) {
                $query->active();
            }, 'translations'])
            ->active()
            ->where('parent_id', 0)
            ->orderBy('position', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return $model;
    }
}
