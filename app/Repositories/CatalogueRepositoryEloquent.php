<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CatalogueRepository;
use App\Models\Catalogue;
use App\Validators\CatalogueValidator;
use App\Traits\UploadPhotoTrait;


/**
 * Class NewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class CatalogueRepositoryEloquent extends BaseRepository implements CatalogueRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Catalogue::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */


    public function validator()
    {
        return CatalogueValidator::class;
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
        $input['publish_date'] = !empty($input['publish_date']) ? cvDbTime($input['publish_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $catalogue = $this->model->create($input);

        $catalogue->updateSlugTranslation();

        return $catalogue;
    }

    public function update(array $input, $id)
    {
        $catalogue = $this->model->findOrFail($id);

        $input['publish_date'] = !empty($input['publish_date']) ? cvDbTime($input['publish_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $catalogue->update($input);

        $catalogue->updateSlugTranslation();

        return $catalogue;
    }

    public function cataloguesByType($type)
    {
        return $this->model->select('*')
            ->withTranslation()
            ->where('type', $type)
            ->orderBy('publish_date', 'DESC')
            ->paginate(15);
    }

    public function otherCatalogues($id, $type, $limit = 5)
    {
        return $this->model->select('*')
            ->withTranslation()
            ->where('type', $type)
            ->where('id', '<>', $id)
            ->orderBy('publish_date', 'DESC')
            ->limit($limit)
            ->get();
    }

    public function findBySlug($slug)
    {
        $locale = \App::getLocale();
        return $this->model
            ->whereTranslation('slug', $slug, $locale)
            ->with('translations')
            ->firstOrFail();
    }
}
