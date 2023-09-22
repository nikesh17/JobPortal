<?php

session_start();

include("db_conn.php");
include("admin_function.php");
$showInvalid = "True";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $admin = $_POST['admin'];
  $apassword = $_POST['apassword'];

  if (!empty($admin) && !empty($apassword)) {
    //read from database
    $query = "SELECT * FROM adminDb WHERE username = '$admin' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {

        $user_data = mysqli_fetch_assoc($result);

        if ($user_data['password'] === $apassword) {

          $_SESSION['admin'] = $user_data['name'];
          header("Location: adminHomePage.php");
          die;
        }
      }
    }

    $showInvalid = false;
  } else {
    $showInvalid = false;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <header>
    <div class="navbar">
      <a href="home.php"><img src="Khoj.png" alt=""></a>
    </div>
  </header>
  <div class="login-box">
    <h1>Admin</h1>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validation()">
    <?php
      if ($showInvalid == false) {
        echo '<h3 class="error" style="color: red;text-align:center;">Invalid username or password</h3>';
      }
      ?>
      <div class="textbox">
        <input type="text" placeholder="Username" id="username" name="admin">
        <span id="username" class="text-danger font-weight-bold"></span>
      </div>

      <div class="textbox">
        <input type="password" placeholder="Password" id="apassword" name="apassword">
        <span id="apassword" class="text-danger font-weight-bold"></span>
      </div>

      <div class="button">
        <input type="submit" name="submit" class="btn" value="Submit">
      </div>

      <script src='login.js'></script>

</body>

</html>