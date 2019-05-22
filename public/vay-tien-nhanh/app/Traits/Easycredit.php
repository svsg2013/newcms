<?php
namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use App\PersonalLoan;
use App\LoanCalculator;
use App\FullProfile;
use Illuminate\Support\Facades\Log;
trait Easycredit{
	
	private function checkLead($phonenumber,$nationalid,$PartnerCode){
		try{
			$Token = $this->getToken();
			$client = new Client([
				'verify' => false,
				'headers' => array(
					'Authorization' => "Bearer {$Token}",
					'Content-Type' => "application/json",
				)
			]);
			$params = array(
				'partner_code' => $PartnerCode,
				'phone_number' => $phonenumber,
				'identity_card_id' => $nationalid
			);
			$response = $client->post(config('easycredit.lead.URLCheckLead'),[
				'body' => json_encode($params)
			]);
			//Log::info($response->getBody()->getContents());
			return json_decode($response->getBody()->getContents());
		}catch (BadResponseException $e){
			//Log::info($e);
			$response = $e->getResponse();
			return $response->getBody()->getContents();
		}catch (\Exception $e){
			//Log::info($e);
			return $e;
		}
	}
	
	private function createLead($params){
		try{
			$Token = $this->getToken();
			$client = new Client([
				'verify' => false,
				'headers' => array(
					'Authorization' => "Bearer {$Token}",
					'Content-Type' => "application/json",
				)
			]);
			$response = $client->post(config('easycredit.createLead.URLCreateLead'),[
				'body' => json_encode($params)
			]);
			//Log::info($response->getBody()->getContents());
			return json_decode($response->getBody()->getContents());
		}catch (BadResponseException $e){
			//Log::info($e);
			$response = $e->getResponse();
			return $response->getBody()->getContents();
		}catch (\Exception $e){
			//Log::info($e);
			return $e;
		}
	}
	
	private function getToken(){
		try{
			$client = new Client(['verify' => false ]);
			$response = $client->post(config('easycredit.token.URLToken'),[
				'headers' =>[
					'Accept' => 'application/json',
					'Content-Type' => 'application/x-www-form-urlencoded',
				],
				'form_params' => ['grant_type'=>'client_credentials'],
				'auth' => [
					config('easycredit.ClientId'),
					config('easycredit.ClientSecret')
				]
			]);
			$res = json_decode($response->getBody()->getContents(),true);
			if($res['access_token']){
				return $res['access_token'];
			}
			return "";
		}catch (BadResponseException $e){
			return "";
		}catch (\Exception $e){
			return "";
		}
	}
	
	private function sendLeadPersonal(FullProfile $LeadPersonal){
		$status = false;
		$LeadPersonal->status = false;
		$checkLead = $this->checkLead($LeadPersonal->phonenumber,$LeadPersonal->nationalid,config('easycredit.Personal.PartnerCode'));
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
			$leadId = "ECD1{$LeadPersonal->id}";
			$Province = "HCM";
			if(isset($LeadPersonal->district)){
				$Province = $LeadPersonal->district->name;
			}
			$params = array(
				'partner_code' => config('easycredit.Personal.PartnerCode'),
				'phone_number' => $LeadPersonal->phonenumber,
				'identity_card_id' => $LeadPersonal->nationalid,
				'customer_name' => $LeadPersonal->fullname,
				'province' => $Province,
				'product_code' => config('easycredit.Personal.ProductCode'),
				'source' =>  config('easycredit.Personal.Source'),
				'score_range' => config('easycredit.Personal.ScoreRange'),
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $LeadPersonal->utm_source,
					'utm_medium' => $LeadPersonal->utm_medium,
					'utm_campaign' => $LeadPersonal->utm_campaign,
					'utm_content' => $LeadPersonal->utm_content
				))
			);

			$this->createLead($params);
			$LeadPersonal->lead_id = $leadId;
			$LeadPersonal->status = true;
			$status = true;
		}
		$LeadPersonal->save();
		return $status;
	}
	
	private function sendLeadCalculator(FullProfile $LeadCalculator){
		$status = false;
		$LeadCalculator->status = false;
		$checkLead = $this->checkLead($LeadCalculator->phonenumber,$LeadCalculator->nationalid,config('easycredit.Calculator.PartnerCode'));
		//Log::info($checkLead);
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
			//$leadId = "ECD0{$LeadCalculator->id}";
			$leadId = "ACT0" . time();
			$Province = "HCM";
			if(isset($LeadCalculator->district)){
				$Province = $LeadCalculator->district->name;
			}
			$params = array(
				'partner_code' => config('easycredit.Calculator.PartnerCode'),
				'phone_number' => $LeadCalculator->phonenumber,
				'identity_card_id' => $LeadCalculator->nationalid,
				'customer_name' => $LeadCalculator->fullname,
				'province' => $Province,
				'product_code' => config('easycredit.Calculator.ProductCode'),
				'source' =>  config('easycredit.Calculator.Source'),
				'score_range' => config('easycredit.Calculator.ScoreRange'),
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $LeadCalculator->utm_source,
					'utm_medium' => $LeadCalculator->utm_medium,
					'utm_campaign' => $LeadCalculator->utm_campaign,
					'utm_content' => $LeadCalculator->utm_content
				)),
				'aff_sid' => $LeadCalculator->aff_sid /* 3fc */
			);
			$this->createLead($params);
			$LeadCalculator->lead_id = $leadId;
			$LeadCalculator->status = true;
			$status = true;
		}
		$LeadCalculator->save();
		return $status;
	}

	private function sendLeadCalculatorThree(FullProfile $LeadCalculator){
		$status = false;
		$LeadCalculator->status = false;
		$checkLead = $this->checkLead($LeadCalculator->phonenumber,$LeadCalculator->nationalid,config('easycredit.CalculatorThree.PartnerCode'));
		//Log::info($checkLead);
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
			//$leadId = "ECD0{$LeadCalculator->id}";
			$leadId = "CHIN0" . time();
			$Province = "HCM";
			if(isset($LeadCalculator->district)){
				$Province = $LeadCalculator->district->name;
			}
			$params = array(
				'partner_code' => config('easycredit.CalculatorThree.PartnerCode'),
				'phone_number' => $LeadCalculator->phonenumber,
				'identity_card_id' => $LeadCalculator->nationalid,
				'customer_name' => $LeadCalculator->fullname,
				'province' => $Province,
				'product_code' => config('easycredit.CalculatorThree.ProductCode'),
				'source' =>  config('easycredit.CalculatorThree.Source'),
				'score_range' => config('easycredit.CalculatorThree.ScoreRange'),
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $LeadCalculator->utm_source,
					'utm_medium' => $LeadCalculator->utm_medium,
					'utm_campaign' => $LeadCalculator->utm_campaign,
					'utm_content' => $LeadCalculator->utm_content
				)),
				'aff_sid' => $LeadCalculator->aff_sid /* 3fc */
			);
			$this->createLead($params);
			$LeadCalculator->lead_id = $leadId;
			$LeadCalculator->status = true;
			$status = true;
		}
		$LeadCalculator->save();
		return $status;
	}

	private function sendLeadCalculatorFour(FullProfile $LeadCalculator){
		$status = false;
		$LeadCalculator->status = false;
		$checkLead = $this->checkLead($LeadCalculator->phonenumber,$LeadCalculator->nationalid,config('easycredit.CalculatorFour.PartnerCode'));
		//Log::info($checkLead);
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
			//$leadId = "ECD0{$LeadCalculator->id}";
			$leadId = "CHIN2" . time();
			$Province = "HCM";
			if(isset($LeadCalculator->district)){
				$Province = $LeadCalculator->district->name;
			}
			$params = array(
				'partner_code' => config('easycredit.CalculatorFour.PartnerCode'),
				'phone_number' => $LeadCalculator->phonenumber,
				'identity_card_id' => $LeadCalculator->nationalid,
				'customer_name' => $LeadCalculator->fullname,
				'province' => $Province,
				'product_code' => config('easycredit.CalculatorFour.ProductCode'),
				'source' =>  config('easycredit.CalculatorFour.Source'),
				'score_range' => config('easycredit.CalculatorFour.ScoreRange'),
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $LeadCalculator->utm_source,
					'utm_medium' => $LeadCalculator->utm_medium,
					'utm_campaign' => $LeadCalculator->utm_campaign,
					'utm_content' => $LeadCalculator->utm_content
				)),
				'aff_sid' => $LeadCalculator->aff_sid /* 3fc */
			);
			$this->createLead($params);
			$LeadCalculator->lead_id = $leadId;
			$LeadCalculator->status = true;
			$status = true;
		}
		$LeadCalculator->save();
		return $status;
	}
}