<?php



$token = '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc';
$chat_id = '-1002089884417'; // Foydalanuvchi chat_id

// Webhookdan olingan ma'lumotlarni olish
$update = json_decode(file_get_contents("php://input"), true);

print_r($update);

// Eng so'nggi yozilgan xabarlar
foreach ($update['message']['text'] as $message) {
    $user_id = $message['from']['id'];
    $user_name = $message['from']['first_name'];
    $text = $message['text'];

    echo "User ID: $user_id\n";
    echo "User Name: $user_name\n";
    echo "Text: $text\n";
    echo "-------------------------\n";
}
?>

