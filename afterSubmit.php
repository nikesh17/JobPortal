<?php
//DATABASE VARAIBLE
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khoj_management_system";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $last_name = $email = $phone = $password = $confirm_password = $gender = $selectOption = $selectOption1 = $selectOption2 = "";

if (isset($_POST["submit"])) {

    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["cpassword"];
    $gender = $_POST["rad"];
    $selectOption = $_POST['year'];
    $selectOption1 = $_POST['month'];
    $selectOption2 = $_POST['day'];

    //REGEX EXPRESSIONS
    $first_name_pattern = "/^[(a-zA-Z)+]{2,10}$/";
    $last_name_pattern = "/^[(a-zA-Z)+]{2,10}$/";
    $email_pattern = "/^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/";
    $phone_pattern = "/^([0-9]){10}$/";

    $monitor = false;
    //CHECKING FIRST NAME
    if (preg_match($first_name_pattern, $first_name)) {
        $monitor[0] = true;
    } else {
        $monitor[0] = false;
    }

    //CHECKING LAST NAME
    if (preg_match($last_name_pattern, $last_name)) {
        $monitor[1] = true;
    } else {
        $monitor[1] = false;
    }

    //CHECKING EMAIL
    if (preg_match($email_pattern, $email)) {
        $monitor[2] = true;
    } else {
        $monitor[2] = false;
    }
    //CHECKING PHONE
    if (preg_match($phone_pattern, $phone)) {
        $monitor[3] = true;
    } else {
        $monitor[3] = false;
    }

    //CHECKING PASSWORD
    if ($password == $confirm_password) {
        if (strlen($password) >= 20) {
            // echo "Password is too long it should be 20 or less than 20 character";
            $monitor[4] = false;
        } else if (strlen($password) <= 4) {
            // echo "Password is too short it should be 4 or more than 4 character";
            $monitor[4] = false;
        } else {
            $monitor[4] = true;
        }
    } else {
        // echo "Password doesnt match";
        $monitor[4] = false;
    }
    // GETTING RADIO BUTTON VALUE
    echo "<br>";
    if (!empty($_POST['rad'])) {
        // if ($gender == "Male") {
        //     echo "Male";
        // } else if ($gender == "Female") {
        //     echo "female";
        // } else {
        //     echo "Others";
        // }
        $monitor[5] = true;
    } else {
        // echo 'Please select the value';
        $monitor[5] = false;
    }
    //INSERTING DATA INTO DATABASE
    $flag = 0;
    for ($i = 0; $i <= 5; $i++) {
        if ($monitor[$i] == false) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 0) {
        $sql_record_insert = $conn->prepare("INSERT INTO registration(firstname,lastname,email,phone,password,dob_Year,dob_Month,dob_Day,gender) 
        VALUES (?,?,?,?,?,?,?,?,?)");
        $sql_record_insert->bind_param("sssisiiis", $first_name, $last_name, $email, $phone, $password, $selectOption, $selectOption1, $selectOption2, $gender);
        $sql_record_insert->execute();
        header("Location: ./login.php");

        $sql_record_insert->close();

        // VALUES ($first_name, $last_name,$email,$phone,$password,$selectOption,$selectOption1,$selectOption2, $gender)
        // if ($conn->query($sql_record_insert) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql_record_insert . "<br>" . $conn->error;
        // }
    }
}
$conn->close();