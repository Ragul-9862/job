<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Manage User</title>
        <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="hk-wrapper hk-vertical-nav">
            <?php include_once('includes/navbar.php'); include_once('includes/sidebar.php'); ?>

            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

            <div class="hk-pg-wrapper">
                <nav class="hk-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light bg-transparent">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage</li>
                    </ol>
                </nav>

                <div class="container">
                    <h4 class="hk-pg-title">Manage Users</h4>
                    <table id="user_table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT id, user_name, password  FROM users";
                            $result = mysqli_query($con, $query);
                            $cnt = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $cnt++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                                echo "<td>
                                    <a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> | 
                                    <a href='manage_user.php?del=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['del'])) {
                                $id = intval($_GET['del']);
                                $delete_query = "DELETE FROM users WHERE id = $id";
                                if (mysqli_query($con, $delete_query)) {
                                    echo "<script>alert('User deleted successfully.'); window.location.href='manage_user.php';</script>";
                                } else {
                                    echo "<script>alert('Error deleting user: " . mysqli_error($con) . "');</script>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
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
