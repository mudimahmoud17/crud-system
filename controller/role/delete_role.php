<?php
include '../../connect.php';  
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $RoleID = $_GET['id']; 

    
    $query_delete_role = "DELETE FROM `roles` WHERE `RoleID`='$RoleID'";
    $result = mysqli_query($con, $query_delete_role);
    
    if ($result) {
        $_SESSION['delete_message'] = "Role deleted successfully!";
        header("Location: ../../view/role.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }   
}
?>
