<?php

include "Telegram.php";

$telegram = new Telegram("6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
if($text == "/startbot"){

    $option = [
        [$telegram->buildKeyboardButton('Button 1'), $telegram->buildKeyboardButton('Button 2')],
    ];

    

    $content = array('chat_id' => $chat_id, 'reply_markup' => $telegram->buildKeyBoard($option, $onetime = false), 'text' => "Salom botimizga hush kelibsiz!");
    $telegram->sendMessage($content);
}