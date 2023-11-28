<?php
	
	namespace bikeshop\app\controller;
	use bikeshop\app\core\ActionResult;
	use bikeshop\app\core\attributes\HttpMethod;
	use bikeshop\app\core\attributes\RouteAttribute;
	use bikeshop\app\core\Controller;
	
	class HomeController extends Controller
	{
		#[RouteAttribute( HttpMethod::GET, "index" )]
		public function index() : void
		{
			$this->view(new ActionResult('home', 'index'));
		}
		
		#[RouteAttribute( HttpMethod::GET, "about" )]
		public function test() : void
		{
			$this->view(new ActionResult('home', 'about'));
		}
	}