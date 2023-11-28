<?php
	namespace bikeshop\app\core;
	use bikeshop\app\controller\AccountController;
    use bikeshop\app\controller\CheckoutController;
    use bikeshop\app\controller\HomeController;
    use bikeshop\app\controller\ProductController;
    use bikeshop\app\controller\ServiceController;
    use bikeshop\app\core\attributes\HttpMethod;
	use bikeshop\app\core\attributes\RouteAttribute;
	use Exception;
	use ReflectionClass;
	use ReflectionMethod;
	
	class Router
	{
		private Controller $indexController;
		private array $controllerMap;
		
		private array $routes;
		
		public function __construct()
		{
			$this->indexController = new HomeController();
			
			$this->controllerMap[ "home" ] = $this->indexController;
            $this->controllerMap[ "products" ] = new ProductController();
            $this->controllerMap[ "service" ] = new ServiceController();
            $this->controllerMap[ "account" ] = new AccountController();
            $this->controllerMap[ "checkout" ] = new CheckoutController();
			
			// Example Controllers:
			// $this->controllerMap["test"] = new TestController();
			// $this->controllerMap["something"] = new SomethingController
		}
		
		/**
		 * Routes to the route the user is currently on
		 * @return void
		 */
		public function manageRoute(): void {
			$uri = $this->getUri();
			$actionCallable = $this->getActionCallable($uri);
			
			if (!$actionCallable) {
				echo "<p>Action Not Found</p>";
				die;
			}
			
			call_user_func($actionCallable);
		}
		
		/**
		 * Finds an action method from inside a controller based on an action name and HTTP method. It finds it
		 * looking at the attribute on top of a method.
		 * @return callable | null The method that you can call. THe array is a callable by the way, so you'll have to use
		 * the function call_usr_array(getActionFromStr(...));
		 */
		public function getActionCallable(MvcUri $uri) : callable | null
		{
			$controller = $this->getControllerFromStr($uri->getControllerName());
			if (!$controller)
				$controller = $this->indexController;
			
			$reflectedController = new ReflectionClass($controller);
			foreach ($reflectedController->getMethods() as $controllerMethod) {
				$method = $this->checkMethodAttributeAgainstAction($controllerMethod, $uri->getActionName(), $uri->getHttpMethod());
				if ($method)
					return [ $controller, $method->getName() ];
			}
			return null;
		}
		
		/**
		 * Loop through URL's string. Add all characters to $str. When / is found, save that string to find get
		 * the controller/action. Once ? is found, add to parameters array. Therefore, we should loop through
		 * the string's characters and break every time we find a / or a ?. This is a fucking awful 'solution'
		 * @return MvcUri The Uri as an object to get whatever the fuck the user entered as an object
		 */
		private function getUri() : MvcUri
		{
			$url = $_SERVER[ "REQUEST_URI" ];
			
			// Split the URL by '/'
			$parts = explode('/', trim($url, '/'));
			
			// Extract the controller and action
			$controller = $parts[ 0 ] ?? 'home';
			$action = $parts[ 1 ] ?? '';
			
			// Ensure to disclude parameters (grabbed using $_GET)
			if (str_contains($controller, '?'))
				$controller = $this->removeParams($controller);
			
			if (str_contains($action, '?'))
				$action = $this->removeParams($action);
			
			return new MvcUri($controller, $action, $this->stringToHttpMethod($_SERVER[ 'REQUEST_METHOD' ]));
		}
		
		/**
		 * Removes all the parameters from a url. Example: removeParams("controller?testParam=3") = "testParam"
		 * @param string $str String to parse
		 * @return string The fixed string
		 */
		private function removeParams(string $str) : string
		{
			return explode('?', $str)[ 0 ];
		}
		
		private function stringToHttpMethod($method) : HttpMethod
		{
			return match ( $method ) {
				"POST" => HttpMethod::POST,
				"PUT" => HttpMethod::PUT,
				"PATCH" => HttpMethod::PATCH,
				"DELETE" => HttpMethod::DELETE,
				default => HttpMethod::GET,
			};
		}
		
		private function getControllerFromStr($controllerName) : Controller | null
		{
			if (array_key_exists(strTolower($controllerName), $this->controllerMap)) {
				return $this->controllerMap[ strtolower($controllerName) ];
			} else {
				return null;
			}
		}
		
		/**
		 * Loops through all attributes on the function. If an attribute with the 'RouteAttribute' one exists, and it's
		 * route name is equal to $targetAction and it's method type is equal to $methodType, then it returns the method
		 * . Otherwise it will return null
		 * @param ReflectionMethod $method Method to search
		 * @param string $targetAction Action to search for
		 * @param HttpMethod $targetMethod Method to search for
		 * @return ReflectionMethod | null If the method exists that match the following requirements, it will return
		 * the reflection method. Otherwise, it will return null.
		 */
		private function checkMethodAttributeAgainstAction(ReflectionMethod $method, string $targetAction, HttpMethod $targetMethod) : ReflectionMethod | null
		{
			foreach ($method->getAttributes() as $attribute) {
				$att = $attribute->newInstance();
				if ($att instanceof RouteAttribute) {
					$methodEqual = strcmp($att->getMethod()->name, $targetMethod->name) == 0;
					$actionNameEqual = strcmp($att->getAction(), $targetAction) == 0;

					if ($methodEqual && $actionNameEqual) {
						return $method;
					}
				}
			}
			return null;
		}
	}