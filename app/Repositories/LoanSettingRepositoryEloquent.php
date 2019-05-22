<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LoanSettingRepository;
use App\Models\LoanSetting;
use App\Validators\LoanSettingValidator;

/**
 * Class LoanSettingRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LoanSettingRepositoryEloquent extends BaseRepository implements LoanSettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LoanSetting::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return LoanSettingValidator::class;
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

        $input['min_money'] = convertStringToNumber($input['min_money']);

        $input['max_money'] = convertStringToNumber($input['max_money']);

        $input['step_money'] = convertStringToNumber($input['step_money']);

        $loan_setting = $this->model->create($input);

        $data = [
            'loan_income_type_id' => $input['loan_income_type_id'],
            'loan_job_id' => $input['loan_job_id']
        ];

        $loan_setting->loanGenerals()->create($data);

        return $loan_setting;
    }

    public function update(array $input, $id)
    {
        $loan_setting = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;
        
        $input['min_money'] = convertStringToNumber($input['min_money']);

        $input['max_money'] = convertStringToNumber($input['max_money']);

        $input['step_money'] = convertStringToNumber($input['step_money']);

        $loan_setting->update($input);

        $data = [
            'loan_income_type_id' => $input['loan_income_type_id'],
            'loan_job_id' => $input['loan_job_id']
        ];

        if($loan_setting->loanGenerals->count() > 0)
            $loan_setting->loanGenerals()->update($data);
        else
            $loan_setting->loanGenerals()->create($data);

        return $loan_setting;
    }

    public function delete($id)
    {
        $loan_setting = $this->model->findOrFail($id);

        $loan_setting->delete();

        return true;
    }
}
