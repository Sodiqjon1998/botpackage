<?php

include "Telegram.php";

$telegram = new Telegram("6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc");

$chat_id = $telegram->ChatID();
$content = array('chat_id' => $chat_id, 'text' => 'Test');
$telegram->sendMessage($content);