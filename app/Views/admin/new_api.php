<?php
data_default_timezone_set("Asia/Kolkata");
$url = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "& lang=en&units=matric&APPID=" . $apiKey;
// $data = ['email'=>'user@admin.com','password'=>'qwerty','table'=>'customer_details','action'=>'get_data'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
$res = curl_exec($ch);
curl_close($ch);
$dt = json_decode($res);
echo"<pre>";
print_r($dt);
?>