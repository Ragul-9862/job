<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Add Blog</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>

                <div class="container">
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title">Add Blog</h4>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" action="insert.php" method="post" novalidate enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="title">Blog Title</label>
                                                    <input class="form-control" type="text" name="title" required>
                                                    <div class="invalid-feedback">Please provide a valid title.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="content">Content</label>
                                                    <textarea class="form-control" name="content" required></textarea>
                                                    <div class="invalid-feedback">Please provide content for the blog.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="image">Blog Image</label>
                                                    <input class="form-control" type="file" name="image" required>
                                                    <div class="invalid-feedback">Please provide a valid image.</div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit" name="blogsubmit">Submit</button>
                                        </form>
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
        <script src="dist/js/init.js"></script>
    </body>
    </html>
<?php } ?>
