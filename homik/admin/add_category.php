<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Add Category</title>
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>



        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->



        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                    data-feather="external-link"></i></span></span>Add Category</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <?php
                            // session_start();
                            $errorMsg = isset($_SESSION['errorMsg']) ? $_SESSION['errorMsg'] : '';
                            $successMsg = isset($_SESSION['successMsg']) ? $_SESSION['successMsg'] : '';

                            // Clear the session messages after displaying
                            unset($_SESSION['errorMsg']);
                            unset($_SESSION['successMsg']);
                            ?>

                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <form class="needs-validation" action="insert.php" method="post" novalidate
                                        enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-10">
                                                <label for="validationCustom03">Category</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    placeholder="Category Name" name="name" required>
                                                <div class="invalid-feedback">Please provide a valid category name.
                                                </div>
                                                <!-- Display the error message below the input field -->
                                                <?php if (!empty($errorMsg)) { ?>
                                                <div class="text-danger"><?php echo $errorMsg; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="catsubmit">Submit</button>
                                    </form>
                                    <!-- Display success message -->
                                    <?php if (!empty($successMsg)) { ?>
                                    <div class="text-success mt-3"><?php echo $successMsg; ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>



                    </div>
                </div>
            </div>


            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>

</body>

</html>
<?php } ?>