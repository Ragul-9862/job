<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        echo "<script>alert('Invalid details. Please try again.');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Page</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
    <style>
    .logo-main {
        display: flex;
        justify-content: center;

        img {
            width: 100px;
            margin-bottom: 10px;
        }
    }
    </style>
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper">
        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper" style="background-color: #6FBF44; min-height: 100vh;">
            <header class="d-flex justify-content-between align-items-center py-3 px-4"
                style="background-color: #6FBF44;">

            </header>

            <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="row w-100">
                    <div class="col-xl-6 mx-auto">
                        <div class="auth-form-wrap py-5 px-4 shadow-lg"
                            style="background-color: #ffffff; border-radius: 15px;">
                            <div class="auth-form w-100">
                                <form method="post">
                                    <a href="index.php" class="text-center logo-main">
                                        <img src="../images/logo/Homik.png" alt="Homik" class="logo-size-small" />
                                    </a>

                                    <div class="form-group mb-3">
                                        <input class="form-control form-control-lg" placeholder="Username" type="text"
                                            name="username" required="true"
                                            style="border: 2px solid #6FBF44; border-radius: 8px;">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <input class="form-control form-control-lg" placeholder="Password"
                                                type="password" id="password" name="password" required="true"
                                                style="border: 2px solid #6FBF44; border-radius: 8px;">
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-block" type="submit" name="login" style="background-color: #6FBF44; color: white; 
                                               border-radius: 8px; font-size: 18px;">
                                        Login
                                    </button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script>
    const togglePassword = document.querySelectorAll('#togglePassword');

    const password = document.querySelectorAll('#password');

    togglePassword.addEventListener('click', () => {

        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';


        password.setAttribute('type', type);

        this.classList.toggle('eye-off');
    });
    </script>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>
</body>

</html>