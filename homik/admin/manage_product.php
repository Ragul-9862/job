<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Code for deletion   
    if (isset($_GET['del'])) {
        $cmpid = $_GET['del'];
        // Delete product
        $query = mysqli_query($con, "DELETE FROM product WHERE id='$cmpid'");
        echo "<script>alert('Product record deleted.');</script>";
        echo "<script>window.location.href='manage_product.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Manage Category</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"
        type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">
        <!-- Top Navbar -->
        <?php include_once('includes/navbar.php'); include_once('includes/sidebar.php'); ?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                                    data-feather="database"></i></span></span>Manage Categories</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Category Name</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Default Image</th>
                                                    <th>Hover Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT pr.*, c.category_name
                                                          FROM product pr
                                                          INNER JOIN category c ON pr.cat_id = c.id";
                                                $result = mysqli_query($con, $query);

                                                $cnt = 1;
                                                foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                                    <td>
                                                        <img style="width: 50px; height:50px"
                                                            src="<?php echo htmlspecialchars($row['image_default']); ?>"
                                                            onerror="this.onerror=null; this.src='default-image.jpg';">
                                                    </td>
                                                    <td>
                                                        <img style="width: 50px; height:50px"
                                                            src="<?php echo htmlspecialchars($row['image_hover']); ?>"
                                                            onerror="this.onerror=null; this.src='default-image.jpg';">
                                                    </td>
                                                    <td>
                                                        <a href="edit_product.php?catid=<?php echo $row['id']; ?>"
                                                            class="mr-25" data-toggle="tooltip"
                                                            data-original-title="Edit">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        <a href="manage_product.php?del=<?php echo ($row['id']); ?>"
                                                            data-toggle="tooltip" data-original-title="Delete"
                                                            onclick="return confirm('Do you really want to delete?');">
                                                            <i class="icon-trash txt-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $cnt++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>

</html>
<?php } ?>