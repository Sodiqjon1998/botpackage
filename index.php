<?php

include "config.php";
include "function.php";


$update = json_decode(file_get_contents('php://input'), true);



$url = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";


$sql = "INSERT INTO bot_users (user_id, first_name, username, is_bot, language_code)
  VALUES (
    '{$update['message']['from']['id']}', 
    '{$update['message']['from']['first_name']}', '{$update['message']['from']['username']}', '{$update['message']['from']['is_bot']}', '{$update['message']['from']['language_code']}')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

$text = $update['message']['text'];
$chat_id = $update['message']['chat']['id'];

$params = [
  'chat_id' => $chat_id,
  'text' => $text
];

$notes = [
  'chat_id' => $chat_id,
  'text' => "/start deb yozib yuboring"
];





$sql1 = "SELECT * FROM bot_users";

// Execute the query
$result = mysqli_query($conn, $sql1);


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    if($row['user_id'] == $update['message']['from']['id']){
      echo sendMessage("sendMessage", $params);
    }
    else {
      echo kickUser($chat_id, $update['message']['from']['id']);
      echo sendMessage("sendMessage", $notes);
    }
  }
} else {
  echo "0";
}

mysqli_close($conn);
