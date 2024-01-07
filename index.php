<?php


$servername = "localhost"; // O'zgartiring
    $username = "yuksali9_med"; // O'zgartiring
    $password = "d9e[I2J0l=Pw"; // O'zgartiring
    $dbname = "yuksali9_edu"; // O'zgartiring

    // MySQL bağlantısını yaratish
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Bağlanti tekshirish
    if ($conn) {
        echo "Successfly";
    }

    echo "Xatolik";
