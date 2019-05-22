<?php 
$client_id = 'tforcom_client';
$client_secret = 'f7UeCqNXxev7AEZbPBMPMzLG2EzILe58';
$redirect_uri = 'http://easycredit.3forcom.info/testapi/callback.php';
// $authorization_code = $_GET['code'];
// if(!$authorization_code){
//     die('something went wrong!');
// }
$url = 'https://api.easycredit.vn/api/uaa/oauth/token';
$data = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
	'redirect_uri' => $redirect_uri,
	'grant_type' => 'client_credentials'
    //'code' => $authorization_code
 );
$options = array(
    'http' => array(
        'header'  => "Accept: application/json\r\n, Content-Type: application/form-data, Authorization: Basic Y2xpZW50YXBwOjEyMzQ1Ng==",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
var_dump($result);


function getToken(){
  $curl = curl_init();
 
  $params = array(
    CURLOPT_URL =>  ACCESS_TOKEN_URL."?"
                    ."code=".$code
                    ."&grant_type=authorization_code"
                    ."&client_id=". CLIENT_ID
                    ."&client_secret=". CLIENT_SECRET
                    ."&redirect_uri=". CALLBACK_URL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_NOBODY => false, 
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "content-type: application/x-www-form-urlencoded",
      "accept: *",
      "accept-encoding: gzip, deflate",
    ),
  );
 
  curl_setopt_array($curl, $params);
 
  $response = curl_exec($curl);
  $err = curl_error($curl);
 
  curl_close($curl);
 
  if ($err) {
    echo "cURL Error #01: " . $err;
  } else {
    $response = json_decode($response, true);    
    if(array_key_exists("access_token", $response)) return $response;
    if(array_key_exists("error", $response)) echo $response["error_description"];
    echo "cURL Error #02: Something went wrong! Please contact admin.";
  }
}


curl -X POST -H "Authorization: Basic dGZvcmNvbV9jbGllbnQ6ZjdVZUNxTlh4ZXY3QUVaYlBCTVBNekxHMkV6SUxlNTg=" -H "Content-Type: application/form-data" -H "Accept: application/json"  https://api.easycredit.vn/api/uaa/oauth/token -d 'grant_type=client_credentials'