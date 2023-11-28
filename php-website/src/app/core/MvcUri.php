<?php
	
	namespace bikeshop\app\core;
	use bikeshop\app\core\attributes\HttpMethod;
	
	class MvcUri
	{
		
		private readonly string $controller;
		private readonly string | null $action;
		private readonly HttpMethod $httpMethod;
		
		/**
		 * Initialises an MVC Uri object
		 * @param string|null $controller
		 * @param string|null $action If this is null, it will set it to 'index', meaning the URI is /{controller}/index
		 * @param HttpMethod $httpMethod
		 */
		public function __construct(string | null $controller, string | null $action, HttpMethod $httpMethod)
		{
			$this->httpMethod = $httpMethod;
			$this->controller = $controller;
			
			if (empty($action))
				$this->action = "index";
			else
				$this->action = $action;
		}
		
		public function getControllerName() : string
		{
			return $this->controller;
		}
		
		public function getActionName() : string
		{
			return $this->action;
		}
		
		public function getHttpMethod() : HttpMethod
		{
			return $this->httpMethod;
		}
		
		public function __toString() : string
		{
			return "HTTP ".$this->httpMethod->name." ".$this->controller."/".$this->action;
		}
	}