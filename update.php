<?php

include "config.php";

// SQL query to select all rows from the 'bot_users' table
$sql1 = "SELECT * FROM bot_users";

// Execute the query
$result = mysqli_query($conn, $sql1);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['username'];
    }
} else {
    echo "0 results";
}

// Close the connection
mysqli_close($conn);