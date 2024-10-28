<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($con, $query);
        $user = mysqli_fetch_assoc($result);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']); // Get new password
        $id = intval($_POST['id']);

        // Update query including password
        $update_query = "UPDATE users SET user_name = '$username', password = '$password' WHERE id = $id";
        
        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('User updated successfully.'); window.location.href='manage_user.php';</script>";
        } else {
            echo "<script>alert('Error updating user: " . mysqli_error($con) . "');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edit User</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="hk-wrapper hk-vertical-nav">
        <?php include_once('includes/navbar.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

        <div class="hk-pg-wrapper">
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            <div class="container">
                <h4 class="hk-pg-title">Edit User</h4>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user['user_name']; ?>" required>
                        
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $user['password']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>

            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>
</body>

</html>

<?php } ?>
