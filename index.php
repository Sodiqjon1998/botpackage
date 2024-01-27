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




echo check($update);



