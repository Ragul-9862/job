<?php
include('includes/config.php');
if (isset($_POST['productsubmit'])) {
    //Getting Post Values
    $vcatname = $_POST['category'];
    $productname = $_POST['productname'];
    $productcode =  str_replace("'", "", ($_POST['productname']));
    $coded = strtolower(str_replace(" ", "-", ($productcode)));
    $productname = $_POST['productname'];

    // echo $coded ;exit;
    $desc = mysqli_real_escape_string($con, $_POST['discription']);
    $description = trim(str_replace('\n', '', (str_replace('\r', '', $desc))));

    $shortdesc = mysqli_real_escape_string($con, $_POST['shortdiscription']);
    $shortdescription = trim(str_replace('\n', '', (str_replace('\r', '', $shortdesc))));
    // echo $description;exit;

    $subfilename = $_FILES["productimg"]["name"];
    $tempname = $_FILES["productimg"]["tmp_name"];
    $folder = "./uploads/products/" . $subfilename;
    $substore = "uploads/products/" . $subfilename;
    

    $query = mysqli_query($con,"insert into tblproducts(vCategoryName,productname,productCode,description,shortdescription,image) values('$vcatname','$productname','$coded','$description','$shortdescription','$substore')");
     move_uploaded_file($tempname, $folder);
    if ($query) {
        echo "<script>alert('Products added successfully.');</script>";
        echo "<script>window.location.href='add_product.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='add_product.php'</script>";
    }
}

?>
