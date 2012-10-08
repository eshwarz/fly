<?php

// Request passes requests to the controller class and the particular 
// controller inside it with some params
// Example: www.pavsesh.com/controller/method/param1/parma2

class Request
{

	public static function passRequest ($controller, $action, $params = array()) {
		if (!empty($controller) && !empty($action)) {
			
			$controllerFile = ROOT . 'app/controllers/' . $controller . '_controller.php';
			
			if (is_readable($controllerFile))
				require_once $controllerFile;

			$class = ucfirst($controller) . 'Controller';
			if (class_exists($class)) {
				if (is_callable(array($class, $action))) {
					$instance = new $class;
					call_user_func_array(array($instance, $action), $params);
				}
				else
					Fly::helper('Function error', '<b>' . $class . '::' . $action . '</b> cannot be called. The function might not exists!');
			}
			else
				Fly::helper('Controller error', '<b>' . $class . '</b> does not exists.');
		}
	}

}

?>