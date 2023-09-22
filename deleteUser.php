<?php


include 'db_conn.php';
$id = $_GET['id'];
$query = "DELETE FROM registration WHERE id =$id";
mysqli_query($conn,$query);
header('location: adminHomePage.php')

?>