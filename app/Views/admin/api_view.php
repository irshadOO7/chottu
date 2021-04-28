<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/chhotu/api");
$data = ['email'=>'user@admin.com','password'=>'qwerty','table'=>'customer_details','action'=>'get_data'];
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result1 = curl_exec($ch);
curl_close($ch);
echo $result1;

$dt = json_decode($result1, false);
print_r($dt);

?>