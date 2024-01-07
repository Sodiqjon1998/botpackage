<?php
// Telegram botning tokeni
$token = "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc";

// Telegram dan kelgan so'rovni olish
$update = json_decode(file_get_contents("php://input"), TRUE);

// Kelgan so'rovni tekshirish
if (isset($update["message"])) {
    $chatId = $update["message"]["chat"]["id"];
    $messageText = $update["message"]["text"];
    $userId = $update['message']['from']['id'];

    // Qo'ng'iroqni shakllantirish
    $responseText = "Sizning so'rovingiz: $messageText";

    // Telegramga javob yuborish
    sendMessage($chatId, $responseText, $token, $userId);
}

// Telegramga javob yuborish uchun funksiya
function sendMessage($chatId, $message, $token, $userId) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $userId,
    ];

    echo $userId;

    $url = $url . '?' . http_build_query($params);
    file_get_contents($url);
}

?>
