<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FaqRepository;
use App\Models\Faq;
use App\Validators\FaqValidator;

/**
 * Class FaqRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FaqRepositoryEloquent extends BaseRepository implements FaqRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Faq::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return FaqValidator::class;
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
        return $this->model->select('*')->with('category')->withTranslation();
    }

    public function create(array $input)
    {
        $model = $this->model->create($input);

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $model->update($input);

        return $model;
    }

    public function searchFAQ($keyword, $paginate = 0)
    {
        $result = $this->model->whereTranslationLike('question', '%'.$keyword.'%');

        if ($paginate) {
            return $result->paginate($paginate);
        }
        return $result->get();
    }
}
