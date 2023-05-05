<?php

$title = "Product Details";
include 'header.php'; 

include "config/dbh-class.php";
include "config/products-class.php";
include "config/products-control-class.php";
include "config/products-view-class.php";
$productActions = new ProductInfoView();

$productId = $_GET["id"];
$productImg = $productActions->fetchProductImage($productId);
$productName = $productActions->fetchProductName($productId);
$productDesc = $productActions->fetchProductDesc($productId);
$productPri = $productActions->fetchProductPrice($productId);
$productStat = $productActions->fetchProductStatus($productId);

?>

<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Product Detail</h2>
			<div class="product-image-<?php echo $productId; ?>">
				<img src="resources/images/<?php echo $productImg; ?>" alt="<?php echo $productName; ?>">
			</div>
			<div class="product-name-<?php echo $productId; ?>">
				<h2><?php echo $productName; ?></h2>
			</div>
			<div class="product-description-<?php echo $productId; ?>">
				<p><?php echo $productDesc; ?></p>
			</div>
			<div class="product-price-<?php echo $productId; ?>">
				<h3>&dollar;<?php echo $productPri; ?></h3>
			</div>
			<div class="product-status-<?php echo $productId; ?>">
				<h3><?php echo $productStat; ?></h3>
			</div>
			<?php if($productStat == "IN STOCK") { ?>
			<div class="product-buy">
				<a href="index.php?page=shopping-cart">BUY NOW</a>
			</div>
			<?php } ?>
		</td>
	</tr>
</table>

<?php include 'footer.php'; ?>