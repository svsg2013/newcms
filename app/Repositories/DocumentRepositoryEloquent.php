<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentRepository;
use App\Models\Document;
use App\Validators\DocumentValidator;

/**
 * Class DocumentRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return DocumentValidator::class;
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

        $document = $this->model->create($input);

        return $document;
    }

    public function update(array $input, $id)
    {
        $document = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $document->update($input);

        return $document;
    }

    public function delete($id)
    {
        $document = $this->model->findOrFail($id);

        $document->delete();

        return true;
    }
}
