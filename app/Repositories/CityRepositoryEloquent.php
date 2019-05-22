<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CityRepository;
use App\Models\City;
use App\Validators\CityValidator;


/**
 * Class CityRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */


    public function validator()
    {
        return CityValidator::class;
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

        $city = $this->model->create($input);

        return $city;
    }

    public function update(array $input, $id)
    {
        $city = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $city->update($input);

        return $city;
    }

    public function delete($id)
    {
        $city = $this->model->findOrFail($id);

        $city->meta()->delete();

        $city->delete();

        return true;
    }

    public function getCity()
    {
        return $this->model->active()->get();
    }
}
