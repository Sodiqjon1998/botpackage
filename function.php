<?php
include "config.php";



function sendMessage($method = "getMe", $params = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
    ]);
  
    $res = curl_exec($curl);
    curl_close($curl);
    return !curl_error($curl) ? json_decode($res, true) : false;
}


function sendMessageReply($method = "getMe", $params = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
    ]);
    $res = curl_exec($curl);
    curl_close($curl);
    return !curl_error($curl) ? json_decode($res, true) : false;
}

function sendMessageReply1($method = "getMe", $params = [], $data)
{
    $params['text'] = $data;
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
    ]);
 
    $res = curl_exec($curl);
    curl_close($curl);
    return !curl_error($curl) ? json_decode($res, true) : false;
}


function kickUser($chatId, $userId)
{
    // Set up the API endpoint
    $apiUrl = "https://api.telegram.org/bot" . API_KEY . "/deleteMessage?chat_id={$chatId}&message_id={$userId}";

    // You can use curl or any other HTTP library to make the request
    file_get_contents($apiUrl);
}


function check($update)
{
    global $conn;

    $text = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];

    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => '1. Erta turish (06:30) ✅', 'callback_data' => 'true'],
                ['text' => '1. Erta turish (06:30) ❌', 'callback_data' => 'false'],
            ],
            [
                ['text' => 'Option 3', 'callback_data' => 'option_3'],
                ['text' => 'Option 4', 'callback_data' => 'option_4']
            ],
            [
                ['text' => 'Submit', 'callback_data' => 'submit']
            ]
        ]
    ];


    $replyMarkup = json_encode($keyboard);

    $params = [
        'chat_id' => $update['message']['from']['id'],
        'text' => "@" . $update['message']['from']['username'] . " " . $update['message']['from']['first_name'] . " " . $update['message']['from']['last_name'],
        'reply_markup' => $replyMarkup,
    ];

    $notes = [
        'chat_id' => $chat_id,
        'text' => "/start deb yozib yuboring",
    ];

    $check = [
        'chat_id' => $chat_id,
        'text' => "Bazaga saqlandi",
    ];
    $sql1 = "SELECT * FROM bot_users WHERE user_id = '{$update['message']['from']['id']}'";

    // Execute the query
    $result = mysqli_query($conn, $sql1);


    if (mysqli_num_rows($result) > 0) {
        if ($update['message']['text'] == "/work") {
            sendMessageReply("sendMessage", $params);
        }
    } elseif ($update['message']['text'] == "/start") {
        echo kickUser($chat_id, $update['message']['message_id']);
        echo sendMessage("sendMessage", $check);
        $sql = "INSERT INTO bot_users (user_id, first_name, username, is_bot, language_code)
        VALUES (
        '{$update['message']['from']['id']}', 
        '{$update['message']['from']['first_name']}', '{$update['message']['from']['username']}', '{$update['message']['from']['is_bot']}', '{$update['message']['from']['language_code']}')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo sendMessage("sendMessage", $notes);
    }


}
