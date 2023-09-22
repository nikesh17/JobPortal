<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khoj_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//CREATING TABLE
$table = "CREATE TABLE IF NOT EXISTS adminDb (
    admin_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(20) NOT NULL
    )";

if ($conn->query($table) === TRUE) {
  echo "Table registration created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
