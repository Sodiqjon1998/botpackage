<?php

define("API_KEY", "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chatId = "-1002089884417";

$telegramApiUrl = "https://api.telegram.org/bot".API_KEY."/sendMessage";

$keyboard = [
    'keyboard' => [
        ['Button 1', 'Button 2'],
        ['Button 3', 'Button 4'],
    ],
    'resize_keyboard' => true,
    'one_time_keyboard' => true
];

$replyMarkup = json_encode($keyboard);


$params = [
    'chat_id' => $chatId,
    "text" => "Salom",
    "reply_markup" => $replyMarkup 
];

$response = file_get_contents($telegramApiUrl . '?' . http_build_query($params));
$responseDatas = json_decode($response, true);


file_put_contents("log.json", json_encode(json_decode(file_get_contents('php://input'), true), JSON_PRETTY_PRINT));

$update = json_decode(file_get_contents('log.json'));

echo "<pre>";

print_r($update);
