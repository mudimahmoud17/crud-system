<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Add User</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Add User</h2>
                <div><a href=""><i data-feather="corner-down-left"></i></a></div>
            </div>
            <!-- Message display area -->
            <div id="messageDiv"></div>
            <form action="add_user.php" method="post" >
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="enter your email" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="Password" class="form-control" placeholder="enter your password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">RoleID</label>
                    <input type="number" class="form-control" placeholder="enter RoleID" name="RoleID">
                </div>
                <input type="submit" class="btn btn-primary" name="save">
            </form>
        </div>
    </div>

</body> 
</html>

<?php

session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../connect.php'; 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $RoleID = $_POST['RoleID'];

    $query_insert = "INSERT INTO `users`(`Username`, `Email`, `Password`, `RoleID`) VALUES ('$name','$email','$password','$RoleID')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        
        $_SESSION['success_message'] = "User inserted successfully!";
        header("Location: ../../view/index.php"); 
        exit(); 
    } else {
        
        echo "Error: " . mysqli_error($con);
    }
}
?>

