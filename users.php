<?php

include "config.php";

// SQL query to select all rows from the 'bot_users' table
$sql1 = "SELECT * FROM bot_users";

// Execute the query
$result = mysqli_query($conn, $sql1);

// Check if any rows were returned
// if (mysqli_num_rows($result) > 0) {
//     // Output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['username'];
//     }
// } else {
//     echo "0 results";
// }

// Close the connection


$i = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Guruh foydalanuvchilari</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>T/R</th>
                        <th>ID</th>
                        <th>Foydalanuvchi nomi</th>
                        <th>Ism va Familya</th>
                        <th>Bot yoki /emas</th>
                        <th>Tili</th>
                    </thead>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['user_id'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['is_bot'] ?></td>
                                <td><?= $row['language_code'] ?></td>
                            </tr>
                        <?php $i += 1;
                        } ?>
                    <?php } else { ?>
                        <tr>
                            <td>0</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>


<?php

mysqli_close($conn);

?>