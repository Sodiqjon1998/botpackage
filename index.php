<?php

define("API_KEY", "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chatId = "-1002089884417";

$telegramApiUrl = "https://api.telegram.org/bot".API_KEY."/sendMessage";

$params = [
    'chat_id' => $chatId,
    "text" => "Salom",
];

$response = file_get_contents($telegramApiUrl . '?' . http_build_query($params));