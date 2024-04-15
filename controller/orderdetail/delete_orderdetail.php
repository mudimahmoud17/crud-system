<?php
include '../../connect.php'; 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $orderDetailID = $_GET['id'];
    
   
    $query_delete_orderdetail = "DELETE FROM `orderdetail` WHERE `OrderDetailID`='$orderDetailID'";
    $result = mysqli_query($con, $query_delete_orderdetail);
    
    if ($result) {
        $_SESSION['delete_message'] = "Order detail deleted successfully!";
        header("Location: ../../view/orderdetail.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }   
}
?>
