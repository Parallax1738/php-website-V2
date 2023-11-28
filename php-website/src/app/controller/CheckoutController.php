<?php

namespace bikeshop\app\controller;
use bikeshop\app\core\ActionResult;
use bikeshop\app\core\attributes\HttpMethod;
use bikeshop\app\core\attributes\RouteAttribute;
use bikeshop\app\core\Controller;

class CheckoutController extends Controller
{
    #[RouteAttribute( HttpMethod::GET, "index" )]
    public function index() : void
    {
        $this->view(new ActionResult('checkout', 'index'));
    }

}