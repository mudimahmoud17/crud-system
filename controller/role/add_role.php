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
            
            <div id="messageDiv"></div>
            <form action="add_role.php" method="post" >
            
                <div class="mb-3">
                    <label class="form-label">Role Name</label>
                    <input type="text" class="form-control" placeholder="enter Role Name" name="RoleName">
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

    $RoleID = $_POST['RoleID'];
    $RoleName = $_POST['RoleName'];
    

    $query_insert = "INSERT INTO `roles`(`RoleID`, `RoleName`) VALUES ('$RoleID','$RoleName')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        
        $_SESSION['success_message'] = "role inserted successfully!";
        header("Location: ../../view/role.php"); 
        exit(); 
    } else {
        
        echo "Error: " . mysqli_error($con);
    }
}
?>

