<?php

class Router {

	public static $_routes = array();
	public static $route_set;
	public static $_called_controller;
	public static $_called_action;
	
	public static function match ($path, $controller_action) {
		if (!empty($path) && !empty($controller_action)) {
			static::$_routes[$path] = explode('#', $controller_action);
		}
	} 

	public static function root ($controller_action) {
		if (!empty($controller_action))
			static::$_routes['root'] = explode('#', $controller_action);
	}

	public static function dispatch () {
		// get request uri and check the below cases
		$request_uri = Registry::get('uri');
		$request_uri = explode('/', $request_uri);
		$request_uri = array_slice($request_uri, 1);

		// case 1: check if it doesnt have any url extensions attached.
		if (empty($request_uri[0])) {
			static::$route_set = 1;
			if (empty(static::$_routes['root'][0])) {
				// case: no root specified and viewing project for the first time.
				Fly::helper('No Route for root', 'There is no route defined for root in the config/routes.php');
			}
			static::$_called_controller = $controller = static::$_routes['root'][0];
			static::$_called_action = $action = static::$_routes['root'][1];
			Request::passRequest($controller, $action);
		}

		// case 2: loop through the routes matches.
		if (empty(static::$route_set)) {
			foreach (static::$_routes as $path => $route) {
				if ($request_uri[0] == $path) {
					static::$route_set = 1;
					static::$_called_controller = $controller = $route[0];
					static::$_called_action = $action = $route[1];
					$params = array_slice($request_uri, 1);
					Request::passRequest($controller, $action, $params);
				}
			}
		}

		// case 3: controller / action
		if (empty(static::$route_set)) {
			static::$_called_controller = $controller = $request_uri[0];
			if (empty($request_uri[1])) {
				Fly::helper('Routing Error', 'No route matches for <b>/' . $request_uri[0] . '</b>');
			}
			else {
				static::$route_set = 1;
				static::$_called_action = $action = $request_uri[1];
				$params = array_slice($request_uri, 2);
				Request::passRequest($controller, $action, $params);
			}
		}

	}

}

?>