<?php
include("db_conn.php");
$queryForStatusChange = "UPDATE jobform set status = 0 WHERE reg_date < CURRENT_TIMESTAMP ";
$queryExecution = mysqli_query($conn,$queryForStatusChange);

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
        <?php include('employerNavBar.php') ?>

<div class="body-container">
<div class="sidebar">
    <div>
        <ul class="lists">
        <li> <a href="">Job Category</a> </p>
        <li> <a href="">Search Jobs</a> </p>
        </ul>

    </div>
</div>
<?php

$query = "SELECT * FROM jobform";
$query_execute = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($query_execute)){


?>
<div class="apply-box">
    <h1><?php echo $row['job_title']?></h1>
    <h3><?php echo $row['location']?></h3>
    <p><?php echo $row['category']?></p>
    <p><?php echo $row['reg_date']?></p>
    <p><?php echo $row['job_description']?></p>
    <button class="apply">Apply</button>
</div>
<?php
}
?>
</div>


</body>

</html>