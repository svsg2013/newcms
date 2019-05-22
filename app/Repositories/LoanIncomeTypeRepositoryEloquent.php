<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LoanIncomeTypeRepository;
use App\Models\LoanIncomeType;
use App\Validators\LoanIncomeTypeValidator;

/**
 * Class LoanIncomeTypeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LoanIncomeTypeRepositoryEloquent extends BaseRepository implements LoanIncomeTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LoanIncomeType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return LoanIncomeTypeValidator::class;
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

        $loan_income_type = $this->model->create($input);

        return $loan_income_type;
    }

    public function update(array $input, $id)
    {
        $loan_income_type = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $loan_income_type->update($input);

        return $loan_income_type;
    }

    public function delete($id)
    {
        $loan_income_type = $this->model->findOrFail($id);

        $loan_income_type->delete();

        return true;
    }
}
