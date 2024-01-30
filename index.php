<?php

include "config.php";
include "function.php";


$update = json_decode(file_get_contents('php://input'), true);

$url = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";

// dump(check($update));

