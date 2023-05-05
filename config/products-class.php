<?php

class ProductInfo extends DBh {

	// Get Product Info
	protected function getProductInfo($productId) {
		$sql = "SELECT * FROM products WHERE product_id = ?;";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($productId))) {
			$stmt = NULL;
			header("location: index.php?page=products&error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: index.php?page=products&error=productnotfound");
			exit();
		}
		
		$productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $productData;
	}

	protected function setProductInfo($productName, $itemNum, $description, $status, $price, $image, $productId) {
		$sql = "UPDATE products SET product_name = ?, item_num = ?, product_description = ?, product_status = ?, product_price = ?, product_image = ? WHERE product_id = ?;";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($productName, $itemNum, $description, $status, $price, $image, $productId))) {
			$stmt = NULL;
			header("location: index.php?page=products&error=stmtfailed");
			exit();
		}
		
		$stmt = NULL;
	}
	
	protected function createProductInfo($productName, $itemNum, $description, $status, $price, $image) {
		$sql = "INSERT INTO products (product_name, item_num, product_description, product_status, product_price, product_image) VALUES (?, ?, ?, ?, ?, ?);";
		$stmt = $this->connect()->prepare($sql);
		
		if(!$stmt->execute(array($productName, $itemNum, $description, $status, $price, $image))) {
			$stmt = NULL;
			header("location: index.php?page=products&error=stmtfailed");
			exit();
		}
		
		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: index.php?page=products&error=productnotfound");
			exit();
		}
		
		$stmt = NULL;
	}

	protected function getProductId($productName) {
		$sql = "SELECT id FROM products WHERE product_name = ?";
		$stmt = $this->connect()->prepare($sql);

		if(!$stmt->execute(array($productName))) {
			$stmt = NULL;
			header("location: index.php?page=products&error=stmtfailed");
			exit();
		}

		if($stmt->rowCount() == 0) {
			$stmt = NULL;
			header("location: index.php?page=products&error=productnotfound");
			exit();
		}

		$product = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $product;
	}
}