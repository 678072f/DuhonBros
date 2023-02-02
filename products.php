<?php
	$items_per_page = 4;
	$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
	$stmt = $pdo->prepare('SELECT * FROM products ORDER BY product_id ASC LIMIT ?, ?;');
	
	$stmt->bindValue(1, ($current_page -1) * $items_per_page, PDO::PARAM_INT);
	$stmt->bindValue(2, $items_per_page, PDO::PARAM_INT);
	$stmt->execute();

	$products = $stmt->fetchALL(PDO::FETCH_ASSOC);
	$total_products = $pdo->query('SELECT * FROM products')->rowCount();
	
	$pdo = NULL;
?>

<?php 
$title = "Products";
include_once "header.php";
?>
<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Our Products</h2>
			<p><?=$total_products ?> Products</p>
			<div class="products-wrapper">
				<?php foreach ($products as $product): ?>
				<a href="index.php?page=product&id=<?=$product['product_id']?>" class="product">
					<img src="resources/images/<?=$product['image']?>" width="300" height="200" alt="<?=$product['product_name']?>">
					<span class="name"><?=$product['product_name']?></span>
					<span class="price">&dollar;<?=$product['price']?></span>
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