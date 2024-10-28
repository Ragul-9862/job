<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
   // Query to get the total category count
$categoryQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM category");
$result = mysqli_fetch_assoc($categoryQuery);
$totalCategories = $result['total']; // Store the category count 
  // Query to get the total blog count
$blogQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM blog");
$blogResult = mysqli_fetch_assoc($blogQuery);
$totalBlogs = $blogResult['total'];

  // Query to get the total user count
  $userQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM users");
  $userResult = mysqli_fetch_assoc($userQuery);
  $totalUsers = $userResult['total'];
  
  // Query to get the Process user count
  $userQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM process");
  $userResult = mysqli_fetch_assoc($userQuery);
  $totalProcess = $userResult['total'];
  
  // Query to get the Product user count
  $userQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM product");
  $userResult = mysqli_fetch_assoc($userQuery);
  $totalProduct = $userResult['total'];
    ?>
<!DOCTYPE html>
<html lang="en">
<style>
.dashboard-card {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.dashboard-card h4 {
    margin-bottom: 10px;
    font-size: 24px;
    color: #6FBF44;
    text-transform: uppercase;
}
</style>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Dashboard</title>
    <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <?php include_once('includes/navbar.php');
include_once('includes/sidebar.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <!-- Users Card -->
                    <div class="col-lg-4 mb-3">
                        <div class="dashboard-card">
                            <h4>Users</h4>
                            <p>Total: <?php echo $totalUsers; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="dashboard-card">
                            <h4>Categories</h4>
                            <p>Total: <?php echo $totalCategories; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="dashboard-card">
                            <h4>Gallery</h4>
                            <p>Total: <?php echo $totalProduct; ?></p>
                        </div>
                    </div>



                    <!-- Machinery Card -->

                    <div class="col-lg-4 mb-3">
                        <div class="dashboard-card">
                            <h4>Machinery</h4>
                            <p>Total: <?php echo $totalProcess; ?></p>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="dashboard-card">
                            <h4>Blogs</h4>
                            <p>Total: <?php echo $totalBlogs; ?></p>
                        </div>
                    </div>

                </div>
                <!-- /Main Content -->

            </div>

            <!-- Footer -->
            <?php include_once('includes/footer.php');?>
            <!-- /Footer -->
            <!-- /HK Wrapper -->

            <!-- jQuery -->
            <script src="vendors/jquery/dist/jquery.min.js"></script>
            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="dist/js/jquery.slimscroll.js"></script>
            <script src="dist/js/dropdown-bootstrap-extended.js"></script>
            <script src="dist/js/feather.min.js"></script>
            <script src="vendors/jquery-toggles/toggles.min.js"></script>
            <script src="dist/js/toggle-data.js"></script>
            <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
            <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
            <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
            <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="dist/js/vectormap-data.js"></script>
            <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
            <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
            <script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
            <script src="dist/js/irregular-data-series.js"></script>
            <script src="dist/js/init.js"></script>

</body>

</html>
<?php } ?>