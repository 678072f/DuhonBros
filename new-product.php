<?php

$title = 'Add Product';
include_once 'header.php';

include "config/dbh-class.php";
include "config/products-class.php";
include "config/products-control-class.php";
include "config/products-view-class.php";
$productActions = new ProductInfoView();

?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Product Detail</h2>
            <form action="config/product-info-script.php" method="POST">
                <div class="product-image">
                    <input type="file" name="productName">
                </div>

                <div class="new-product-name">
                    <input type="text" name="productName" placeholder="Product Name">
                </div>

                <div class="new-product-description">
                    <textarea name="productDesc" rows="10" cols="100" placeholder="Product Description"></textarea>
                </div>

                <div class="new-product-price">
                    <h3>&dollar;<input type="text" name="productPri" placeholder="Product Price"></h3>
                </div>

                <div class="new-product-status">
                    <input type="radio" name="productStat[]" value="INSTOCK">IN STOCK</input>
                    <input type="radio" name="productStat[]" value="OUTSTOCK">OUT OF STOCK</input>
                </div>

                <div class="new-product-info-save">
                    <button type="submit" name="submit">SAVE INFO</button>
                    <a href="index.php?page=product-mgmt">CANCEL</a>
                </div>

            </form>
		</td>
	</tr>
</table>

<?php
include_once "footer.php";
?>