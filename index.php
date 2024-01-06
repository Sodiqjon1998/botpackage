<?php

include "Telegram.php";

$telegram = new Telegram("6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
if($text == "/startbot"){

    $option = [
        [$telegram->buildKeyboardButton('Button 1'), $telegram->buildKeyboardButton('Button 2')],
    ];

    $CITIES = ['Toshkent', 'Samarqand', 'Buxoro', 'Qarshi', 'Andijon', 'Nukus'];

    $options = getInlineKeyboardButtons($CITIES, 3);
    $keyb = $telegram->buildInlineKeyBoard($options);
    $content = ['chat_id' => $chatID, 'text' => 'Bosh menyu', 'reply_markup' => $keyb];

    $telegram->sendMessage($content);
    
}


function getInlineKeyboardButtons($buttons, $columnNum = 2) {
    global $telegram;
    $options = [];
    for ($i = 0; $i < count($buttons);) {
        $tempArray = [];
        for ($j = 0; $j < $columnNum && $i < count($buttons); $j++) {
            $tempArray[] = $telegram->buildInlineKeyboardButton($buttons[$i], "", $buttons[$i]);
            $i++;
        }
        $options[] = $tempArray;
    }
    return $options;
}