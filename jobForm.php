
<?php
include("db_conn.php");
  if(isset($_POST['submit'])){

    $job_title = $_POST['title'];
    $job_description = $_POST['description'];
    $job_category = $_POST['category'];
    $job_location = $_POST['location'];
    $sql_query = "INSERT INTO jobform(job_title,job_description,category,location) VALUES('$job_title','$job_description','$job_category','$job_location')";
    $execute_query = mysqli_query($conn,$sql_query);


  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Post a job</title>
  <link rel="stylesheet" href="jobForm.css">
</head>

<body>
  <header>
    <div class="navbar">
      <a href="home.php"><img src="Khoj.png" alt=""></a>
    </div>
  </header>
  <div class="login-box">
    <h1>Job Form</h1>
    <form action="" method="post" onsubmit="return validateForm()">
      <div class="textbox">
        <input type="text" name= "title" id="title" placeholder="Job title">
        <p id="tError" class="errors"></p>
      </div>
      <p id="first-name-result"></p>
      <div class="textbox">
        <input type="text" name="description" id="description" placeholder="Job Description">
        <p id="dError" class="errors"></p>
      </div>

      <div class="textbox">
        <input type="text" name= "phone" id="phone" placeholder="Phone number">
        <p id="nError" class="errors"></p>
      </div>

      <div class="textbox">
        <input type="text" name= "email" id="email" placeholder="Email">
        <p id="eError" class="errors"></p>
      </div>

      <div class="textbox">
        <input type="text" name= "address" id="address" placeholder="Address">
        <p id="aError" class="errors"></p>
      </div>
     

        <p class="category" name="category"id="category">Category</p>
      
        <select name = "category" id= "category">
          <option class="rad-text" value="accounting">Accounting</option>
          <option class="rad-text" value="banking">Banking</option>
          <option class="rad-text" value="designing">Designing</option>
          <option class="rad-text" value="health">Health</option>
          <option class="rad-text" value="hospitality">Hospitality</option>
          <option class="rad-text" value="it">IT and Telecommunication</option>
          <option class="rad-text" value="marketing">Marketing</option>
          <option class="rad-text" value="media">Media</option>
          <option class="rad-text" value="sales">Sales</option>
          <option class="rad-text" value="others">Others</option>

        </select>
      <p id="cError" class="errors"></p>

        <p class="dob" id="location">Location</p>
      <select name="location">
          <option class="rad-text" value="kathmandu">Kathmandu</option>
          <option class="rad-text" value="lalitpur">Lalitpur</option>
          <option class="rad-text" value="bhaktapur">Bhaktapur</option>
        </select>
      
      <p id="lError" class="errors"></p>

      <input type="submit" class="btn" id="submitform" name="submit" value="Post">
</form>
  </div>
  <script src='register.js'></script>
</body>

</html>