<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LoanJobRepository;
use App\Models\LoanJob;
use App\Validators\LoanJobValidator;

/**
 * Class LoanJobRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LoanJobRepositoryEloquent extends BaseRepository implements LoanJobRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LoanJob::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return LoanJobValidator::class;
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

        $loan_job = $this->model->create($input);

        $loan_job->combos()->attach($input['combo_id']);

        return $loan_job;
    }

    public function update(array $input, $id)
    {
        $loan_job = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $loan_job->update($input);

        $loan_job->combos()->sync($input['combo_id']);

        return $loan_job;
    }

    public function delete($id)
    {
        $loan_job = $this->model->findOrFail($id);

        $loan_job->delete();

        return true;
    }
}
