<?php

$title = 'Product Info';
include_once 'header.php';

if(!isset($_SESSION["userid"])) {
    header("location: index.php?page=login");
    exit();
}

include "config/dbh-class.php";
include "config/products-class.php";
include "config/products-control-class.php";
include "config/products-view-class.php";
$productActions = new ProductInfoView();

$productId = $_GET["id"];
?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Edit Product Info</h2>
            <form action="config/product-info-script.php?id=<?php echo $productId?>" method="POST" enctype="multipart/form-data">
                <div class="new-product-image">
                    <img src="resources/images/<?php echo $productActions->fetchProductImage($productId); ?>" alt="<?php echo $productActions->fetchProductName($productId); ?>">

                    <input type="file" name="productImg">
                </div>

                <div class="new-product-name">
                    <input type="text" name="productName" placeholder="Product Name" value="<?php echo $productActions->fetchProductName($productId); ?>">
                </div>

                <div class="new-product-num">
                <input type="text" name="itemNumber" placeholder="Item Number" value="<?php echo $productActions->fetchItemNumber($productId); ?>">
                </div>

                <div class="new-product-description">
                    <textarea name="productDesc" rows="10" cols="100" placeholder="Product Description"><?php echo $productActions->fetchProductDesc($productId); ?></textarea>
                </div>

                <div class="new-product-price">
                    <h3>&dollar;<input type="text" name="productPri" placeholder="Product Price" value="<?php echo $productActions->fetchProductPrice($productId); ?>"></h3>
                </div>

                <div class="new-product-status">
                    <input type="radio" name="productStat[]" value="INSTOCK" <?php echo ($productActions->fetchProductStatus($productId) == "IN STOCK" ? "checked" : ""); ?>>IN STOCK</input>
                    <input type="radio" name="productStat[]" value="OUTSTOCK" <?php echo ($productActions->fetchProductStatus($productId) == "OUT OF STOCK" ? "checked" : ""); ?>>OUT OF STOCK</input>
                </div>

                <div class="new-product-info-save">
                    <button type="submit" name="submit">SAVE INFO</button>
                    <?php if($_SESSION["isadmin"]) { ?>
                        <a href="index?page=confirm-delete-product">DELETE PRODUCT</a>
                    <?php } ?>
                    <a href="index.php?page=product-mgmt">CANCEL</a>
                </div>

            </form>
		</td>
	</tr>
</table>

<?php
include_once "footer.php";
?>