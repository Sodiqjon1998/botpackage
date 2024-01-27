<?php
require_once "config.php";



function savveBasa(){
  $sql = "INSERT INTO bot_users (user_id, first_name, username, is_bot, language_code)
  VALUES (
    '{$update['message']['from']['id']}', 
    '{$update['message']['from']['first_name']}', 
    '{$update['message']['from']['username']}', 
    '{$update['message']['from']['is_bot']}', 
    '{$update['message']['from']['language_code']}')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  return "true";
}



function sendMessage(){

  $update = json_decode(file_get_contents('php://input'), true);
  $url = "https://api.telegram.org/bot".API_KEY."/sendMessage";

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
    // 'chat_id' => $update['message']['from']['id'],
    // 'chat_id' => $update['message']['chat']['id'],
    'chat_id' => -1002089884417,
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
    // 'reply_markup' => $encodedKeyboard
  ];
  
  $url = $url . '?' . http_build_query($params);
  return file_get_contents($url);
}

if($update['message']['text'] == '/start'){
  echo sendMessage();
  echo savveBasa();
}



function kickUser($chatId, $userId)
{
    // Set up the API endpoint
    $apiUrl = "https://api.telegram.org/bot".API_KEY."/deleteMessage?chat_id={$chatId}&message_id={$userId}";

    // You can use curl or any other HTTP library to make the request
    file_get_contents($apiUrl);
}

