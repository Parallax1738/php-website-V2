<div class="subNavBar">
    <ul>
        <li><a href="/products?category=1">Bikes</a></li>
        <li><a href="/products?category=2">Scooters</a></li>
        <li><a href="/products?category=3">Apparel</a></li>
        <li><a href="/products?category=4">Components</a></li>
        <li><a href="/products?category=5">Accessories</a></li>
    </ul>
</div>
<div class="gallery">
<?php

use bikeshop\app\model\viewProduct;

if (!array_key_exists('category', $_GET))
    die("You destroyed the website");
$categoryId = $_GET['category'];

$viewProduct = new viewProduct();
$viewProduct->showProducts($categoryId);
?>
</div>