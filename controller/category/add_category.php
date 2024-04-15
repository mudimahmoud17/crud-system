<?php
session_start(); 
include '../../connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryName = $_POST['categoryName'];

    $query_insert = "INSERT INTO category (CategoryName) VALUES ('$categoryName')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        $_SESSION['success_message'] = "Category inserted successfully!";
        header("Location: ../../view/category.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Add Category</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Add Category</h2>
                <div><a href=""><i data-feather="corner-down-left"></i></a></div>
            </div>
            
            <div id="messageDiv"></div>
            <form action="add_category.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter category name" name="categoryName">
                </div>
                <input type="submit" class="btn btn-primary" name="save">
            </form>
        </div>
    </div>
</body> 
</html>
