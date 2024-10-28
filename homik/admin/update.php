<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('includes/config.php');
session_start();
if (isset($_POST['updatcat'])) {
    $cid = $_POST['catid'];
    $catname = $_POST['category'];
    $namecheck = mysqli_query($con,"SELECT * FROM category where category_name = '$catname'");
    
if (mysqli_num_rows($namecheck) > 0) {
    $error = "Category name already exists.";
   
} else {
    // print_r($catname);exit;
    $catcode = str_replace("'", "", $_POST['name']);
    $coded = strtolower(str_replace(" ", "-", $catcode));

    $query = mysqli_query($con, "update category set category_name='$catname', cat_code = '$coded' where id='$cid'");

    if ($query) {
        $_SESSION['successMsg'] = "Category updated successfully.";
        header("Location: edit_category.php?catid=$cid");
        exit();
    } else {
        $error = "Something went wrong. Please try again.";
    }
}

// Store the error message in the session and redirect back to the form
$_SESSION['error'] = $error;
// print_r($_SESSION);exit;
header("Location: edit_category.php?catid=$cid");
exit();
}

// product
elseif (isset($_POST['updateproduct'])) {

    $name = $_POST['name'];
    $catid =$_POST['catid'];
    $namecheck = mysqli_query($con,"SELECT * FROM product where id = $catid");
// print_r($namecheck);exit;
if (empty($name)){
echo "Name Is Same";
echo "<script>window.history.back();</script>";
}else{
    
    $name = $_POST['name'];
    $cid = $_POST['catid'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $subfilename = $_FILES["imgdefault"]["name"];
    $temname = $_FILES["imgdefault"]["tmp_name"];
    $folder = "./uploads/image/" . $subfilename;
    $imagedefault = "uploads/image/" . $subfilename;
    move_uploaded_file($temname, $folder);

    $subfilename = $_FILES["imghover"]["name"];
    $temname = $_FILES["imghover"]["tmp_name"];
    $folder = "./uploads/image/" . $subfilename;
    $imghover = "uploads/image/" . $subfilename;
    move_uploaded_file($temname, $folder);

    $pro_code = str_replace("'", "", ($_POST['name']));
    $productcoded = strtolower(str_replace(" ", "-", ($pro_code)));

    
    if ($subfilename != "") {
        $query = mysqli_query($con, "UPDATE product SET product_name = '$name',product_code = '$productcoded', price = '$price', description = '$description', image_hover = '$imghover', image_default = '$imagedefault' WHERE id = $cid");
        echo "<script>alert('Product added successfully.');</script>";
        echo "<script>window.location.href='manage_product.php'</script>";
    } else {
        $query = mysqli_query($con, "UPDATE product SET product_name = '$name',product_code = '$productcoded', price = '$price', description = '$description'  WHERE id = $cid");
        echo "<script>alert('Products Updated Successfully.');</script>";
        echo "<script>window.location.href='manage_product.php'</script>";
    }
    
}
}
