<?php
namespace public;
require "../../vendor/autoload.php";

use bikeshop\app\core\Router;

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Bike shop</title>
    <link rel="stylesheet" href="../../styles/header.css">
</head>

<body>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="/">Logo</a>
        </div>
        <ul class="links">
            <li><a href="/products?category=1">Products</a></li>
            <li><a href="/service">Services</a></li>
            <li><a href="/home/about">About Us</a></li>
            <li><a href="/account"><span class="material-symbols-outlined">account_circle</span></a></li>
            <li><a href="/checkout"><span class="material-symbols-outlined">shopping_cart</span></a></li>
        </ul>
    </nav>
</header>
<main>
    <?php

    $router = new Router();
    $router->manageRoute();

    ?>
</main>
</body>
</html>