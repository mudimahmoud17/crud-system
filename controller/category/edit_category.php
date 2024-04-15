<?php
session_start(); 
include '../../connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryID = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];

    $query_update = "UPDATE category SET CategoryName='$categoryName' WHERE CategoryID='$categoryID'";
    $update = mysqli_query($con, $query_update);

    if ($update) {
        $_SESSION['update_message'] = "Category updated successfully!";
        header("Location: ../../view/category.php"); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    if(isset($_GET['id'])) { 
        $categoryID = $_GET['id'];
        $query_select = "SELECT * FROM category WHERE CategoryID='$categoryID'";
        $result = mysqli_query($con, $query_select);
        $category = mysqli_fetch_assoc($result);
    } else {
        echo "Category ID not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Edit Category</title>
</head>
<body>
    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
                <h2>Edit Category</h2>
                <div><a href=""><i data-feather="corner-down-left"></i></a></div>
            </div>
           
            <div id="messageDiv"></div>
            <form action="edit_category.php" method="post">
                <input type="hidden" name="categoryID" value="<?php echo isset($category['CategoryID']) ? $category['CategoryID'] : ''; ?>">
                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter category name" name="categoryName" value="<?php echo isset($category['CategoryName']) ? $category['CategoryName'] : ''; ?>">
                </div>
                <input type="submit" class="btn btn-primary" name="save">
            </form>
        </div>
    </div>
</body> 
</html>
