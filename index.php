<?php


$chatId = "-1002089884417";

$token = '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc';
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_name = 'bot';

// Telegramdan kelgan xabarni olish
$update = json_decode(file_get_contents("php://input"), true);

// Xabar ma'lumotlarini izlash
$user_id = $update['message']['from']['id'];
$user_name = $update['message']['from']['first_name'];
$text = $update['message']['text'];

// Bazaga saqlash
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Bazaga ulanishda xatolik: " . $conn->connect_error);
}

$sql = "INSERT INTO user (id, first_name, text) VALUES ($user_id, '$user_name')";

if ($conn->query($sql) === TRUE) {
    echo "Xabar ma'lumotlari bazaga muvaffaqiyatli saqlandi";
} else {
    echo "Xabar ma'lumotlari saqlashda xatolik: " . $conn->error;
}

$conn->close();
?>
