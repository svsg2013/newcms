<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ComboRepository;
use App\Models\Combo;
use App\Validators\ComboValidator;

/**
 * Class ComboRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ComboRepositoryEloquent extends BaseRepository implements ComboRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Combo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return ComboValidator::class;
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
        $input['active'] = !empty($input['active']) ? 1 : 0;

        $combo = $this->model->create($input);

        $combo->documents()->attach($input['document_id']);

        return $combo;
    }

    public function update(array $input, $id)
    {
        $combo = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $combo->update($input);

        $combo->documents()->sync($input['document_id']);

        return $combo;
    }

    public function delete($id)
    {
        $combo = $this->model->findOrFail($id);

        $combo->delete();

        return true;
    }

}
