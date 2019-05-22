<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FaqCategoryRepository;
use App\Models\FaqCategory;
use App\Validators\FaqCategoryValidator;

/**
 * Class FaqCategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FaqCategoryRepositoryEloquent extends BaseRepository implements FaqCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FaqCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return FaqCategoryValidator::class;
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
        $model = $this->model->create($input);

        $model->updateSlugTranslation();

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $model->update($input);

        $model->updateSlugTranslation();

        return $model;
    }

    public function faqs()
    {
        return $this->model->with(['faqs'])->get();
    }

    public function getCategoryByType($type)
    {
        return $this->model->where('type', $type)->get();
    }
}
