<?php
include '../../connect.php'; 
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST['productID'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    
    $query_update_product = "UPDATE `product` SET `Name`='$name', `Description`='$description', `Price`='$price', `Quantity`='$quantity' WHERE `ProductID`='$productID'";
    $result = mysqli_query($con, $query_update_product);
    if ($result) {
        $_SESSION['update_message'] = "Product updated successfully!";
        header("Location: ../../view/product.php"); 
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
} else {
    if(isset($_GET['id'])) { 
        $productID = $_GET['id'];
        $query_select_product = "SELECT * FROM `product` WHERE `ProductID`='$productID'";
        $result = mysqli_query($con, $query_select_product);
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product ID not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Edit Product</h2>
    <form method="POST" action="edit_product.php">
      <input type="hidden" name="productID" value="<?php echo isset($product['ProductID']) ? $product['ProductID'] : ''; ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($product['Name']) ? $product['Name'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description"><?php echo isset($product['Description']) ? $product['Description'] : ''; ?></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo isset($product['Price']) ? $product['Price'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo isset($product['Quantity']) ? $product['Quantity'] : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
