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
			'birthday' => 'nullable',
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
		$LoanCalculator = FullProfile::create($database);
		$this->sendLeadCalculator($LoanCalculator);
		$res['success'] = 1;
		$res['messages'] = __("Cảm ơn bạn đã đăng ký");
		return $this->responseAjax($res);
	}
	
    public function versiontwoCreate(Request $request){
        $res = array(
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
		$this->sendLeadPersonal($PersonalLoan);
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
