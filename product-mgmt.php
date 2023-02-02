<?php

?>

<?=template_header('Product Management'); ?>
<table class="main-content" align="center" width="90%">
	<tr>
		<td>
			<h2>Administration</h2>
			
			<a href="index.php?page=administration">Administration</a><br/>
			<a href="index.php?page=new-product">New Product</a>
			<div class="products-wrapper">
				<?php foreach ($products as $product): ?>
				<a href="index.php?page=product&id=<?=$product['product_id']?>" class="product">
					<img src="resources/images/<?=$product['image']?>" width="300" height="200" alt="<?=$product['product_name']?>">
					<span class="name"><?=$product['product_name']?></span>
					<span class="price">&dollar;<?=$product['price']?></span>
				</a>
				<?php endforeach ?>
			</div>
			
		</td>
	</tr>
</table>
<?=template_footer(); ?>