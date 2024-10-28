<?php
include('includes/config.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['catsubmit'])) {
    $category = $_POST['name'];
    $namecheck = mysqli_query($con, "SELECT * FROM category WHERE category_name = '$category'");

    // Initialize the error message variable
    $errorMsg = '';

    if (mysqli_num_rows($namecheck) > 0) {
        $errorMsg = "Category name already exists.";
    } else {
        $catcode = str_replace("'", "", $_POST['name']);
        $coded = strtolower(str_replace(" ", "-", $catcode));

        $query = mysqli_query($con, "INSERT INTO category (category_name, cat_code) VALUES ('$category', '$coded')");

        if ($query) {
            $_SESSION['successMsg'] = "Category added successfully.";
            header("Location: add_category.php");
            exit();
        } else {
            $errorMsg = "Something went wrong. Please try again.";
        }
    }

    // Store the error message in the session and redirect back to the form
    $_SESSION['errorMsg'] = $errorMsg;
    header("Location: add_category.php");
    exit();
}





if (isset($_POST['productsubmit'])) {
    $errors = array();

    $name = mysqli_real_escape_string($con, $_POST['name']);
    if (empty($name)) {
        $errors[] = "Product name is required.";
    } else {
        $namecheck = mysqli_query($con, "SELECT * FROM product WHERE product_name = '$name'");
        if (mysqli_num_rows($namecheck) > 0) {
            $errors[] = "Product name already exists.";
        }
    }

    // $price = $_POST['price'];
    // if (empty($price) || !is_numeric($price)) {
    //     $errors[] = "Valid price is required.";
    // }

    $cat_id = $_POST['category'];
    if ($cat_id == 0) {
        $errors[] = "Category is required.";
    }

    $description = mysqli_real_escape_string($con, $_POST['description']);
    if (empty($description)) {
        $errors[] = "Description is required.";
    }

    $imgdefault = $_FILES["imgdefault"]["name"];
    $imghover = $_FILES["imghover"]["name"];
    if (empty($imgdefault) || empty($imghover)) {
        $errors[] = "Both default and hover images are required.";
    }

    if (count($errors) == 0) {
        // Move uploaded files and insert into database
        $temname = $_FILES["imgdefault"]["tmp_name"];
        $folder = "./uploads/" . $imgdefault;
        $imagedefault = "./uploads/" . $imgdefault;
        move_uploaded_file($temname, $folder);

        $temname = $_FILES["imghover"]["tmp_name"];
        $folder = "./uploads/" . $imghover;
        $imghover = "./uploads/" . $imghover;
        move_uploaded_file($temname, $folder);

        $pro_code = str_replace("'", "", $name);
        $productcoded = strtolower(str_replace(" ", "-", $pro_code));

        $query = mysqli_query($con, "INSERT INTO product (product_name,product_code, price, description, image_hover, image_default,cat_id) VALUES ('$name','$productcoded', '$price', '$description', '$imghover', '$imagedefault','$cat_id')");

        if ($query) {
            echo "<script>alert('Product added successfully.');</script>";
            echo "<script>window.location.href='add-product.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-product.php'</script>";
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}

if (isset($_POST['blogsubmit'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Handle file upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO blog (title, content, image) VALUES ('$title', '$content', '$target')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Blog added successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    echo "<script>window.location.href='add-blog.php';</script>";
}


if (isset($_POST['processsubmit'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Handle file upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO process (title, content, image) VALUES ('$title', '$content', '$target')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Production Process added successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }

    echo "<script>window.location.href='add-production.php';</script>";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Sanitize input data
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']); 

        // Insert query
        $query = "INSERT INTO users (user_name, password) VALUES ('$username', '$password')";

        if (mysqli_query($con, $query)) {
            echo "<script>alert('User added successfully');</script>";
            echo "<script>window.location.href='manage_user.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill out all fields.');</script>";
    }
}