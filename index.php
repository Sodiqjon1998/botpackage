<?php
require_once "config.php";

$update = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO bot_users (user_id, first_name, username)
VALUES ('{$update['message']['from']['id']}', '{$update['message']['from']['first_name']}', '{$update['message']['from']['username']}')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

define('API_KEY', '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc');



function sendMessage(){
  $url = "https://api.telegram.org/bot".API_KEY."/sendMessage";
  global $url;
  global $update;

  $keyboard = [
    "keyboard" => [
      [["text" => "Checkbox 1", "request_contact" => true]],
      [["text" => "Checkbox 2", "request_contact" => true]],
      [["text" => "Yuborish"]],
    ],
    "resize_keyboard" => true,
    "one_time_keyboard" => true,
  ];
  $encodedKeyboard = json_encode($keyboard);
  $params = [
    'chat_id' => $update['message']['chat']['id'],
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
    'reply_markup' => $encodedKeyboard
  ];
  
  $url = $url . '?' . http_build_query($params);
  file_get_contents($url);
}

echo sendMessage();


