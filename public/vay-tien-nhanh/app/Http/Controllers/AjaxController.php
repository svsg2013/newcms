<?php
namespace App\Http\Controllers;

use App\PersonalLoan;
use App\Loan;
use App\Personal;
use App\LoanCalculator;
use App\FullProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use App\Http\Resources\Personal as PersonalResource;
use App\Http\Resources\Loan as LoanResource;
use View;
use App\Traits\Easycredit;

class AjaxController extends Controller{
	
	use Easycredit;
	
	public function career(Request $request){
		$res = array(
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại'),
			'data' => array()
        );
		$ruler = array(
			'id' => 'required|exists:careers,id',
		);
		$validator = Validator::make($request->all(), $ruler);
        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return response()->json($res);
        }
		$careerId = request('id');
		
		$Personal = Personal::whereHas('loans',function($query)use($careerId){
			$query->whereHas('careers',function($query)use($careerId){
				$query->where('career_id','=',$careerId);
			});
		})->get();
		$res['success'] = 1;
		$res['messages'] = "Giấy tờ có thể cung cấp";
		$res['data'] = PersonalResource::collection($Personal);
		return response()->json($res);
	}
	
	public function loan(Request $request){
		$res = array(
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'career' => 'required|exists:careers,id'
		);
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return response()->json($res);
        }
		$PersonalId = request('personal');
		$CareerId = request('career');
		$Loan = Loan::with('personals')->whereHas('careers',function($query) use($CareerId){
			$query->where('career_id','=',$CareerId);
		})->get();
		$personals = array();
		foreach($Loan as $itemLoan){
			foreach($itemLoan->personals as $tmpItemLoan){
				if(!isset($personals[$tmpItemLoan->id])){
					$personals[$tmpItemLoan->id] = $tmpItemLoan;
				}
			}
		}
		$table = View::make('ajax.table')->with(['loan'=>$Loan,'personals'=>$personals]);
		$res['success'] = 1;
		$res['messages'] = "Thông tin khoản vay";
		$res['data'] = LoanResource::collection($Loan);
		$res['table'] = "{$table}";
		return response()->json($res);
	}
	
	public function versiononeCreate(Request $request){
		$res = array(
			'url' => route('indexfailed'),
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
			'income_id' => 'required|exists:incomes,id',
			'district_id' => 'required|exists:districts,id',
			//'birthday' => 'nullable|date_format:"Y-m-d"',
			'loan_amount' => 'required|integer',
			'loan_tenure' => 'required|integer',
			'career_id' => 'required|exists:careers,id',
			'loan_id' => 'required|exists:loans,id',
			'url' => 'string',
		);
		
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return $this->responseAjax($res);
        }
		$utmsource = null;
		$utmmedium = null;
		$utmcampaign = null;
		$utmcontent = null;
		$ruler['aff_sid'] = ''; /* 3fc - only for get key */
		$database = $request->only(array_keys($ruler));
		$database['partner_code'] = config('easycredit.Calculator.PartnerCode');
		
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
		$LoanCalculator = FullProfile::create($database);
		
		$LoanCalculator->aff_sid = $database['aff_sid'];/* 3fc - add more aff_sid */
		$status = $this->sendLeadCalculator($LoanCalculator);
		if($status == true){
			$res['url'] = route('indexthankyou');
		}
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");
		
		return $this->responseAjax($res);
	}
	
    public function versiontwoCreate(Request $request){
        $res = array(
			'url' => route('indexfailed'),
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
			'income_id' => 'required|exists:incomes,id',
			'district_id' => 'required|exists:districts,id',
			'url' => 'string'
		);
		
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return $this->responseAjax($res);
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
		$PersonalLoan = FullProfile::create($database);
		$status = $this->sendLeadPersonal($PersonalLoan);
		if($status == true){
			$res['url'] = route('indexthankyou');
		}
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");
		return $this->responseAjax($res);
	}
	
	public function versionthreeCreate(Request $request){
		$res = array(
			'url' => route('indexfailed'),
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
			'income_id' => 'required|exists:incomes,id',
			'district_id' => 'required|exists:districts,id',
			//'birthday' => 'nullable|date_format:"Y-m-d"',
			'loan_amount' => 'required|integer',
			'loan_tenure' => 'required|integer',
			'career_id' => 'required|exists:careers,id',
			'loan_id' => 'required|exists:loans,id',
			'url' => 'string',
		);
		
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return $this->responseAjax($res);
        }
		$utmsource = null;
		$utmmedium = null;
		$utmcampaign = null;
		$utmcontent = null;
		$ruler['aff_sid'] = ''; /* 3fc - only for get key */
		$database = $request->only(array_keys($ruler));
		$database['partner_code'] = config('easycredit.CalculatorThree.PartnerCode');
		
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
		$LoanCalculator = FullProfile::create($database);
		
		$LoanCalculator->aff_sid = $database['aff_sid'];/* 3fc - add more aff_sid */
		$status = $this->sendLeadCalculatorThree($LoanCalculator);
		if($status == true){
			$res['url'] = route('indexthankyou');
		}
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");
		
		return $this->responseAjax($res);
	}

	public function versionfourCreate(Request $request){
		$res = array(
			'url' => route('indexfailed'),
			'success' => 0,
            'messages' => __('Đã sảy ra lỗi vui lòng thử lại')
        );
		$ruler = array(
			'fullname' => 'required|string|max:50',
			'nationalid' => 'required|string',
			'phonenumber' => 'required|string',
			'income_id' => 'required|exists:incomes,id',
			'district_id' => 'required|exists:districts,id',
			//'birthday' => 'nullable|date_format:"Y-m-d"',
			'loan_amount' => 'required|integer',
			'loan_tenure' => 'required|integer',
			'career_id' => 'required|exists:careers,id',
			'loan_id' => 'required|exists:loans,id',
			'url' => 'string',
		);
		
        $validator = Validator::make($request->all(), $ruler);

        if ($validator->fails()) {
			$res['messages'] = $validator->errors()->first();
            return $this->responseAjax($res);
        }
		$utmsource = null;
		$utmmedium = null;
		$utmcampaign = null;
		$utmcontent = null;
		$ruler['aff_sid'] = ''; /* 3fc - only for get key */
		$database = $request->only(array_keys($ruler));
		$database['partner_code'] = config('easycredit.CalculatorFour.PartnerCode');
		
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
		$LoanCalculator = FullProfile::create($database);
		
		$LoanCalculator->aff_sid = $database['aff_sid'];/* 3fc - add more aff_sid */
		$status = $this->sendLeadCalculatorFour($LoanCalculator);
		if($status == true){
			$res['url'] = route('indexthankyou');
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


	// private function _sendLeadCalculator(FullProfile $LeadCalculator){
	// 	//throw V

	// 	// $error = \Illuminate\Validation\ValidationException::withMessages([
	// 	// 'field_name_1' => ['Validation Message #1'],
	// 	// 'field_name_2' => ['Validation Message #2'],
	// 	// ]);
	// 	// throw $error;

	// 	//echo 'top';
	// 	//print_r($LeadPersonal);die;
	// 	//return $LeadCalculator;
	// 	print_r($LeadCalculator->aff_sid);die;
	// 	$status = false;
	// 	$LeadCalculator->status = false;
	// 	$checkLead = $this->checkLead($LeadCalculator->phonenumber,$LeadCalculator->nationalid,config('easycredit.Calculator.PartnerCode'));
	// 	//Log::info($checkLead);
	// 	if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
	// 		$leadId = "ECD0{$LeadCalculator->id}";
	// 		$Province = "HCM";
	// 		if(isset($LeadCalculator->district)){
	// 			$Province = $LeadCalculator->district->name;
	// 		}
	// 		$params = array(
	// 			'partner_code' => config('easycredit.Calculator.PartnerCode'),
	// 			'phone_number' => $LeadCalculator->phonenumber,
	// 			'identity_card_id' => $LeadCalculator->nationalid,
	// 			'customer_name' => $LeadCalculator->fullname,
	// 			'province' => $Province,
	// 			'product_code' => config('easycredit.Calculator.ProductCode'),
	// 			'source' =>  config('easycredit.Calculator.Source'),
	// 			'score_range' => config('easycredit.Calculator.ScoreRange'),
	// 			'ts_lead_id' => $leadId,
	// 			'other_data' => json_encode(array(
	// 				'utm_source' => $LeadCalculator->utm_source,
	// 				'utm_medium' => $LeadCalculator->utm_medium,
	// 				'utm_campaign' => $LeadCalculator->utm_campaign,
	// 				'utm_content' => $LeadCalculator->utm_content
	// 			)),
	// 			'aff_sid' => $LeadCalculator->aff_sid
	// 		);
	// 		echo 'params';
	// 		print_r($params);die;
	// 		$this->createLead($params);
	// 		$LeadCalculator->lead_id = $leadId;
	// 		$LeadCalculator->status = true;
	// 		$status = true;
	// 	}

	// 	echo 'outside';die;
	// 	//print_r($params);die;

	// 	$LeadCalculator->save();
	// 	return $status;
	// }
}
