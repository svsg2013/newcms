<?php

use Illuminate\Database\Seeder;
use App\Models\LoanJob;
use App\Models\LoanIncomeType;
use App\Models\Document;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_job = [
            'Đi làm hưởng lương',
            'Tự kinh doanh',
            'Làm nghề tự do',
            'Hưởng lương hưu'
        ];

        $list_document = [
            'CMND/Thẻ Căn cước + Giấy phép lái xe/Hộ khẩu/Hộ chiếu',
            'CMND/Thẻ Căn cước + Giấy phép lái xe/Hộ khẩu/Hộ chiếu + Sao kê tài khoản/Sổ hưu trí',
            'Hợp đồng lao động/Sao kê tài khoản',
            'Giấy đăng ký kinh doanh + Chứng từ thuế/Sao kê tài khoản',
            'Sao kê tài khoản'
        ];

        $list_income_type = [
            'Không chứng minh thu nhập',
            'Có chứng minh thu nhập'
        ];

        foreach($list_job as $key)
        {
            if($this->checkExistLoanJob($key))
                continue;
            $input = [
                'name' => $key,
                'active' => 1
            ];
            LoanJob::create($input);
        }

        foreach($list_document as $key)
        {
            if($this->checkExistDocument($key))
                continue;
            $input = [
                'name' => $key,
                'active' => 1
            ];
            Document::create($input);
        }

        foreach($list_income_type as $key)
        {
            if($this->checkExistLoanIncomeType($key))
                continue;
            $input = [
                'name' => $key,
                'active' => 1
            ];
            LoanIncomeType::create($input);
        }
    }

    private function checkExistLoanJob($name)
    {
        return LoanJob::where('name', $name)->count() > 0 ? true : false;
    }

    private function checkExistLoanIncomeType($name)
    {
        return LoanIncomeType::where('name', $name)->count() > 0 ? true : false;
    }

    private function checkExistDocument($name)
    {
        return Document::where('name', $name)->count() > 0 ? true : false;
    }
}
