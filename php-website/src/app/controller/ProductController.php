<?php
namespace bikeshop\app\controller;
use bikeshop\app\core\ActionResult;
use bikeshop\app\core\attributes\HttpMethod;
use bikeshop\app\core\attributes\RouteAttribute;
use bikeshop\app\core\Controller;

class ProductController extends Controller
{
    #[RouteAttribute( HttpMethod::GET, "index" )]
    public function index() : void
    {
        $this->printCart();
        $this->view(new ActionResult('product', 'index'));
    }

    #[RouteAttribute( HttpMethod::POST, "index" )]
    public function indexPost() : void
    {
        if (array_key_exists("id", $_POST)) {
            $this->addToCart($_POST['id']);
        }

        $this->view(new ActionResult('product', 'index'));
    }
    public function printCart() : void
    {
        if (array_Key_exists('cart', $_SESSION) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                echo $item;
            }
        } else {
            echo "<p>Cart Empty</p>";
        }
    }
    public function addToCart(int $id) : void
    {
        if (!array_key_exists('cart', $_SESSION)) {
            $_SESSION['cart'] = [];
        }

        $cart = $_SESSION['cart'];
        if (!is_array($cart)) {
            $cart = [];
        }

        $cart[] = $id;
        $_SESSION['cart'] = $cart;
    }
}