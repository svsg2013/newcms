<?php

namespace App\Repositories;

use App\Models\Team;
use App\Validators\TeamValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class GalleryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TeamRepositoryEloquent extends BaseRepository implements TeamRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Team::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return TeamValidator::class;
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
        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->find($id);
        $model->update($input);
        return $model;
    }

    public function getTeamByCategory(int $team_category, int $limit = 5)
    {
        $model = $this->model->select('*')
            ->withTranslation()
            ->requiredTranslation('name');

        return $model->orderBy('order')->where('team_category',$team_category)->limit($limit)->get();
    }


    public function search(array $input = [], $limit = 12)
    {
        $model = $this->model->select('*')
            ->withTranslation()
            ->requiredTranslation('name');

        if (!empty($input['s']) && in_array($input['s'], ['DESC', 'ASC'])) {
            $model->orderByTranslation('name', $input['s']);
        }

        if (!empty($input['k'])) {
            $search_key = trim($input['k']);
            $model->whereTranslationLike('name', '%' . $search_key . '%');
        }

        if (!empty($input['b'])) {
            $model->where('business_id', $input['b']);
        }

        if (!empty($input['c'])) {
            $model->where('country_id', $input['c']);
        }

        return $model->paginate($limit);
    }

    public function getMaster()
    {
        return $this->model->orderBy('order')->get()->random();
    }

    public function getAll($ignore = [])
    {
        $model = $this->model->orderBy('order');
        if(count($ignore))
            $model = $model->whereNotIn('id',$ignore);
        return $model->get();
    }


}
