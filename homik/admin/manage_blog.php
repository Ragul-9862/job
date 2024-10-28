<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Handle deletion
    if (isset($_GET['del'])) {
        $id = intval($_GET['del']);
        $query = "DELETE FROM blog WHERE id = $id";
        if ($con->query($query) === TRUE) {
            echo "<script>alert('Blog deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error deleting blog: " . $con->error . "');</script>";
        }
        echo "<script>window.location.href='manage_blog.php';</script>";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Manage Blog</title>
        <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="hk-wrapper hk-vertical-nav">
            <?php include_once('includes/navbar.php'); include_once('includes/sidebar.php'); ?>

            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

            <div class="hk-pg-wrapper">
                <nav class="hk-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light bg-transparent">
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage</li>
                    </ol>
                </nav>

                <div class="container">
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title">Manage Blog</h4>
                    </div>

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
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM blog";
                                                    $result = mysqli_query($con, $query);
                                                    $cnt = 1;

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<tr>';
                                                        echo '<td>' . $cnt . '</td>';
                                                        echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                                                        echo '<td>' . htmlspecialchars(substr($row['content'], 0, 50)) . '...</td>';
                                                        echo '<td><img style="width: 50px; height:50px" src="' . htmlspecialchars($row['image']) . '"></td>';
                                                        echo '<td>
                                                            <a href="edit_blog.php?id=' . $row['id'] . '" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i></a>
                                                            <a href="manage_blog.php?del=' . $row['id'] . '" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm(\'Do you really want to delete?\');">
                                                            <i class="icon-trash txt-danger"></i></a>
                                                        </td>';
                                                        echo '</tr>';
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

                <?php include_once('includes/footer.php'); ?>
            </div>
        </div>

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="dist/js/init.js"></script>
    </body>
    </html>
<?php } ?>
