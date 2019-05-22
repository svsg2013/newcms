<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SubscribeRepository;
use App\Models\Subscribe;
use App\Validators\SubscribeValidator;

/**
 * Class SubscribeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class SubscribeRepositoryEloquent extends BaseRepository implements SubscribeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscribe::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return SubscribeValidator::class;
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

    public function create(array $input)
    {
        return $this->model->create($input);
    }

    public function getDataByType(array $input)
    {
        $model = $this->model->select('*');

        if(!empty($input['type'])) {
            $model->where('type', $input['type']);
        }

        return $model->orderBy('created_at', 'desc')->get();
    }
}
