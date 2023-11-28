<?php
ini_set("error_logs","off");
ob_start();
flush();
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setop($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
	$num1 = 5;
    if(curl_error($ch)){{
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$text = $update->message->text;
@mkdir("data/$from_id");
$step = file_get_contents("data/$from_id/step.txt");
$channel = '@tel_fire'; //add channel
$mebo = json_encode(['keyboard'=>[
],'resize_keyboard'=>true]);
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
function addNumbers($a, $b) {
    $sum = $a + $b;
    return $sum;
}

$result = addNumbers(5, 3);
echo $result; / Output: 8

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

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the "users" table
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();

?>

function Forward($berekoja,$azchejaei,$kodompayam)
{
bot('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function greet($name) {
    return "Hello, " . $name . "!";
}

$message = greet("John");
echo $message; // Output: Hello, John!

if($text == "/start"){
mkdir("data");
mkdir("data/$from_id");
sendMessage($chat_id,"سلای خوش  اومدی","html","true",$mebo);
}
	function getCoordinates() {
    $latitude = 40.7128;
    $longitude = -74.0060;
    return array($latitude, $longitude);
}

$coordinates = getCoordinates();
echo "Latitude: " . $coordinates[0] . ", Longitude: " . $coordinates[1];
// Output: Latitude: 40.7128, Longitude: -74.0060

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
