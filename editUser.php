<?php

session_start();

include("db_conn.php");
include("admin_function.php");
$showInvalid = "True";
$user_data = check_login($conn);
?>
<?php

if (isset($_POST['edit'])) {
  $id = $_GET['id'];
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $selectOption = $_POST['year'];
  $selectOption1 = $_POST['month'];
  $selectOption2 = $_POST['day'];

  $query = "UPDATE registration SET firstname = '$first_name' , lastname = '$last_name',phone = $phone,email='$email',gender='$gender',dob_Year=$selectOption,dob_Month=$selectOption1,dob_Day=$selectOption2 Where id=$id";

  $query_execute = mysqli_query($conn, $query);
  header('location: ./adminHomePage.php');
}
$id = $_GET['id'];
$past_data = "SELECT * FROM registration WHERE id = $id";
$query_past_data = mysqli_query($conn, $past_data);
while ($request = mysqli_fetch_array($query_past_data)) {




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>

<body>
  <?php include 'adminNavBarAfterLogin.php'?>
  
  <div class="contact-us-form">
    <form action="" method="post" onSubmit="return ValidateEditUser()">
      <div class="display-form-flex">
        <div class="two-column">
          <div>
            <p>First Name</p>
            <input type="text" value="<?php echo $request['firstname']?>" id="first_name" name="first-name">
            <p id="fresult" style="color: red;"></p>
          </div>

          <div>
            <p>Last Name</p>
            <input type="text" value="<?php echo $request['lastname']?>" id="last_name" name="last-name">
            <p id="lresult" style="color: red;"></p>
          </div>

        </div>
        <div class="two-column">
          <div>
            <p>Phone number</p>
            <input type="text" value="<?php echo $request['phone']?>" id="phone" name="phone">
            <p id="presult" style="color: red;"></p>
          </div>

          <div>
            <p>Email</p>
            <input type="text" value="<?php echo $request['email']?>" id="email" name="email">
            <p id="cresult" style="color: red;"></p>
          </div>

        </div>

        <div class="threeColumn">
          <div class="dob">
            Date of birth
          </div>
          <div class="selectdiv">

            <p>Year</p>
            <select name="year" id="year" value="<?php echo $request['dob_Year']?>">
              <?php
              for ($i = date("Y") - 5; $i >= 1990; $i--) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

          <div class="selectdiv">
            <p>Month</p>
            <select name="month" id="month" value="<?php echo $request['dob_Month']?>">
              <?php
              for ($i = 1; $i <= 12; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

          <div class="selectdiv">
            <p>Day</p>
            <select name="day" id="day" value="<?php echo $request['dob_Day']?>">
              <?php
              for ($i = 1; $i <= 31; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

        </div>
        <div class="threeColumn">
          <p id="gresult" style="color: red;"></p>
          <div class="">
            Gender
          </div>
          <div>

            <input type="radio" name="gender" value="Male" checked>
            <label for="gender">Male</label>

            <input type="radio" name="gender" value="Female">
            <label for="gender">Female</label>

            <input type="radio" name="gender" value="Others">
            <label for="gender">Other</label>
          </div>
<?php
}?>

        </div>
        <div class="submit-btn">
          <button type="submit" name="edit">Edit</button>
        </div>




    </form>

  </div>
  </div>
<script>
  function ValidateEditUser() {




var email_pattern =  /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,20}$/;
var validStatus = false;


var email = document.getElementById("email").value;
var option = document.getElementsByName("gender");

var fresult = document.getElementById("fresult");
var lresult = document.getElementById("lresult");
var presult = document.getElementById("presult");
var cresult = document.getElementById("cresult");


var first_name = document.getElementById("first_name").value;
var first_name_pattern = /^[a-zA-Z]([a-zA-Z]){2,15}$/;
if (!first_name_pattern.test(first_name)) {
  valid_first_name = false;
  fresult.innerHTML = "Please enter a valid first name";
} 
else {
  valid_first_name = true;
}


var last_name = document.getElementById("last_name").value;
var last_name_pattern = /^[a-zA-Z]([a-zA-Z]){2,15}$/;
if (!last_name_pattern.test(last_name)) {
  valid_last_name = false;
  lresult.innerHTML = "Please enter a valid first name";
} 
else {
  valid_last_name = true;
}

var phone = document.getElementById("phone").value;
var phone_pattern = /^([0-9]){10}$/;
if (!phone_pattern.test(phone)) {
  valid_phone_name = false;
  presult.innerHTML = "Please enter a valid phone number";
}
else {
  valid_phone_name = true;
} 
if (!email_pattern.test(email)) {
  valid_email_name = false;
  cresult.innerHTML = "Please enter a valid email";
} 
else {
  valid_email_name = true;
}
if (!(option[0].checked || option[1].checked || option[2].checked)) {
  cresult.innerHTML = " ";
  var result = document.getElementById("gresult");
  valid_gender_name = false;
  result.innerHTML = "please select one";
} else {
  valid_gender_name = true;
}
if (
    [
      valid_first_name,
      valid_last_name,
      valid_email_name,
      valid_phone_name,
      valid_gender_name,
    ].every((value) => {
      return value === true;
    })
  ) {
    validStatus = true;
  }
return validStatus;
}

</script>
</body>

</html>