<?php
$token = "6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc";

$update = json_decode(file_get_contents("php://input"), TRUE);

// Start komandasini tekshirish
if (isset($update["message"]) && isset($update["message"]["text"])) {
    $messageText = $update["message"]["text"];
    $chatId = $update["message"]["chat"]["id"];
    $userId = $update["message"]["from"]["id"];

    // Start komandasini tekshirish
    if ($messageText == '/startbot') {
        // Foydalanuvchiga salom berish
        $responseText = "Assalomu alaykum! Botimizga xush kelibsiz, $userId!";
        sendMessage($chatId, $responseText, $token);

        // Foydalanuvchini ma'lumotlar bazasiga qo'shish
        saveUserToDatabase($userId);
    }
}

// Telegramga javob yuborish uchun funksiya
function sendMessage($chatId, $message, $token)
{
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    $url = $url . '?' . http_build_query($params);
    file_get_contents($url);
}

// Foydalanuvchini ma'lumotlar bazasiga qo'shish uchun funksiya
function saveUserToDatabase($userId)
{

    echo $userId;
    $servername = "localhost"; // O'zgartiring
    $username = "yuksali9_edu"; // O'zgartiring
    $password = "aS7X?uamuE]I"; // O'zgartiring
    $dbname = "yuksali9_edu"; // O'zgartiring



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (id, firs_name)
VALUES (,$userId 'Sodiqjon')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
