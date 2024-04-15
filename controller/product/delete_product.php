<?php
include '../../connect.php'; 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $productID = $_GET['id'];
    
   
    $query_delete_product = "DELETE FROM `product` WHERE `ProductID`='$productID'";
    $result = mysqli_query($con, $query_delete_product);
    
    if ($result) {
        $_SESSION['delete_message'] = "Product deleted successfully!";
        header("Location: ../../view/product.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }   
}
?>
