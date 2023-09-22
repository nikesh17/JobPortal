<?php
session_start();
include("db_conn.php");
include("function.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="employeeHomePage.css">
    <link rel="stylesheet" href="http://localhost/project/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="navigation-bar">
            <div class="content">
                <div class="icon">
                   <a href="employeeHomepage.php"> <img src="Khoj.png" alt="" srcset=""> </a>
                </div>
                <div class="logout">
                    <a href="./logout.php"> <button class="btn">Logout</button></a>
                </div>
            </div>
            <div class="user-photo">
                <img src="" alt="">
            </div>
            <div class="expand">
                <a href=""><img src="" alt=""></a>
            </div>
        </div>
        </nav>
    </header>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form>

</body>

</html>