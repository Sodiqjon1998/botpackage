<?php

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


$update = json_decode(file_get_contents('php://input'), true);

define("API_KEY", '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc');

$url = "https://api.telegram.org/bot".API_KEY."/sendMessage";


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

$sql = "SELECT user_id, username, first_name, is_bot, language_code FROM bot_users";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
  echo $row['user_id'];
}


function sendMessage(){
  global $update;
  global $url;
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
    'chat_id' => $update['message']['from']['id'],
    // 'chat_id' => $update['message']['chat']['id'],
    'chat_id' => -1002089884417,
    'text' => "Assalomu alaykum /start shu kabi yuboring!",
    // 'reply_markup' => $encodedKeyboard
  ];
  
  $url = $url . '?' . http_build_query($params);
  file_get_contents($url);
}

if($update['message']['text'] == "/start"){
  echo sendMessage();
}

public function kickUser($chatId, $userId)
{
    // Set up the API endpoint
    $apiUrl = "https://api.telegram.org/bot". API_KEY ."/deleteMessage?chat_id={$chatId}&message_id={$userId}";

    // You can use curl or any other HTTP library to make the request
    file_get_contents($apiUrl);
}


?>

<table>
  <thead>
    <th>T/R</th>
    <th>User_id</th>
    <th>Username</th>
    <th>First Name</th>
    <th>Bot yoki bot emas</th>
    <th>Tili</th>
  </thead>
    <?php 
      if(mysqli_num_rows($result) > 0){
        $i = 1;
        while($row = mysqli_fetch_array($result)){
    ?>
  <tr>
      <td><?=$i;?></td>
      <td><?=$row['id']?></td>
      <td><?=$row['user_id']?></td>
      <td><?=$row['username']?></td>
      <td><?=$row['first_name']?></td>
      <td><?=$row['is_bot']?></td>
      <td><?=$row['language_code']?></td>
  </tr>
  <?php
        $i += 1;
      }
    }
  ?>
</table>