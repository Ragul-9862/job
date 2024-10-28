<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Edit Product</title>
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
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
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Product</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" action="update.php" method="post" novalidate enctype="multipart/form-data">
                                            <?php
                                            $cid = $_GET['catid'];
                                            $ret = mysqli_query($con, "select * from product where id='$cid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Product Name</label>
                                                        <input type="hidden" class="form-control" name="catid" value="<?php echo $cid; ?>">
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['product_name']; ?>" name="name" required>
                                                        <div class="invalid-feedback">Please provide a valid Value.</div>
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Product Price</label>
                                                        <input type="hidden" class="form-control" name="catid" value="<?php echo $cid; ?>">
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['price']; ?>" name="price" required>
                                                        <div class="invalid-feedback">Please provide a valid Value.</div>
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Product Description</label>
                                                        <input type="hidden" class="form-control" name="catid" value="<?php echo $cid; ?>">
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['description']; ?>" name="description" required>
                                                        <div class="invalid-feedback">Please provide a valid Value.</div>
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Default Image</label>
                                                        <div>
                                                        <img src="<?php echo $row['image_default']; ?>" alt="" width=50px height="50px">
                                                        </div>
                                                        <input type="file" class="form-control" id="validationCustom03" value="<?php echo $row['image_default']; ?>" name="imgdefault" >
                                                        <div class="invalid-feedback">Please provide a valid Value.</div>
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Default Image</label>
                                                        <input type="hidden" class="form-control" name="catid" value="<?php echo $cid; ?>">
                                                        <div>
                                                        <img src="<?php echo $row['image_hover']; ?>" alt="" width=50px height="50px">
                                                        </div>
                                                        <input type="file" class="form-control" id="validationCustom03" value="<?php echo $row['image_hover']; ?>" name="imghover" >
                                                        <div class="invalid-feedback">Please provide a valid Value.</div>
                                                    </div>
                                                </div>

                                            <?php } ?>
                                            <button class="btn btn-primary" type="submit" name="updateproduct">Update</button>
                                        </form>
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