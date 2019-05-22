<?php
namespace App\Traits;
use App\Models\LandingCustomer;
use App\Models\LandingPartner;
use GuzzleHttp\Client;
trait Easycredit{
	
	private function checkLead($phonenumber, $nationalid, $partnerCode){
		try{
			$token = $this->getToken();
			$client = new Client([
				'verify' => false,
				'headers' => array(
					'Authorization' => "Bearer {$token}",
					'Content-Type' => "application/json",
				)
			]);
			$params = array(
				'partner_code' => $partnerCode,
				'phone_number' => $phonenumber,
				'identity_card_id' => $nationalid
			);
			$response = $client->post(config('easycredit.lead.URLCheckLead'),[
				'body' => json_encode($params)
			]);
			//Log::info($response->getBody()->getContents());
			return json_decode($response->getBody()->getContents());
		} catch (BadResponseException $e){
			//Log::info($e);
			$response = $e->getResponse();
			return $response->getBody()->getContents();
		} catch (\Exception $e){
			//Log::info($e);
			return $e;
		}
	}
	
	private function createLead($params){
		try {
			$token = $this->getToken();
			$client = new Client([
				'verify' => false,
				'headers' => array(
					'Authorization' => "Bearer {$token}",
					'Content-Type' => "application/json",
				)
			]);
			$response = $client->post(config('easycredit.createLead.URLCreateLead'),[
				'body' => json_encode($params)
			]);
			//Log::info($response->getBody()->getContents());
			return json_decode($response->getBody()->getContents());
		} catch (BadResponseException $e){
			//Log::info($e);
			$response = $e->getResponse();
			return $response->getBody()->getContents();
		} catch (\Exception $e){
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

    private function getOTPToken(){
        try{
            $client = new Client(['verify' => false ]);
            $response = $client->post(config('easycredit.token.URLToken'),[
                'headers' =>[
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => ['grant_type'=>'client_credentials'],
                'auth' => [
                    config('easycredit.OTPClientId'),
                    config('easycredit.OTPClientSecret')
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
	
	private function sendLeadPersonal(LandingCustomer $leadPersonal){
		$status = false;
		$leadPersonal->status = false;
        $checkLead = $this->checkLead(
            $leadPersonal->phonenumber,
            $leadPersonal->nationalid,
            $leadPersonal->partner_code
        );
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
            $leadId = "{$leadPersonal->partner_code}1" . time();
			$province = "HCM";
			if(isset($leadPersonal->district)){
				$province = $leadPersonal->district->name;
			}
			$params = array(
				'partner_code' => $leadPersonal->partner_code,
				'phone_number' => $leadPersonal->phonenumber,
				'identity_card_id' => $leadPersonal->nationalid,
				'customer_name' => $leadPersonal->fullname,
				'province' => $province,
                'product_code' => 'SCL',
				'source' => 'sms',
				'score_range' => '0-0',
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $leadPersonal->utm_source,
					'utm_medium' => $leadPersonal->utm_medium,
					'utm_campaign' => $leadPersonal->utm_campaign,
					'utm_content' => $leadPersonal->utm_content
				)),
                'aff_sid' => $leadPersonal->aff_sid /* 3fc */
			);

			$this->createLead($params);
			$leadPersonal->lead_id = $leadId;
			$leadPersonal->phone_status = true;
			$status = true;

            $leadPersonal->save();
		}
//		$leadPersonal->save();
		return $status;
	}
	
	private function sendLeadCalculator(LandingCustomer $leadCalculator){
		$status = false;
		$leadCalculator->status = false;
		$checkLead = $this->checkLead(
		    $leadCalculator->phonenumber,
            $leadCalculator->nationalid,
            $leadCalculator->partner_code
        );
		//Log::info($checkLead);
		if(isset($checkLead->LeadCheckResult->status) and $checkLead->LeadCheckResult->status == "pass"){
			$leadId = "{$leadCalculator->partner_code}0" . time();
			$province = "HCM";
			if(isset($leadCalculator->district)){
                $province = $leadCalculator->district->name;
			}
			$params = array(
				'partner_code' => $leadCalculator->partner_code,
				'phone_number' => $leadCalculator->phonenumber,
				'identity_card_id' => $leadCalculator->nationalid,
				'customer_name' => $leadCalculator->fullname,
				'province' => $province,
				'product_code' => 'SCL',
				'source' => 'sms',
				'score_range' => '0-0',
				'ts_lead_id' => $leadId,
				'other_data' => json_encode(array(
					'utm_source' => $leadCalculator->utm_source,
					'utm_medium' => $leadCalculator->utm_medium,
					'utm_campaign' => $leadCalculator->utm_campaign,
					'utm_content' => $leadCalculator->utm_content
				)),
                'aff_sid' => $leadCalculator->aff_sid /* 3fc */
			);

			$this->createLead($params);
            $leadCalculator->lead_id = $leadId;
            $leadCalculator->phone_status = true;
			$status = true;
            $leadCalculator->save();
		}
//        $leadCalculator->save();
		return $status;
	}
    private function sendOTP($phonenumber, $smsID, $partnerCode){
	    $result = [
	        'success'   => false,
            'message'   => 'Có lỗi xảy ra, vui lòng thử lại sau',
        ];
        try{
            $partnerCode = 'ACT'; // need edit
            $token = $this->getOTPToken();
            $client = new Client([
                'verify' => false,
                'headers' => array(
                    'Authorization' => "Bearer {$token}",
                    'Content-Type' => "application/json",
                    'Accept' => "application/json"
                )
            ]);
            $sendOtpUrl = config('easycredit.sendOTPUrl');
            $params = array(
                'partner_code' => $partnerCode,
                'message' => array(
                    array(
                        'sms_id' => $smsID,
                        'phone_number' => $phonenumber
                    )
                )

            );
            $response = $client->post($sendOtpUrl,[
                'body' => json_encode($params)
            ]);

            $responseBody = json_decode($response->getBody()->getContents());
            if($response->getStatusCode() == 200) {
                $result = [
                    'success'   => true,
                    'message'   => 'Success',
                ];
            } else {
                $result['success'] = false;
                if($responseBody->message) {
                    $result['message'] = $responseBody->message;
                }
            }
        } catch (BadResponseException $e){
            //Log::info($e);
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody()->getContents());
            $result['success'] = false;
            if($responseBody->message) {
                $result['message'] = $responseBody->message;
            }
        } catch (\Exception $e){
            if($e->getResponse()) {
                $response = $e->getResponse();
                $responseBody = json_decode($response->getBody()->getContents());
                $result['success'] = false;
                if ($responseBody->message) {
                    $result['message'] = $responseBody->message;
                }
            } else {
                $result['success'] = false;
            }
        }
        return $result;
    }

    private function verifyOTP($phoneNumber, $partnerCode, $verifyCode){
        $result = [
            'success'   => false,
            'message'   => 'Có lỗi xảy ra, vui lòng thử lại sau',
        ];
        try{
            $partnerCode = 'ACT'; // need edit
            $token = $this->getOTPToken();
            $client = new Client([
                'verify' => false,
                'headers' => array(
                    'Authorization' => "Bearer {$token}",
                    'Content-Type' => "application/json",
                )
            ]);
            $checkOTPUrl = config('easycredit.checkOTP');
            $params = array(
                'phone_number' => $phoneNumber,
                'partner_code' => $partnerCode,
                'verification_code' => $verifyCode,
            );
            $response = $client->post($checkOTPUrl,[
                'body' => json_encode($params)
            ]);
            $responseBody = json_decode($response->getBody()->getContents());
            if($response->getStatusCode() == 200) {
                $result = [
                    'success'   => true,
                    'message'   => 'Success',
                ];
            } else {
                $result['success'] = false;
                if($responseBody->message) {
                    $result['message'] = $responseBody->message;
                }
            }
        } catch (BadResponseException $e){
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody()->getContents());
            $result['success'] = false;
            if($responseBody->message) {
                $result['message'] = $responseBody->message;
            }
        } catch (\Exception $e){
            if($e->getResponse()) {
                $response = $e->getResponse();
                $responseBody = json_decode($response->getBody()->getContents());
                $result['success'] = false;
                if ($responseBody->message) {
                    $result['message'] = $responseBody->message;
                }
            } else {
                $result['success'] = false;
            }
        }
        return $result;
    }
}