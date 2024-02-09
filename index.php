<?php

include "config.php";
include "function.php";


$update = json_decode(file_get_contents('php://input'), true);

$url = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";

check($update);


if (isset($update['callback_query'])) {

    // Reply with callback_query data
    if($update['callback_query']['message']['text'] == "/submit"){
        $data = http_build_query([
            'text' => 'Selected language: ' . $update['callback_query']['data'],
            'chat_id' => $update['callback_query']['message']['text']
        ]);
        file_get_contents($botAPI . "/sendMessage?{$data}");
    }
    
    $data = http_build_query([
        'text' => 'Selected language: ' . $update['callback_query']['data'],
        'chat_id' => $update['callback_query']['message']['text']
    ]);
    file_get_contents($botAPI . "/sendMessage?{$data}");
}

