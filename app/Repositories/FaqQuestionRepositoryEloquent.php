<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FaqQuestionRepository;
use App\Models\FaqQuestion;
use App\Validators\FaqQuestionValidator;

/**
 * Class FaqQuestionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FaqQuestionRepositoryEloquent extends BaseRepository implements FaqQuestionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FaqQuestion::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FaqQuestionValidator::class;
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
        return $this->model->select('*')->orderBy('id', 'desc');
    }
    
}
