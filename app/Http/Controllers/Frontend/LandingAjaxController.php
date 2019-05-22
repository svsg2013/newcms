<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LandingCareer;
use App\Models\LandingCustomer;
use App\Models\LandingDistrict;
use App\Models\LandingIncome;
use App\Models\LandingLoan;
use App\Models\LandingPartner;
use App\Models\LandingPersonal;
use App\Models\LandingTemplate;
use App\Models\SmsId;
use Illuminate\Http\Request;
use App\Http\Resources\LandingPersonal as PersonalResource;
use App\Http\Resources\LandingLoan as LoanResource;
use App\Traits\Easycredit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class LandingAjaxController extends Controller {

	use Easycredit;
    public function career(Request $request){
        $res = array(
            'success' => 0,
            'messages' => __('Đã xảy ra lỗi vui lòng thử lại'),
            'data' => array()
        );
        $ruler = array(
            'id' => [
                'required',
                Rule::exists((new LandingCareer())->getTable(), 'id')
            ],
        );
        $validator = Validator::make($request->all(), $ruler);
        if ($validator->fails()) {
            $res['messages'] = $validator->errors()->first();
            return response()->json($res, 422);
        }
        $careerId = request('id');

        $personal = LandingPersonal::whereHas('loans',function($query)use($careerId){
            $query->whereHas('careers',function($query)use($careerId){
                $query->where('career_id','=',$careerId);
            });
        })->get();
        $res['success'] = 1;
        $res['messages'] = "Giấy tờ có thể cung cấp";
        $res['data'] = PersonalResource::collection($personal);
        return response()->json($res);
    }

	public function loan(Request $request){
		$res = array(
			'success' => 0,
            'messages' => __('Đã xảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'career' => [
			    'required',
                Rule::exists((new LandingCareer())->getTable(), 'id')
            ]
		);
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return response()->json($res, 422);
        }
		$personalId = request('personal');
		$careerId = request('career');
		$loan = LandingLoan::with('personals')->whereHas('careers',function($query) use($careerId){
			$query->where('career_id', $careerId);
		})->get();
		$personals = array();
		foreach($loan as $itemLoan){
			foreach($itemLoan->personals as $tmpItemLoan){
				if(!isset($personals[$tmpItemLoan->id])){
					$personals[$tmpItemLoan->id] = $tmpItemLoan;
				}
			}
		}
		$table = View::make('frontend.landing_ajax.table')->with(['loan'=>$loan,'personals'=>$personals]);
		$res['success'] = 1;
		$res['messages'] = "Thông tin khoản vay";
		$res['data'] = LoanResource::collection($loan);
		$res['table'] = "{$table}";
		return response()->json($res);
	}

    public function store(Request $request){
        $phoneNumber = $request->input('phone_number');
        $partnerCode = $request->input('partner_code');
        $verifyCode = $request->input('otp');
//        $res['url'] = route('landing.index.failed');
        $verifyResponse = $this->verifyOTP($phoneNumber,$partnerCode, $verifyCode);
        if($verifyResponse['success'] === true) {
            $utmsource = null;
            $utmmedium = null;
            $utmcampaign = null;
            $utmcontent = null;
            $database = $request->only(array(
                'fullname',
                'nationalid',
                'phonenumber',
                'income_id',
                'district_id',
                'birthday',
                'loan_amount',
                'loan_tenure',
                'career_id',
                'loan_id',
                'url',
                'partner_code',
                'aff_sid',
            ));

            if(Session::has('utmsource')){
                $utmsource = Session::get('utmsource');
            }
            if(Session::has('utmmedium')){
                $utmmedium = Session::get('utmmedium');
            }
            if(Session::has('utmcampaign')){
                $utmcampaign = Session::get('utmcampaign');
            }
            if(Session::has('utmcontent')){
                $utmcontent = Session::get('utmcontent');
            }
            $database['utm_source'] = $utmsource;
            $database['utm_medium'] = $utmmedium;
            $database['utm_campaign'] = $utmcampaign;
            $database['utm_content'] = $utmcontent;
            $database['site'] = 1;
            $loanCalculator = new LandingCustomer($database);
            $status = $this->sendLeadCalculator($loanCalculator);
            if($status == true){
                $res['url'] = route('landing.index.thank_you');
            } else {
                $res['url'] = route('landing.index.failed');
            }
            $res['success'] = true;
            $res['messages'] = __("Cảm ơn bạn đã đăng ký");

            return $this->responseAjax($res);
        } else {
            $res = $verifyResponse;
            return response()->json($res);
        }
    }

    public function registerValidate(Request $request) {
        $template_id = (int)$request->input('template_id');
        $template = LandingTemplate::findOrFail($template_id);

        switch ($template->code) {
            case 'TEMPLATE-01':
                return $this->versionOneValidateAndSendOTP($request);
            case 'TEMPLATE-02':
                return $this->versionTwoCreate($request);
        }
    }

    public function registerWithOutOTP(Request $request) {
        $template_id = (int)$request->input('template_id');
        $template = LandingTemplate::findOrFail($template_id);

        switch ($template->code) {
            case 'TEMPLATE-01':
                return $this->versionOneCreate($request);
            case 'TEMPLATE-02':
                return $this->versionTwoCreate($request);
        }
    }

    public function validatePhone(Request $request) {
        $flag = true;
        $smsId = '';
        while ($flag) {
            $smsId = randStrGen('16');
            if(!SmsId::where('sms_id', '=', $smsId)->first()) {
                $flag = false;
                SmsId::create(['sms_id' => $smsId]);
            }
        }
        $phone_number = $request->input('phone_number');
        $partner_code = $request->input('partner_code');
        $sendOTPResult = $this->sendOTP($phone_number, $smsId, $partner_code);
        return response()->json($sendOTPResult);
    }

    private function versionOneValidateAndSendOTP(Request $request){
        $res['success'] = true;
        $ruler = array(
            'fullname' => 'required|string|max:50',
            'nationalid' => 'required|string',
            'phonenumber' => 'required|string',
            'income_id' => [
                'required',
                Rule::exists((new LandingIncome())->getTable(), 'id')
            ],
            'district_id' => [
                'required',
                Rule::exists((new LandingDistrict())->getTable(), 'id')
            ],
            'birthday' => 'nullable|date_format:"Y-m-d"',
            'loan_amount' => 'required|integer',
            'loan_tenure' => 'required|integer',
            'career_id' => [
                'required',
                Rule::exists((new LandingCareer())->getTable(), 'id')
            ],
            'loan_id' => [
                'required',
                Rule::exists((new LandingLoan())->getTable(), 'id')
            ],
            'url' => 'string',
            'partner_code' => [
                'required',
                Rule::exists((new LandingPartner())->getTable(), 'campaign_source')
            ],
            'aff_sid' => [
                'nullable'
            ]
        );

        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
            $res['success'] = false;
            $res['message'] = $validator->errors()->first();
        }

        return response()->json($res);
    }

	private function versionOneCreate(Request $request){
		$res = array(
			'url' => route('landing.index.failed'),
			'success' => 0,
            'messages' => __('Đã xảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
			'income_id' => [
			    'required',
                Rule::exists((new LandingIncome())->getTable(), 'id')
            ],
			'district_id' => [
                'required',
                Rule::exists((new LandingDistrict())->getTable(), 'id')
            ],
			'birthday' => 'nullable|date_format:"Y-m-d"',
			'loan_amount' => 'required|integer',
			'loan_tenure' => 'required|integer',
			'career_id' => [
                'required',
                Rule::exists((new LandingCareer())->getTable(), 'id')
            ],
			'loan_id' => [
                'required',
                Rule::exists((new LandingLoan())->getTable(), 'id')
            ],
			'url' => 'string',
            'partner_code' => [
                'required',
                Rule::exists((new LandingPartner())->getTable(), 'campaign_source')
            ],
            'aff_sid' => [
                'nullable'
            ]
		);

        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return response()->json($res, 422);
        }
		$utmsource = null;
		$utmmedium = null;
		$utmcampaign = null;
		$utmcontent = null;
		$database = $request->only(array_keys($ruler));

		if(Session::has('utmsource')){
			$utmsource = Session::get('utmsource');
		}
		if(Session::has('utmmedium')){
			$utmmedium = Session::get('utmmedium');
		}
		if(Session::has('utmcampaign')){
			$utmcampaign = Session::get('utmcampaign');
		}
		if(Session::has('utmcontent')){
			$utmcontent = Session::get('utmcontent');
		}
		$database['utm_source'] = $utmsource;
		$database['utm_medium'] = $utmmedium;
		$database['utm_campaign'] = $utmcampaign;
		$database['utm_content'] = $utmcontent;
		$database['site'] = 1;
		$loanCalculator = new LandingCustomer($database);
		$status = $this->sendLeadCalculator($loanCalculator);
		if($status == true){
			$res['url'] = route('landing.index.thank_you');
		}
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");

		return $this->responseAjax($res);
	}

    private function versionTwoCreate(Request $request){
        $res = array(
            'url' => route('landing.index.failed'),
			'success' => 0,
            'messages' => __('Đã xảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
            'income_id' => [
                'required',
                Rule::exists((new LandingIncome())->getTable(), 'id')
            ],
            'district_id' => [
                'required',
                Rule::exists((new LandingDistrict())->getTable(), 'id')
            ],
			'url' => 'string',
            'partner_code' => [
                'required',
                Rule::exists((new LandingPartner())->getTable(), 'campaign_source')
            ],
            'aff_sid' => [
                'nullable'
            ]
		);

        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return response()->json($res, 422);
        }

		$utmsource = null;
		$utmmedium = null;
		$utmcampaign = null;
		$utmcontent = null;
		$database = $request->only(array_keys($ruler));

		if(Session::has('utmsource')){
			$utmsource = Session::get('utmsource');
		}
		if(Session::has('utmmedium')){
			$utmmedium = Session::get('utmmedium');
		}
		if(Session::has('utmcampaign')){
			$utmcampaign = Session::get('utmcampaign');
		}
		if(Session::has('utmcontent')){
			$utmcontent = Session::get('utmcontent');
		}
		$database['utm_source'] = $utmsource;
		$database['utm_medium'] = $utmmedium;
		$database['utm_campaign'] = $utmcampaign;
		$database['utm_content'] = $utmcontent;
		$database['site'] = 2;
		$personalLoan = new LandingCustomer($database);;
		$status = $this->sendLeadPersonal($personalLoan);
		if($status == true){
            $res['url'] = route('landing.index.thank_you');
		}
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");
		return $this->responseAjax($res);
    }

	private function responseAjax($response){
		if(request()->ajax()){
			return response()->json($response);
		}
		return redirect()->back()->withInput()->withErrors($response['messages']);
	}
}
