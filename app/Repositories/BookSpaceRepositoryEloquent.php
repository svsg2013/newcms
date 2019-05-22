<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BookSpaceRepository;
use App\Models\BookSpace;
use App\Validators\BookSpaceValidator;

/**
 * Class BookSpaceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BookSpaceRepositoryEloquent extends BaseRepository implements BookSpaceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BookSpace::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return BookSpaceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function create(array $input)
    {
        if($input['country_id'] === 'other'){
            $input['country_id'] = $input['country_other_id'];
        }

        $model = $this->model->create($input);

        $input['free_space_id'] = array_filter($input['free_space_id']);

        $model->spaces()->attach($input['free_space_id']);

        return $model;
    }

    public function datatable()
    {
        return $this->model->select('*');
    }
}
