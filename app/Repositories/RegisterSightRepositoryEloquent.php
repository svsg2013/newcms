<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RegisterSightRepository;
use App\Models\RegisterSight;
use App\Validators\RegisterSightValidator;

/**
 * Class RegisterSightRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RegisterSightRepositoryEloquent extends BaseRepository implements RegisterSightRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RegisterSight::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return RegisterSightValidator::class;
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
        return $this->model->select('*');
    }

    public function create(array $input)
    {
        if($input['country_id'] === 'other'){
            $input['country_id'] = $input['country_other_id'];
        }
        $input['from'] = cvDbTime($this->cvDate($input['from']), PHP_DATE, DB_DATE);
        $input['to'] = cvDbTime($this->cvDate($input['to']), PHP_DATE, DB_DATE);
        $input['target'] = json_encode($input['target']);
        $model = $this->model->create($input);
        return $model;
    }

    public function cvDate($string)
    {
        $arr = explode(' / ', $string);
        return $arr[1];
    }

}
