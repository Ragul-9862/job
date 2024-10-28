<?php
session_start();
include('includes/config.php');

// Check if the admin is logged in
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit();
}

// Code to delete a category along with related products
if (isset($_GET['del'])) {
    $cmpid = $_GET['del'];

    // Delete associated products first
    $deleteProducts = mysqli_query($con, "DELETE FROM product WHERE cat_id='$cmpid'");

    if ($deleteProducts) {
        // Now delete the category
        $query = mysqli_query($con, "DELETE FROM category WHERE id='$cmpid'");
        
        if ($query) {
            echo "<script>alert('Category and related products deleted successfully.');</script>";
        } else {
            echo "<script>alert('Failed to delete category.');</script>";
        }
    } else {
        echo "<script>alert('Failed to delete products associated with this category.');</script>";
    }

    echo "<script>window.location.href='manage_category.php'</script>";
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
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">
        <!-- Top Navbar -->
        <?php 
        include_once('includes/navbar.php');
        include_once('includes/sidebar.php'); 
        ?>
        
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </nav>

            <!-- Container -->
            <div class="container">
                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title">
                        <span class="pg-title-icon">
                            <span class="feather-icon">
                                <i data-feather="database"></i>
                            </span>
                        </span>Manage Categories
                    </h4>
                </div>

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
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM category");
                                                $cnt = 1;
                                                foreach ($query as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td><?php echo $row['category_name']; ?></td>
                                                        <td><?php echo $row['date_created']; ?></td>
                                                        <td>
                                                            <a href="edit_category.php?catid=<?php echo $row['id']; ?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                                <i class="icon-pencil"></i>
                                                            </a>
                                                            <a href="manage_category.php?del=<?php echo $row['id']; ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to delete?');">
                                                                <i class="icon-trash txt-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $cnt++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
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
