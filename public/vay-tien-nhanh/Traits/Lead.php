<?php
namespace App\Traits;

use GuzzleHttp\Client;

trait Lead{
	
    public function checkLead(){
        /* $urlPost = config()->get('googleapi.url.checkRobot');
        $secretKey = config()->get('googleapi.secret');
        $client = new Client();
        $response = $client->post($urlPost,[
            'form_params' => array(
                'secret' => 	$secretKey,
                'response' => $token
            )
        ]);
        $result = json_decode($response->getBody()->getContents());

        return $result->success; */
    }
}
