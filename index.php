<?php
// Telegram botning tokeni
$token = "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc";

// Telegram dan kelgan so'rovni olish
$update = json_decode(file_get_contents("php://input"), TRUE);

// Kelgan so'rovni tekshirish
if (isset($update["message"])) {
    $chatId = $update["message"]["chat"]["id"];
    $messageText = $update["message"]["text"];

    // Guruhdagi yangi a'zolar
    if (isset($update["message"]["new_chat_members"])) {
        $newMembers = $update["message"]["new_chat_members"];

        foreach ($newMembers as $member) {
            // Yangi a'zolarga xush kelibsiz xabarini yuborish
            $responseText = "Assalomu alaykum, " . $member["first_name"] . "! Men sizning Telegram botingizman. Xush kelibsiz!";
            sendMessage($chatId, $responseText, $token);
        }
    }

    // Start buyrug'i kelganida xush kelibsiz xabarini yuborish
    if ($messageText == "/start") {
        $responseText = "Assalomu alaykum! Men sizning Telegram botingizman. Xush kelibsiz!";
        sendMessage($chatId, $responseText, $token);
    }
}

// Telegramga javob yuborish uchun funksiya
function sendMessage($chatId, $message, $token) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    $url = $url . '?' . http_build_query($params);
    file_get_contents($url);
}
?>
