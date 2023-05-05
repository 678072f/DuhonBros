<?php

class ProductInfoView extends ProductInfo {

    public function fetchAllProducts() {
        $sql = "SELECT * FROM products ORDER BY product_id ASC;";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute()) {
            $stmt = NULL;
            header("location: index.php?page=products&error=stmtfailed");
            exit();
        }

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
    
    public function fetchProductImage($productId) {
        $productInfo = $this->getProductInfo($productId);
        return $productInfo[0]["product_image"];
    }

    public function fetchProductName($productId) {
        $productName = $this->getProductInfo($productId);
        return $productName[0]["product_name"];
    }

    public function fetchItemNumber($productId) {
        $itemNum = $this->getProductInfo($productId);
        return $itemNum[0]["item_num"];
    }

    public function fetchProductDesc($productId) {
        $productDesc = $this->getProductInfo($productId);
        return $productDesc[0]["product_description"];
    }

    public function fetchProductPrice($productId) {
        $productPrice = $this->getProductInfo($productId);
        return $productPrice[0]["product_price"];
    }

    public function fetchProductStatus($productId) {
        $productStatus = $this->getProductInfo($productId);
        return $productStatus[0]["product_status"];
    }
}