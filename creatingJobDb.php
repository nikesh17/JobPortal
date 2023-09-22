<?php
include("db_conn.php");
$table = "CREATE TABLE IF NOT EXISTS JobForm (
    job_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(30) NOT NULL,
    job_description VARCHAR(30) NOT NULL,
    category VARCHAR(50)  NOT NULL,
    location VARCHAR(50)  NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    due_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status int default 1
    )";

if ($conn->query($table) === TRUE) {
  echo "Table registration created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>