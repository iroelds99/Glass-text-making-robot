<?php
ini_set("error_logs","off");
ob_start();
flush();
define('API_KEY','توکن'); // add token
//================================//
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){{
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//===================//
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$text = $update->message->text;
@mkdir("data/$from_id");
$step = file_get_contents("data/$from_id/step.txt");
$channel = '@tel_fire'; //add channel
//=======================//
$mebo = json_encode(['keyboard'=>[
[['text'=>'ساخت متن لینک دار']],
],'resize_keyboard'=>true]);
//======================//
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function save($filename, $data)
{
    $file = fopen($filename, 'w');
    fwrite($file, $data);
    fclose($file);
}
function sendAction($from_id, $action){
    bot('sendChataction',[
        'chat_id'=>$chat_id,        'action'=>$action
        ]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
bot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
//===================//
if($text == "/start"){
mkdir("data");
mkdir("data/$from_id");
sendMessage($chat_id,"سلام چطوری خوش  اومدی","html","true",$mebo);
}
elseif($text == "ساخت متن لینک دار"){
save("data/$from_id/step.txt","sub");
sendMessage($chat_id,"متن خود را ارسال کنید.
توجه کنید که برای لینک دار کردن متن [متن](لینک) استفاده کنید.");
}
elseif($step == "sub"){
save("data/$from_id/step.txt","none");
save("data/$from_id/text.txt",$text);
$textmo = file_get_contents("data/$from_id/text.txt");
sendMessage($chat_id,"$textmo","MarkDown");
}
?>
