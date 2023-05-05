<?php
	$title = "Products";
	include_once "header.php";

	include "config/dbh-class.php";
	include "config/products-class.php";
	include "config/products-control-class.php";
	include "config/products-view-class.php";
	$productActions = new ProductInfoView();

	$items_per_page = 4;
	$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
	$products = $productActions->fetchAllProducts();

	$total_products = count($products);
?>
<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Our Products</h2>
			<p><?=$total_products ?> Products</p>
			<div class="products-wrapper">
				<?php foreach ($products as $product): ?>
				<a href="index.php?page=product-detail&id=<?php echo $product['product_id']; ?>" class="product">
					<img src="resources/images/<?=$product['product_image']?>" width="300" height="200" alt="<?=$product['product_name']?>">
					<span class="name"><?=$product['product_name']?></span>
					<span class="price">&dollar;<?=$product['product_price']?></span>
				</a>
				<?php endforeach ?>
			</div>
			
			<div class="buttons">
				<?php if ($current_page > 1): ?>
					<a href="index.php?page=product&p=<?=$current_page-1?>">Prev</a>
				<?php endif; ?>
				<?php if ($total_products > ($current_page * $items_per_page) - $items_per_page + count($products)): ?>
					<a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
				<?php endif; ?>
			</div>
		</td>
	</tr>
</table>
<?php 
include_once "footer.php";
?>