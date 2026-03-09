<?php

class Product {
    public $id;
    public $name;
    public $price;
    public $category;

    public function __construct($id, $name, $price, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }
}

$products = [
    new Product(1, "iPhone 15", 1200, "Phone"),
    new Product(2, "Samsung Galaxy S23", 1000, "Phone"),
    new Product(3, "MacBook Pro", 2500, "Laptop"),
    new Product(4, "Dell XPS 13", 1800, "Laptop"),
    new Product(5, "iPad Pro", 900, "Tablet")
];

function filterProductsByCategory($products, $categoryName) {
    $result = [];

    foreach ($products as $product) {
        if ($product->category === $categoryName) {
            $result[] = $product;
        }
    }

    return $result;
}

function applyDiscount($products, $percent) {
    $discountedProducts = [];

    foreach ($products as $product) {
        $newPrice = $product->price - ($product->price * $percent / 100);

        $discountedProducts[] = new Product(
            $product->id,
            $product->name,
            $newPrice,
            $product->category
        );
    }

    return $discountedProducts;
}

// Test filter
$phones = filterProductsByCategory($products, "Phone");

// Test discount
$discountedProducts = applyDiscount($products, 10);

// Print result
echo "Filtered Products (Phone):\n";
print_r($phones);

echo "\nDiscounted Products (10%):\n";
print_r($discountedProducts);

?>