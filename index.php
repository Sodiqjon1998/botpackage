<?php


$servername = "localhost"; // O'zgartiring
$username = "yuksali9_edu"; // O'zgartiring
$password = "aS7X?uamuE]I"; // O'zgartiring
$dbname = "yuksali9_edu"; // O'zgartiring

// MySQL bağlantısını yaratish
$conn = mysqli_connect($servername, $username, $password);

// Bağlanti tekshirish
if ($conn) {
    echo "Successfly";
}

echo "Xatolik";
