<?php
include '../../connect.php'; 
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $RoleID = $_POST['RoleID'];
  $RoleName = $_POST['RoleName'];
    
    $query_update_user = "UPDATE `roles` SET `RoleID`='$RoleID', `RoleName`='$RoleName' WHERE `RoleID`='$RoleID'";
    $result = mysqli_query($con, $query_update_user);
    if ($result) {
        $_SESSION['update_message'] = "role update successfully!";
        header("Location: ../../view/role.php"); 
    } else {
        echo "Error updating user: " . mysqli_error($con);
    }
} else {
  if(isset($_GET['id'])) { 
      $RoleID = $_GET['id']; 
      $query_select_user = "SELECT * FROM `roles` WHERE `RoleID`='$RoleID'";
      $result = mysqli_query($con, $query_select_user);
      $user = mysqli_fetch_assoc($result);
  } else {
      echo "RoleID not provided.";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST" action="edit_role.php">
      <input type="hidden" name="userID" value="<?php echo isset($user['RoleID']) ? $user['RoleID'] : ''; ?>">
      
      
      <div class="form-group">
        <label for="RoleID">Role ID:</label>
        <input type="text" class="form-control" id="RoleID" name="RoleID" value="<?php echo isset($user['RoleID']) ? $user['RoleID'] : ''; ?>">
      </div>

      <div class="form-group">
        <label for="RoleID">Role Name:</label>
        <input type="text" class="form-control" id="RoleID" name="RoleName" value="<?php echo isset($user['RoleName']) ? $user['RoleName'] : ''; ?>">
      </div>


      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
