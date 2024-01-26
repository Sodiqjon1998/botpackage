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

// $sql = "INSERT INTO bot_users (user_id, first_name, text)
// VALUES ('{$update['message']['from']['id']}', '{$update['message']['from']['username']}', '{$update['message']['text']}')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }