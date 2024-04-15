<?php
include '../../connect.php'; 
session_start();
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleID = $_POST['RoleID'];
    
    
    $query_update_user = "UPDATE `users` SET `Username`='$name', `Email`='$email', `Password`='$password', `RoleID`='$roleID' WHERE `UserID`='$userID'";
    $result = mysqli_query($con, $query_update_user);
    if ($result) {
        $_SESSION['update_message'] = "User update successfully!";
        header("Location: ../../view/index.php"); 
    } else {
        echo "Error updating user: " . mysqli_error($con);
    }
} else {
    if(isset($_GET['id'])) { 
        $userID = $_GET['id'];
        $query_select_user = "SELECT * FROM `users` WHERE `UserID`='$userID'";
        $result = mysqli_query($con, $query_select_user);
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User ID not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST" action="edit_user.php">
      <input type="hidden" name="userID" value="<?php echo isset($user['UserID']) ? $user['UserID'] : ''; ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($user['Username']) ? $user['Username'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user['Email']) ? $user['Email'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($user['Password']) ? $user['Password'] : ''; ?>">
      </div>
      <div class="form-group">
        <label for="RoleID">Role ID:</label>
        <input type="text" class="form-control" id="RoleID" name="RoleID" value="<?php echo isset($user['RoleID']) ? $user['RoleID'] : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
