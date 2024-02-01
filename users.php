<?php

include "config.php";

// SQL query to select all rows from the 'bot_users' table
$sql1 = "SELECT * FROM bot_users";

// Execute the query
$result = mysqli_query($conn, $sql1);



$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Guruh foydalanuvchilari</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="display-2 mt-4 text-center">Telegram guruh foydalanuvchilari</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th style="width: 30px;">T/R</th>
                        <th>ID</th>
                        <th>Foydalanuvchi nomi</th>
                        <th>Ism va Familya</th>
                        <th>Bot yoki /emas</th>
                        <th>Tili</th>
                        <th>Action</th>
                    </thead>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td style="width: 30px;"><?= $i ?></td>
                                <td><?= $row['user_id'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['first_name'] ?></td>
                                <td><?= $row['is_bot'] ?></td>
                                <td><?= $row['language_code'] ?></td>
                                <td>
                                    <a href="<?='users.php?id='. $row['id']?>">
                                        <i class="fa fa-trash btn btn-danger btn-md"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $i += 1;
                        } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-info text-center">
                                    Ma'lumot topilmadi!
                                </p>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if(isset($_GET['id'])){
    $deleteSql = "delete from bot_users where id='{$_GET['id']}'";
    $delete_query = mysqli_query($conn, $deleteSql);
    echo "<script>window.open('users.php','_self')</script>";
}

mysqli_close($conn);

?>