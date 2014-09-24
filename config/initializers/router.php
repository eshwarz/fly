<?php
// foreach (Router::$_routes as $route) {
// 	define('test_path', "test/index/kkkk");
// }

class Router {

	public static $_routes = array();
	public static $route_set;
	public static $_called_controller;
	public static $_called_action;
	public static $_default_action = 'index';
	
	public static function match ($path, $controller_action, $as_path = null) {
		if (!empty($path) && !empty($controller_action)) {
			static::$_routes[$path] = explode('#', $controller_action);
			// defining constant for route
			define ( $as_path.'_path', '/'.$path );
		}
	}

	public static function root ($controller_action) {
		if (!empty($controller_action))
			static::$_routes['root'] = explode('#', $controller_action);
			define ( 'root_path', '/' );
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
				FlyHelper::helper('No Route for root', 'There is no route defined for root in the config/routes.php');
			}
			static::$_called_controller = $controller = static::$_routes['root'][0];
			static::$_called_action = $action = static::$_routes['root'][1];
			Request::passRequest($controller, $action);
		}


		// case 2: check if params are passed, this should not be assumed as controller or any other route
		if (empty(self::$route_set)) {
			// checking is first character is ?
			if ($request_uri[0][0] == '?') {
				self::$_called_controller = $controller = self::$_routes['root'][0];
				self::$_called_action = $action = self::$_routes['root'][1];
				Request::passRequest($controller, $action);
			}
		}

		// case 3: loop through the routes matches.
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

		// case 4: controller / action
		if (empty(static::$route_set)) {
			static::$_called_controller = $controller = $request_uri[0];
			if (empty($request_uri[1])) {
				// if no action is given check if the controller exists and then redirect to index action of the controller
				$params = array_slice($request_uri, 1);
				static::$_called_action = $action = static::$_default_action;
				Request::passRequest($controller, $action, $params);
			} else {
				static::$route_set = 1;
				static::$_called_action = $action = $request_uri[1];
				$params = array_slice($request_uri, 2);
				Request::passRequest($controller, $action, $params);
			}
		}
	}

	// get route by constant
	public static function routeByConstant($constant) {
		if (strpos($constant, '/') === false && strpos($constant, '#') === false) {
			$url_string = str_replace('_path', '', $constant);
			// putting a temporary pipe for constructing "_" for "__"
			$url = str_replace('__', '|', $url_string);
			$url = str_replace('_', '/', $url);
			$url = str_replace('|', '_', $url);
			return '/'.$url;
		}
		return $constant;
	}

}

?>