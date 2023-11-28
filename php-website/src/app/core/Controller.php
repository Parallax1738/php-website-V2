<?php
	
	namespace bikeshop\app\core;
	class Controller
	{		
		/**
		 * Finds the view for the controller and action
		 * @param ActionResult $result Contains information about the view to load, and the model it needs
		 * @return void
		 */
		protected function view(ActionResult $result) : void
		{
			$fileName = $result->getViewFile(__DIR__ . "/../../public/");
			if (!file_exists($fileName)) {
				$this->view($this->http404ResponseAction());
				return;
			} else {
				// Ensure to load data before including the PHP file so that the PHP file can read the data
				// (that sentence was needlessly long)
				$data = $result->getData();
				include $fileName;
			}
		}
	}
