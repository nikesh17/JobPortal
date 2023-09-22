<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>

<body>
  <header>
    <div class="navbar">
      <a href="home.php"><img src="Khoj.png" alt=""></a>
    </div>
  </header>
  <div class="login-box">
    <h1>Register</h1>
    <form action="afterSubmit.php" method="post" onsubmit="return validateForm()">
      <div class="textbox">
        <div>
        <input type="text" name= "fname" id="fname" placeholder="First Name">
        <p id="fError" class="errors"></p>
        </div>
       <div>
        <input type="text" name="lname" id="lname" placeholder="Last Name">
        <p id="lError" class="errors"></p>
        </div>
      </div>
      <p id="first-name-result"></p>
      <div class="textbox">
        <div>
        <input type="text" name="email" id="email" placeholder="Email">
        <p id ="eError" class="error"></p>
        </div>
        <div>

        <input type="text" name="number" id="number" placeholder="Phone number">
        <p id="nError" class="error"></p>
        </div>

      </div>

      <div class="textbox">
        <div>
        <input type="password" name="password" id="password" placeholder="Password">
        <p id="pError" class="error"></p>
        </div>
        <div>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
        <p id="cfError" class="error"></p>
        </div>

      </div>

      <div class="textbox">
        <p class="dob" id="gender">Gender</p>
      </div>
      <div class="radiobtnContainer">
        
        <label class="rad-label">
          <input type="radio" id="male" class="rad-input" name="rad" value="male">
          <div class="rad-design"></div>
          <div class="rad-text">Male</div>
        </label>

        <label class="rad-label">
          <input type="radio" id="female" class="rad-input" name="rad" value="female">
          <div class="rad-design"></div>
          <div class="rad-text">Female</div>
        </label>

        <label class="rad-label">
          <input type="radio" id="others" class="rad-input" name="rad" value="others">
          <div class="rad-design"></div>
          <div class="rad-text">Others</div>
        </label>
        
      </div>
      <p id="rError" class="errors"></p>
      <div class="textbox">
        <p class="dob" id="dob">Date of birth</p>
      </div>

      <div class="textbox">
        <div class="threeColumn">

          <div class="selectdiv">
            <p>Year</p>
            <select name="year" id="year">
              <?php
              for ($i = date("Y") - 12; $i >= 1990; $i--) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

          <div class="selectdiv">
            <p>Month</p>
            <select name="month" id="month">
              <?php
              for ($i = 1; $i <= 12; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

          <div class="selectdiv">
            <p>Day</p>
            <select name="day" id="day">
              <?php
              for ($i = 1; $i <= 31; $i++) {
                echo "<option>$i</option>";
              }
              ?>
            </select>
          </div>

        </div>
      </div>

      <input type="submit" class="btn" id="register" name="submit" value="Register">
    </form>
    <div class="textbox" id="login" name="login"><a href="login.php">Already have an account?</a>
    </div>
  </div>
  <script src='register.js'></script>
</body>

</html>