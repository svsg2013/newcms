<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsTagRepository;
use App\Models\NewsTag;

/**
 * Class NewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class NewsTagRepositoryEloquent extends BaseRepository implements NewsTagRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsTag::class;
    }

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
        $input['active'] = empty($input['active']) ? 0 : 1;
        $create = $this->model->create($input);
        $create->updateSlugTranslation();
        return $create;
    }

    public function update(array $input, $id)
    {
        $input['active'] = empty($input['active']) ? 0 : 1;
        $model = $this->model->find($id);
        $model->update($input);
        return $model;
    }

    public function getListTags(){
        return $this->model->select('*')->get();
    }

}