<?php

include "Telegram.php";

$telegram = new Telegram("6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$content = array('chat_id' => $chat_id, 'text' => $text);
$telegram->sendMessage($content);