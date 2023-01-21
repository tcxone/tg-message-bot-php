<?php
$tgtoken = "12345:xxxxxxxxxxxx"; //TGbot token
$person = "123456"; //user uid

$time = 'UTC ' . gmdate("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];

if(!empty($_GET["message"])){
	$message = $_GET['message'];
}else{
	$message = 'nothing';
}

$info = '<b>Time : </b>'.$time.'%0A<b>Message : </b>'.$message.'%0A<b>IP : </b>'.$ip.'%0A<b>UA : </b>'.$ua;
$url = "https://api.telegram.org/bot".$tgtoken."/sendMessage?parse_mode=HTML&chat_id=".$person."&text=".$info;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
curl_close($curl);

echo "done";
?>