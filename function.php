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
    // dump(curl_getinfo($curl));
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

    $params = [
        'chat_id' => $chat_id,
        'text' => $text
    ];

    $notes = [
        'chat_id' => $chat_id,
        'text' => "/start deb yozib yuboring"
    ];
    $sql1 = "SELECT * FROM bot_users";

    // Execute the query
    $result = mysqli_query($conn, $sql1);


    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_all($result);
        if (in_array($update['message']['from']['id'], $rows)) {
            echo sendMessage("sendMessage", $params);
        } else {
            echo kickUser($chat_id, $update['message']['from']['id']);
            echo sendMessage("sendMessage", $notes);
        }
    } else {
        echo "0";
    }

}
