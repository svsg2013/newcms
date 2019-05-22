<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LoanManagementRepository;
use App\Models\LoanManagement;
use App\Validators\LoanManagementValidator;
use App\Models\System;
use Carbon\Carbon;

/**
 * Class LoanManagementRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LoanManagementRepositoryEloquent extends BaseRepository implements LoanManagementRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LoanManagement::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return LoanManagementValidator::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable(array $input)
    {

        $model = $this->model->select('*');

        if (!empty($input['name'])) {
            $model->where('name', 'like', '%' . $input['name'] . '%');
        }

        if (!empty($input['email'])) {
            $model->where('email', 'like', '%' . $input['email'] . '%');
        }

        if (!empty($input['phone'])) {
            $model->where('phone', 'like', '%' . $input['phone'] . '%');
        }

        if (isset($input['status'])) {
            $model->where('status', $input['status']);
        }

        if (!empty($input['date_from'])) {
            $date_from = cvDbTime($input['date_from'], PHP_DATE, DB_DATE);
            $model->whereDate('created_at', '>=', $date_from);
        }

        if (!empty($input['date_to'])) {
            $date_to = cvDbTime($input['date_to'], PHP_DATE, DB_DATE);
            $model->whereDate('created_at', '<=', $date_to);
        }

        return $model->orderBy('id', 'desc');
    }

    public function create(array $input)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;
        
        $input['amount'] = convertStringToNumber($input['amount']);

        $input['monthly_payment'] = convertStringToNumber($input['monthly_payment']);

        $loan_management = $this->model->create($input);

        return $loan_management;
    }

    public function update(array $input, $id)
    {
        $loan_management = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $input['amount'] = convertStringToNumber($input['amount']);

        $input['monthly_payment'] = convertStringToNumber($input['monthly_payment']);

        $loan_management->update($input);

        return $loan_management;
    }

    public function delete($id)
    {
        $loan_management = $this->model->findOrFail($id);

        $loan_management->delete();

        return true;
    }

    public function ApiRequestCreate($token, $data, $inputApi, $inputCheckLead)
    {
        if($token)
        {
            return $this->checkAndSendLead($token, $data, $inputApi, $inputCheckLead);
        }

        return restFail('Không nhận được Token');
    }

    private function checkAndSendLead($token, $data, $inputApi, $inputCheckLead)
    {
        $checkLead = checkLead($token, $inputCheckLead);
        
        if(!empty($checkLead)
            && !empty($checkLead['LeadCheckResult'])
            && !empty($checkLead['LeadCheckResult']['status'])
            && $checkLead['LeadCheckResult']['status'] == 'pass')
        {
            $fullLead = sendFullLead($token, $inputApi);

            $data['phone_status'] = 1;

            $this->createDataByPhoneStatus($data);

            return restSuccess();
        }

        if(!empty($checkLead['status']) && $checkLead['status'] == 400) {

            $data['phone_status'] = 0;

            $this->createDataByPhoneStatus($data);

            return restFail('Lưu ý: Số điện thoại đăng ký đã tồn tại trên hệ thống. Bạn vui lòng liên hệ tổng đài '. System::content("phone","1900 1066") .' để được hỗ trợ', 422);
        }
    }

    private function createDataByPhoneStatus($data)
    {
        // Limit the number of requests
        if (count(LoanManagement::where('phone', $data['phone'])->get()) <= 10) {
            LoanManagement::create($data);
        }
    }

    public function getData(array $input)
    {
        $model = $this->model->select("*");

        if(!empty($input['from'])) {
            $formatFrom = Carbon::parse($input['from'])->format('Y-m-d');
            $model->whereDate('created_at', '>=', $formatFrom);
        }
        if(!empty($input['to'])) {
            $formatTo = Carbon::parse($input['to'])->format('Y-m-d');
            $model->whereDate('created_at', '<=', $formatTo);
        }

        return $model->get();
    }
}
