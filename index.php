<?php

$update = json_decode(file_get_contents('php://input'), true);


$servername = "localhost";
$username = "avisenam_ed";
$password = "aJT4.Q?luLRs";
$dbname = "avisenam_ed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username1 = $update['message']['from']['username'];
$user_id = $update['message']['from']['id'];

$sql = "INSERT INTO bot_users (user_id, first_name)
VALUES ($user_id, $username1)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



$url = "https://api.telegram.org/bot6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc/sendMessage";
$params = [
    'chat_id' => -1002089884417,
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
];

$url = $url . '?' . http_build_query($params);
file_get_contents($url);
