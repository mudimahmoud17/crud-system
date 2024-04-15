<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../connect.php'; 

    $orderID = $_POST['orderID'];
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $query_insert = "INSERT INTO `orderdetail`(`OrderID`, `ProductID`, `Quantity`, `Price`) VALUES ('$orderID','$productID','$quantity','$price')";
    $insert = mysqli_query($con, $query_insert);

    if ($insert) {
        $_SESSION['success_message'] = "Order detail inserted successfully!";
        header("Location: ../../view/orderdetail.php"); 
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
    <title>Add Order Detail</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Add Order Detail</h2>
                <div><a href=""><i data-feather="corner-down-left"></i></a></div>
            </div>
            
            <div id="messageDiv"></div>
            <form action="add_orderdetail.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Order ID</label>
                    <input type="number" class="form-control" placeholder="Enter order ID" name="OrderID">
                </div>
                <div class="mb-3">
                    <label class="form-label">Product ID</label>
                    <input type="number" class="form-control" placeholder="Enter product ID" name="ProductID">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter quantity" name="quantity">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Enter price" name="price">
                </div>
                <input type="submit" class="btn btn-primary" name="save">
            </form>
        </div>
    </div>
</body> 
</html>
