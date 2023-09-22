<?php

session_start();

include("db_conn.php");
include("function.php");
$showInvalid = "True";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user_email = $_POST['user-email'];
  $user_password = $_POST['user-password'];

  if (!empty($user_email) && !empty($user_password)) {

    //read from database
    $query = "SELECT * FROM registration WHERE email = '$user_email' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {

        $user_data = mysqli_fetch_assoc($result);

        if ($user_data['password'] === $user_password) {

          $_SESSION['user-email'] = $user_data['email'];
          header("Location: ./employeeHomePage.php");
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
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <header>
    <div class="navbar">
      <a href="home.php"><img src="Khoj.png" alt=""></a>
    </div>
  </header>
  <div class="login-box">
    <h1>Login</h1>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validation()">
    <?php
      if ($showInvalid == false) {
        echo '<h3 class="error" style="color: red;text-align:center;">Invalid email or password</h3>';
      }
      ?>
      <div class="textbox">
        <input type="text" placeholder="Email" id="username" name="user-email">
        <span id="username" class="text-danger font-weight-bold"></span>
      </div>

      <div class="textbox">
        <input type="password" placeholder="Password" id="password" name="user-password">
        <span id="password" class="text-danger font-weight-bold"></span>
      </div>

      <div class="button">
        <input type="submit" name="submit" class="btn" value="Sign in">
      </div>

      <div class="button">
        <a href="register.php"><input type="button" class="btn" value="Create an account"></a>
      </div>

      <script src='login.js'></script>

</body>

</html>