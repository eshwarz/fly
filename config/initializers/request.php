<?php

// Request passes requests to the controller class and the particular 
// action inside it with some params
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

					// calling before_filter before executing the called action.
					if ( method_exists($instance, before_filter) )
						$instance->before_filter();

					call_user_func_array(array($instance, $action), $params);

					// calling after_filter before executing the called action.
					// if ( function_exists($instance->after_filter()) )
					// 	$instance->after_filter();
				}
				else
					FlyHelper::helper('Function error', '<b>' . $class . '::' . $action . '</b> cannot be called. The function might not exists!');
			}
			else
				FlyHelper::helper('Controller error', '<b>' . $class . '</b> does not exists.');
		}
	}

}

?>