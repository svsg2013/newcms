<?php
// $handle = curl_init('https://api.easycredit.vn/api/uaa/oauth/token');
// $data = array('grant_type' => 'client_credentials', 'client_id' => 'tforcom_client', 'client_secret' => 'f7UeCqNXxev7AEZbPBMPMzLG2EzILe58');
// curl_setopt($handle, CURLOPT_POST, true);
// curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
// $resp = curl_exec($handle);

// var_dump($resp);



$client_id = 'tforcom_client';
$client_secret = 'f7UeCqNXxev7AEZbPBMPMzLG2EzILe58';
$code = $_GET['code'];
$redirect_uri = 'http://easycredit.3forcom.info/testapi/callback.php';
$url = 'https://api.easycredit.vn/api/uaa/oauth/token?client_id='.$client_id.'&client_secret='.$client_secret.'&grant_type=client_credentials&redirect_uri='.$redirect_uri;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST,true);

$exec = curl_exec($ch);
$info = curl_getinfo($ch);
print_r($info);
curl_close($ch);

$json = json_decode($exec);
if (isset($json->refresh_token)){
global $refreshToken;
$refreshToken = $json->refresh_token;
}

$accessToken = $json->access_token;
$token_type = $json->token_type;
print_r('aa: ' . $json->access_token);
print_r($json->refresh_token);
print_r($json->token_type);