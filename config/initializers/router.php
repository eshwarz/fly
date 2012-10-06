<?php

class Router {

	public static $_routes = array();
	public static $route_set;
	
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
			$controller = static::$_routes['root'][0];
			$action = static::$_routes['root'][1];
			Request::passRequest($controller, $action);
		}

		// case 2: loop through the routes matches.
		if (empty(static::$route_set)) {
			foreach (static::$_routes as $path => $route) {
				if ($request_uri[0] == $path) {
					static::$route_set = 1;
					$controller = $route[0];
					$action = $route[1];
					$params = array_slice($request_uri, 1);
					Request::passRequest($controller, $action, $params);
				}
			}
		}

		// case 3: controller / action
		if (empty(static::$route_set)) {
			$controller = $request_uri[0];
			if (empty($request_uri[1])) {
				echo "<h2>No route matches for /" . $request_uri[0] . "</h2>";
			}
			else {
				$action = $request_uri[1];
				$params = array_slice($request_uri, 2);
				Request::passRequest($controller, $action, $params);
			}
		}
	}
}

?>