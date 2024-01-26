<?php

$update = json_decode(file_get_contents('php://input'), true);


$servername = "localhost";
$username = "avisenam_ed";
$password = "aJT4.Q?luLRs";
$dbname = "avisenam_ed";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO bot_users (user_id, first_name, username)
VALUES ('{$update['message']['from']['id']}', '{$update['message']['from']['first_name']}', '{$update['message']['from']['username']}')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);



$url = "https://api.telegram.org/bot6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc/sendMessage";
$params = [
    'chat_id' => -1002089884417,
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
];

$url = $url . '?' . http_build_query($params);
file_get_contents($url);