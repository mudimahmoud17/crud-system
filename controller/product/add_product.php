<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Add Product</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Add Product</h2>
                <div><a href=""><i data-feather="corner-down-left"></i></a></div>
            </div>
           
            <div id="messageDiv"></div>
            <form action="add_product.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter product name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" placeholder="Enter product description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Enter product price" name="price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter product quantity" name="quantity">
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
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $query_insert = "INSERT INTO `product`(`Name`, `Description`, `Price`, `Quantity`) VALUES ('$name','$description','$price','$quantity')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        $_SESSION['success_message'] = "Product inserted successfully!";
        header("Location: ../../view/product.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
