<?php
include "config.php";


function sendMessage($method = "getMe", $params = []){
$url = "https://api.telegram.org/bot".API_KEY."/" . $method;
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $params,
    CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
]);
$res = curl_exec($curl);
// dump(curl_getinfo($curl));
curl_close($curl);
return !curl_error($curl) ? json_decode($res, true) : false;
}


