<?php
session_start();
include('includes/config.php');

// Check if the user is logged in
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    // Fetch the blog data based on the ID from the URL
    $blog_id = intval($_GET['id']);
    $query = "SELECT * FROM process WHERE id = '$blog_id'";
    $result = mysqli_query($con, $query);
    $blog = mysqli_fetch_assoc($result);

    // Handle form submission
    if (isset($_POST['update_production'])) {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $content = mysqli_real_escape_string($con, $_POST['content']);
        
        // Handle image upload if a new image is provided
        if (!empty($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = "uploads/" . $image_name;
            move_uploaded_file($image_tmp, $image_path);
        } else {
            $image_path = $blog['image']; // Retain the existing image path if no new image is uploaded
        }

        // Update query
        $update_query = "UPDATE process SET title='$title', content='$content', image='$image_path' WHERE id='$blog_id'";
        
        if (mysqli_query($con, $update_query)) {
            $_SESSION['successMsg'] = "Production updated successfully!";
            header('location:manage_production.php');
        } else {
            $_SESSION['error'] = "Error updating production: " . mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Edit Blog</title>
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
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            <div class="container">
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title">Edit Production</h4>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <?php if (!empty($_SESSION['error'])) { ?>
                                <div class="text-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                            <?php } ?>
                            <form class="needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label for="title">Production Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($blog['title']); ?>" required>
                                        <div class="invalid-feedback">Please provide a valid title.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label for="content">Content</label>
                                        <textarea class="form-control" name="content" required><?php echo htmlspecialchars($blog['content']); ?></textarea>
                                        <div class="invalid-feedback">Please provide content for the blog.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-10">
                                        <label for="image">Prodcution Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <div class="mt-2">
                                            <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog Image" style="width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit" name="update_production">Update</button>
                            </form>
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
    <script src="dist/js/validation-data.js"></script>
</body>

</html>

<?php } ?>
