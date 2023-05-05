<?php

class ProductInfoControl extends ProductInfo {
	
	private $productId;
	private $productName;
	private $itemNum;
	private $productDescription;
	private $productStatus;
	private $productPrice;
	private $productImage;
	
	public function __construct($productId, $productName, $itemNum, $productDescription, $productStatus, $productPrice, $productImage) {
		$this->productId = $productId;
		$this->productName = $productName;
		$this->itemNum = $itemNum;
		$this->productDescription = $productDescription;
		$this->productStatus = $productStatus;
		$this->productPrice = $productPrice;
		$this->productImage = $productImage;
	}
	
	public function updateProductInfo($productName, $itemNum, $description, $status, $price, $image, $productId) {
		// Error Handling
		if($this->emptyInputCheck($productName, $itemNum, $description, $status, $price)) {
			header("location: ../index.php?page=product-mgmt&error=emptyinput");
			exit();
		}
		
		// Update Profile Info
		$this->setProductInfo($productName, $itemNum, $description, $status, $price, $image, $productId);
	}
	
	public function createNewProduct($productName, $itemNum, $description, $status, $price, $image) {
		// Error Handling
		if($this->emptyInputCheck($productName, $itemNum, $description, $status, $price) == true) {
			header("location: ../index.php?page=product-mgmt&error=emptyinput");
			exit();
		}

		// Create new product
		$this->createProductInfo($productName, $itemNum, $description, $status, $price, $image);
	}

	private function emptyInputCheck($productName, $itemNum, $description, $status, $price) {
		$result = false;
		
		if(empty($productName) || empty($itemNum) || empty($description) || empty($status) || empty($price)) {
			$result = true;
		} else {
			$result = false;
		}
		
		return $result;
	}
}