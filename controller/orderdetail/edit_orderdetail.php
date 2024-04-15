<?php
include '../../connect.php'; 
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderDetailID = $_POST['orderDetailID'];
    $orderID = $_POST['orderID'];
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    
    $query_update_orderdetail = "UPDATE `orderdetail` SET `OrderID`='$orderID', `ProductID`='$productID', `Quantity`='$quantity', `Price`='$price' WHERE `OrderDetailID`='$orderDetailID'";
    $result = mysqli_query($con, $query_update_orderdetail);
    if ($result) {
        $_SESSION['update_message'] = "Order detail updated successfully!";
        header("Location: ../../view/orderdetail.php");
    } else {
        echo "Error updating order detail: " . mysqli_error($con);
    }
} else {
    if(isset($_GET['id'])) { 
        $orderDetailID = $_GET['id'];
        $query_select_orderdetail = "SELECT * FROM `orderdetail` WHERE `OrderDetailID`='$orderDetailID'";
        $result = mysqli_query($con, $query_select_orderdetail);
        $orderDetail = mysqli_fetch_assoc($result);
    } else {
        echo "Order detail ID not provided.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Order Detail</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Edit Order Detail</h2>
    <form method="POST" action="edit_orderdetail.php">
      <input type="hidden" name="orderDetailID" value="<?php echo isset($orderDetail['OrderDetailID']) ? $orderDetail['OrderDetailID'] : ''; ?>">
      <div class="form-group">
        <label for="orderID">Order ID:</label>
        <input type="number" class="form-control" id="orderID" name="orderID" value="<?php echo isset($orderDetail['OrderID']) ? $orderDetail['OrderID'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="productID">Product ID:</label>
        <input type="number" class="form-control" id="productID" name="productID" value="<?php echo isset($orderDetail['ProductID']) ? $orderDetail['ProductID'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo isset($orderDetail['Quantity']) ? $orderDetail['Quantity'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo isset($orderDetail['Price']) ? $orderDetail['Price'] : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
