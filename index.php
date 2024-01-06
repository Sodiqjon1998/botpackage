<?php

include "Telegram.php";

$telegram = new Telegram("6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
if($text == "/startbot"){

    $option = [
        [$telegram->buildKeyboardButton('Button 1'), $telegram->buildKeyboardButton('Button 2')],
    ];

    $telegram->buildKeyBoard($option);

    $content = array('chat_id' => $chat_id, 'text' => "Salom botimizga hush kelibsiz!");
    $telegram->sendMessage($content);
}