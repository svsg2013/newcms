<?php

namespace App\Http\Controllers;

use App\Income;
use App\Career;
use Illuminate\Http\Request;
use App\District;
use App\Traits\Easycredit;
class IndexController extends Controller
{
	
	use Easycredit;
	
	public function __construct(){
        $this->middleware('utm');
    }
	public function test(Request $request){
		/* $params = array(
			'partner_code' => 'ECD',
			'phone_number' => '0908552235',
			//'identity_card_id' => '123456788',
			'customer_name' => 'Nguyuen Van A',
			'province' => 'TP HCM',
			'product_code' => 'SCL',
			'source' => 'sms',
			'score_range' => '0-0',
			'ts_lead_id' => 'AE6iwd25',
			'other_data' => '12312314'
		); */
		
		$params = array(
			'partner_code' => 'ECD2',
			'phone_number' => '0908552236',
			//'identity_card_id' => '123456788',
			'customer_name' => 'Nguyuen Van A',
			'province' => 'TP HCM',
			'product_code' => 'SCL',
			'source' => 'sms',
			'score_range' => '0-0',
			'ts_lead_id' => 'AE6iwd26',
			'other_data' => '12312314'
		);
		
		//dd($this->createLead($params));
		//dd($this->getToken());
		dd($this->checkLead("0908552237",'215289396','ECD2'));
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexversionone(Request $request){
        $District = District::orderBy('isorder')->get();
        $Careers = Career::get();
		$Incomes = Income::orderBy('isorder')->get();
		return view('frontend.versionone',['District' => $District,'Careers' => $Careers,'Incomes' => $Incomes]);
    }
	
	public function indexversiontwo(Request $request){
		$District = District::orderBy('isorder')->get();
		$Incomes = Income::orderBy('isorder')->get();
        return view('frontend.versiontwo',['District' => $District,'Incomes' => $Incomes]);
	}
	
	public function indexversionthree(Request $request){
        $District = District::orderBy('isorder')->get();
        $Careers = Career::get();
		$Incomes = Income::orderBy('isorder')->get();
		return view('frontend.versionthree',['District' => $District,'Careers' => $Careers,'Incomes' => $Incomes]);
	}
	
	public function indexversionfour(Request $request){
        $District = District::orderBy('isorder')->get();
        $Careers = Career::get();
		$Incomes = Income::orderBy('isorder')->get();
		return view('frontend.versionfour',['District' => $District,'Careers' => $Careers,'Incomes' => $Incomes]);
    }
	
	public function thankyou(Request $request){
		return view('frontend.thankyou');
	}
	
	public function failed(Request $request){
		return view('frontend.failed');
	}

}