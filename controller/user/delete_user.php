<?php
include '../../connect.php'; 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userID = $_GET['id'];
    
    
    $query_delete_user = "DELETE FROM `users` WHERE `UserID`='$userID'";
    $result = mysqli_query($con, $query_delete_user);
    
    if ($result) {
        $_SESSION['delete_message'] = "User deleted successfully!";
        header("Location: ../../view/index.php"); 
        exit(); 
    } else {
        
        echo "Error: " . mysqli_error($con);
    }   
    }
?>

