<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CityCareerRepository;
use App\Models\CityCareer;


/**
 * Class CityCareerRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class CityCareerRepositoryEloquent extends BaseRepository implements CityCareerRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CityCareer::class;
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

        $model = $this->model->create($input);

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $model->update($input);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        $model->meta()->delete();

        $model->delete();

        return true;
    }

    public function getCity()
    {
        return $this->model->active()->get();
    }
}
