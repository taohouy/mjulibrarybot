<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Webhook for Time Bot- Facebook Messenger Bot
 * User: adnan
 * Date: 24/04/16
 * Time: 3:26 PM
 */
$access_token = "EAAFiLqqrKJcBAJl3qCcn9fZAnujlQEhbXsROiW9xq336ZA8iOSMWhLPh1wZCpW9tZAjgDD25XPq10kWIZATkIWWJ8G0QRpSamjDiSI7ivoYobGdxMlztDRszonhXbkxcnXZBWKZAjj4CI0FUupk5ypHr3xAClcIARf0ngZAfCauGSgZDZD";
$verify_token = "mju_library_bot";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
    $challenge = $_REQUEST['hub_challenge'];
    $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';
/**
 * Some Basic rules to validate incoming messages
 */
$getmessage = explode("#",$message);
//if(preg_match('RegisterLibraryAlert', $message)) {
    
//if("สมัครบริการแจ้งเตือน" == $getmessage[0]){

    $message_to_reply = 'ขอบคุณที่สมัครใช้บริการ เราจะคอยส่งข้อมูลข่าวสารดีๆ ให้คุณได้รับทราบ';

//}
//API Url
$url = 'https://graph.facebook.com/v2.8/me/messages?access_token='.$access_token;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    },
    "message":{
        "text":"'.$message_to_reply.'"
    }
}';
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}
