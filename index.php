<?php

$update = json_decode(file_get_contents('php://input'), true);


echo "<pre>";
print_r($update);

$url = "https://api.telegram.org/bot6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc/sendMessage";
$params = [
    'chat_id' => -1002089884417,
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
];

$url = $url . '?' . http_build_query($params);
file_get_contents($url);
