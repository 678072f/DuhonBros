<?php

$title = 'Product Management';
include_once "header.php";

if(!isset($_SESSION["userid"])) {
	header("location: index.php?page=login");
	exit();
}

include "config/dbh-class.php";
include "config/products-class.php";
include "config/products-control-class.php";
include "config/products-view-class.php";
$productActions = new ProductInfoView();

$products = $productActions->fetchAllProducts();

?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<div class="product-mgmt">
				<h2>Administration</h2>
			</div>

			<div class="product-mgmt-controls">
				<a href="index.php?page=administration">Back</a>
				<a href="index.php?page=new-product">New Product</a>
			</div>
			
			<div class="product-mgmt-about">
				<p>Use this page to manage products.</p>
			</div>

			<div class="products-wrapper-mgmt">
				<?php foreach ($products as $product): ?>
				<a href="index.php?page=product-info&id=<?php echo $product['product_id']; ?>" class="product">
					<img src="resources/images/<?php echo $product['product_image']; ?>" width="300" height="200" alt="<?php echo $product['product_name']; ?>">
					<span class="name"><?php echo $product['product_name']; ?></span>
					<span class="price">&dollar;<?php echo $product['product_price']; ?></span>
				</a>
				<?php endforeach ?>
			</div>
			
		</td>
	</tr>
</table>

<?php
include_once "footer.php";
?>