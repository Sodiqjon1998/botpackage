<?php



$token = '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc';
$chat_id = '-1002089884417'; // Foydalanuvchi chat_id

// Xabar matni
$message = "Salom, bu cURL orqali yuborilgan xabar!";

// cURL so'rovi tuzish
$api_url = "https://api.telegram.org/bot$token/sendMessage";
$post_fields = array(
    'chat_id' => $chat_id,
    'text' => $message
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// Natija
echo $result;
?>

