<?php
session_start();
include "../connect.php";

$users_sql = "SELECT * FROM users";
$all_user = mysqli_query($con, $users_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Users</title>
    
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include "../sidebar.php"; ?>

        <!-- Main content -->
        <div class="col-md-9">
            <div class="wrapper p-5 m-5">
                <!-- Message display area -->
                <div id="messageDiv">
                    <?php
                    if (isset($_SESSION['delete_message'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['delete_message'] . '</div>';
                        unset($_SESSION['delete_message']); 
                    }
                    ?>
                </div>

                <div id="messageDiv">
                    <?php
                    if (isset($_SESSION['update_message'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['update_message'] . '</div>';
                        unset($_SESSION['update_message']); 
                    }
                    ?>
                </div>

                <div id="messageDiv">
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                        unset($_SESSION['success_message']); 
                    }
                    ?>
                </div>

                <div class="d-flex p-2 justify-content-between mb-2">
                    <h2>All users</h2>
                    <div>
                        <a href="../controller/user/add_user.php" class="btn btn-primary">Add User</a>
                    </div>
                </div>

                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_user as $user): ?>
                            <tr>
                                <td>
                                    <?php echo $user['UserID']; ?>
                                </td>
                                <td>
                                    <?php echo $user['Username']; ?>
                                </td>
                                <td>
                                    <?php echo $user['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $user['RoleID']; ?>
                                </td>
                                <td>
                                    <a href="../controller/user/edit_user.php?id=<?php echo $user['UserID']; ?>"><button
                                            type="button" class="btn btn-primary">Edit</button></a>
                                    <a href="../controller/user/delete_user.php?id=<?php echo $user['UserID']; ?>"><button
                                            type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to show message -->
<script>
    // Function to show message
    function showMessage(message) {
        // Find messageDiv element
        var messageDiv = document.getElementById("messageDiv");
        // Set inner HTML to display the message
        messageDiv.innerHTML = '<div class="alert alert-success" role="alert">' + message + '</div>';
        // Hide the message after 3 seconds
        setTimeout(function () {
            messageDiv.innerHTML = '';
        }, 3000);
    }
</script>

</body>
</html>
