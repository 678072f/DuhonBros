<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Store data from form
    $productID = htmlspecialchars($_GET["id"], ENT_QUOTES, 'UTF-8');

    $productImage = $_FILES["productImg"];

    $productName = htmlspecialchars($_POST["productName"], ENT_QUOTES, 'UTF-8');
    $itemNum = htmlspecialchars($_POST["itemNumber"], ENT_QUOTES, 'UTF-8');
    $productDescription = htmlspecialchars($_POST["productDesc"], ENT_QUOTES, 'UTF-8');
    $productPrice = htmlspecialchars($_POST["productPri"], ENT_QUOTES, 'UTF-8');
    $productStatus = $_POST["productStat"];

    if($productStatus[0] == "INSTOCK") {
        $newProductStatus = "IN STOCK";
    } else {
        $newProductStatus = "OUT OF STOCK";
    }

    // Include DBh Class
    include "dbh-class.php";

    // Include Product Class
    include "products-class.php";
    include "products-control-class.php";
    include "products-view-class.php";

    // File Upload Path
    $filePath = "../resources/images/";

    // Instantiate new Product Class
    $productManager = new ProductInfoControl($productID, $productName, $itemNum, $productDescription, $productStatus, $productPrice, $productImage);

    // Instantiate Product View Class
    $productInfo = new ProductInfoView();
    $currentImageName = $productInfo->fetchProductImage($productID);

    // File Handling
    $imageName = $productImage['name'];
    $imageTmpName = $productImage['tmp_name'];
    $imageSize['size'];
    $maxSize = 50000;
    $imageError = $productImage['error'];
    $imageType = $productImage['type'];

    $fileExt = explode('.', $imageName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedTypes = array('jpg', 'jpeg', 'png');

    $newImageName = $currentImageName;

    if(in_array($fileActualExt, $allowedTypes)) {
        if($imageError === 0) {
            if($imageSize < $maxSize) {
                $fileUpload = $filePath.$newImageName;
                move_uploaded_file($imageTmpName, $fileUpload);
                header("location: index.php?page=product-mgmt&uploadsuccess");
            } else {
                echo "Image is too large! Max size is $maxSize KB";
            }
        } else {
            echo "There was an upload error: $imageError";
        }
    } else {
        echo "File type not allowed.";
    }

    // Update Product Info
    $productManager->updateProductInfo($productName, $itemNum, $productDescription, $newProductStatus, $productPrice, $newImageName, $productID);

    header("location: ../index.php?page=product-mgmt");

}