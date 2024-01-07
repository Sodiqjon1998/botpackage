


<?php
// Token va guruh ID sini o'zingizning botingiz ma'lumotlari bilan almashtiring
$botToken = "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc";
$chatId = -1002089884417; // Guruh ID

// Telegramdan kelgan so'rovlar ma'lumotlari
$update = json_decode(file_get_contents("php://input"), TRUE);

// A'zolar ro'yxati
$members = $update["message"]["new_chat_members"];

// A'zolikni tekshirish va xabar yuborish
foreach ($members as $member) {
    $user_id = $member["id"];
    $user_name = $member["first_name"];

    // A'zolikni tekshirish
    $is_member = isMember($botToken, $chatId, $user_id);

    // Xabarni yuborish
    if (!$is_member) {
        sendMessage($botToken, $chatId, "Assalomu alaykum, $user_name! Xush kelibsiz guruhga!");
    }
}

// A'zolikni tekshirish funksiyasi
function isMember($token, $chat_id, $user_id) {
    $url = "https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=$user_id";
    $result = json_decode(file_get_contents($url), TRUE);
    return ($result["ok"] && $result["result"]["status"] == "member");
}

// Xabar yuborish funksiyasi
function sendMessage($token, $chat_id, $text) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $params = [
        "chat_id" => $chat_id,
        "text" => $text,
    ];
    file_get_contents($url . '?' . http_build_query($params));
}
?>

