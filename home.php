<?php
	// Get products by ID
	$stmt = $pdo->prepare('SELECT * FROM products ORDER BY product_id ASC LIMIT 4');
	$stmt->execute();
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php 
$title="Home";
include_once "header.php";
?>
<table class="main-content" width="90%">
	<tr>
		<td>
			<h2>Welcome to DuhonBros. Shop!</h2>

			<div class="banner">
				<center><h1>New Products</h1></center>
			</div>

			<h2>Explore our custom-made products!</h2>
			<p>All of our products are hand made and made to order. If you would like any kind of modifications to our base designs, please don't hesitate to contact us!</p>
		
			<div class="products-wrapper">
				<?php foreach ($products as $product): ?>
				<a href="index.php?page=product-detail&id=<?php echo $product['product_id']; ?>"class="product">
					<img src="resources/images/<?=$product['product_image']?>" width="300" height="200" alt=<?=$product['product_name']?>">
					<span class="name"><?=$product['product_name']?></span>
					<span class="price">
						&dollar;<?=$product['product_price']?>
					</span>
				</a>
				<?php endforeach; ?>
			</div>
		</td>
	</tr>
</table>

<?php 
include_once "footer.php";
?>