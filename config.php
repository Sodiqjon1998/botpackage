<?php

define("API_KEY", '6721406026:AAHO5AGgz3f4OZD_Z0nSofoISwr_-coWGJc');


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