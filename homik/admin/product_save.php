

<?php
include('includes/config.php');
if(isset($_POST['productsubmit'])){
    $vcatname = $_POST['category'];
    $subcatname = $_POST['subcategory'];
    $productname = $_POST['productname'];
    $productcode =  str_replace("'", "", ($_POST['productname']));
    $coded = strtolower(str_replace(" ", "-", ($productcode)));

    $productprice = $_POST['productprice'];
    $quantity = $_POST['quantity'];

    // echo $coded ;exit;
    $desc = mysqli_real_escape_string($con, $_POST['discription']);
    $description = trim(str_replace('\n', '', (str_replace('\r', '', $desc))));

$subfilename = $_FILES["productimg"]["name"];
$tempname = $_FILES["productimg"]["tmp_name"];
$folder = "./uploads/products/" . $subfilename;
$substore = "uploads/products/" . $subfilename;

$insert = mysqli_query($con, "insert into tblproducts(vCategoryName,vSubCategoryName,productname,productprice,quantity,productCode,description,image) values('$vcatname','$subcatname','$productname','$productprice','$quantity','$coded','$description','$substore')");
move_uploaded_file($tempname, $folder);
if($insert){
    $lastId = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM tblproducts Order by iId desc LIMIT 1"));
        $aaa = $lastId['iId'];
        // $aaa1 = $lastId['iId'];
        $uploadDir = './uploads/products/'.$aaa.'/';
        $path = 'uploads/products/'.$aaa.'/';
          if(!is_dir($uploadDir)){
       mkdir($uploadDir, 0755);
          }
    $allowTypes = array('jpg','png','jpeg','gif');

    if(!empty(array_filter($_FILES['pimages']['name']))){
        foreach($_FILES['pimages']['name'] as $key=>$val){
            $filename = basename($_FILES['pimages']['name'][$key]);
            $targetFile = $uploadDir.$filename;
            $image = $path.$filename;
            if(move_uploaded_file($_FILES["pimages"]["tmp_name"][$key], $targetFile)){
                $success[] = "Uploaded $filename";
                $insertQrySplit[] = "('$aaa','$image')";
            }
            else {
                $errors[] = "Something went wrong- File - $filename";
            }
        }

        //Inserting to database
        if(!empty($insertQrySplit)) {
            $query = implode(",",$insertQrySplit);
            $sql = "INSERT INTO tblproductimage (ProductId, ImagePath) VALUES $query";
            if(mysqli_query($con, $sql)){
               header("location:manage_product.php");
            }
        }
    }
    else {
        $errors[] = "No File Selected";
    }
      

}
}



?>