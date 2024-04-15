<?php
include '../../connect.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $categoryID = $_GET['id'];
    
    $query_delete = "DELETE FROM category WHERE CategoryID='$categoryID'";
    $result = mysqli_query($con, $query_delete);
    
    if ($result) {
        $_SESSION['delete_message'] = "Category deleted successfully!";
        header("Location: ../../view/category.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
