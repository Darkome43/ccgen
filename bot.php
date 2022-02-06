<?php
////////BENCHAMIN LUIS//////
//CHANNEL:- T.ME/SPACEHACKIN///
error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = $_ENV['BOT_TOKEN']; 
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
//==============BENCHAM======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$name = $from_id = $message->from->first_name;
$from_id = $message->from->id;
$text = $message->text;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$chatid = $update->callback_query->message->chat->id;
$callback_query = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message->message_id;
$START_MESSAGE = $_ENV['START_MESSAGE'];
//===============BENCHAM=============//
if ($text == "/start") {

            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"***🔶Hello, I'm Bot CC Gen. I don't have data, cvv.
🔶Use me*** `/cc visa/masterdCard/other.` ***for CC Gen.
✨$START_MESSAGE***",
 'parse_mode'=>'MarkDown',
            
        ]);
 }if(strpos($text,"/cc") !== false){ 
$cc = trim(str_replace("/cc","",$text)); 

$data = json_decode(file_get_contents("https://api.bincodes.com/cc-gen/json/3bc4deb465e7326cdd6993598f319a13/$cc"),true);
$card = $data['card']['card'];
$number =  $data['number']['number'];


 if($data['data']){
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"***CC Generated✅
               
➤ CC :*** `$card` ***
➤ number : $number
🔺Owner CC Gen bot: @Shein0425🔻***",
'parse_mode'=>"MarkDown",
]);
    }
else {
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"❌INVALID NAME❌",
               
]);
}
}

?>
