<?php

session_start();

include("db_conn.php");
include("admin_function.php");
$showInvalid = "True";
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <link rel="stylesheet" href="http://localhost/project/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>

<body>
    <?php include "adminNavBarAfterLogin.php" ?>
    <div class="container">
        <div class="table-section">
            <div class="top-of-table">
                <div class="heading">
                    <h2>Users</h2>
            
                </div>
            </div>
            
            <div class="users-table">
                <table class="table data-table">
                    <tr class="data-heading">
                        <th class="table_head">id</th>
                        <th class="table_head">First Name</th>
                        <th class="table_head">Last Name</th>
                        <th class="table_head">Email</th>
                        <th class="table_head">Phone</th>
                        <th class="table_head">DOB</th>
                        <th class="table_head">Gender</th>
                        <th class="table_head">Registration date</th>
                        <th class="table_head">Edit/Delete</th>
                    </tr>

                    <?php
                    include 'db_conn.php';
                    $query = "SELECT * FROM Registration";
                    $query_execute = mysqli_query($conn, $query);
                    while ($request = mysqli_fetch_array($query_execute)) {

                    ?>
                        <tr>
                            <td><?php echo $request['id'] ?></td>
                            <td><?php echo $request['firstname'] ?></td>
                            <td><?php echo $request['lastname'] ?></td>
                            <td><?php echo $request['email'] ?></td>
                            <td><?php echo $request['phone'] ?></td>
                            <td><?php echo $request['dob_Year'] . '/' . $request['dob_Month'] . '/' . $request['dob_Day'] ?></td>
                            <td><?php echo $request['gender'] ?></td>
                            <td><?php echo $request['reg_date'] ?></td>
                            <td>

                                <button class="btn btn-primary"><a href="editUser.php?id=<?php echo $request['id']; ?>"> Edit </a></button>
                                <button class="btn btn-danger"><a href="deleteUser.php?id=<?php echo $request['id']; ?>"> Delete </a></button>

                            </td>


                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>


        </div>

    </div>
</body>

</html>