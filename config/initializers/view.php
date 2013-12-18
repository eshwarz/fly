<?php

class View {

	public static $_view_rendered = false;

	public static function render ($opts = array()) {
		
		// use can also pass layout as array element to render a view along with layout.
		// multiple declarations returns error.

		if (!isset($opts['locals'])) {
			global $locals;
			$opts['locals'] = $locals;
		}
		
		if ( (!empty($opts['controller']) && !empty($opts['view'])) || (!empty($opts['controller']) && !empty($opts['partial'])) || (!empty($opts['partial']) && !empty($opts['view'])) || (count($opts) < 1) ) {
			FlyHelper::helper('Cannot call render!', Code::render());
		}

		// controller/action with locals. Ex: View::render( array( 'controller' => 'xxx', 'action' => 'xxx' ) )
		elseif (!empty($opts['controller']) && !empty($opts['action']) && !empty($opts['locals'])) {
			$controller = $opts['controller'];
			$action = $opts['action'];
			static::yield_view($controller, $action, $opts);
		}

		// view only. Ex: View::render( array( 'view' => 'xxx' ) )
		elseif (!empty($opts['view'])) {
			$controller = Router::$_called_controller;
			$action = $opts['view'];
			static::yield_view($controller, $action, $opts);
		}

		// partial (used in views). Ex: View::render( array( 'partial' => 'xxx' ) )
		elseif (!empty($opts['partial'])) {
			$locals = $opts['locals'];
			if (!empty($locals))
				extract($locals);
			$controller = Router::$_called_controller;
			$partial = $opts['partial'];
			$partial_array = explode('/', $partial);
			
			// partial in a controller.
			if (count($partial_array) == 1)
				include VIEW_PATH . $controller . '/_' . $partial . '.html.php';
			else { // partial in another view folder.
				$partial_file = array_pop($partial_array);
				$folders = implode('/', $partial_array);
				include VIEW_PATH . $folders. '/_' . $partial_file . '.html.php';
			}
		}

	}

	protected static function yield_view($controller, $action, $opts) {
		$locals = $opts['locals'];

		// getting layout from the controller in case of any.
		$controller_class = ucfirst($controller) . 'Controller';

		$layout_from_controller = property_exists($controller_class, 'layout') ? $controller_class::$layout : null;

		// picking layout file
		// layout preference (inside action > controller static variable > application)
		if (isset($opts['layout'])) {
			$layout_file = $opts['layout'] . '.html.php';
		} elseif (!empty($layout_from_controller)) {
			if ($layout_from_controller == 'none') {
				$no_layout = true;
			}
			$layout_file = $layout_from_controller . '.html.php';
		} else {
			$layout_file = 'application.html.php';
		}

		$view_path = VIEW_PATH . $controller . '/' . $action . '.html.php';

		// checking for no layout
		if ($no_layout) {
			$layout_path = false;
			$view_content = false;
		} else {
			$layout_path = VIEW_PATH . 'layouts/' . $layout_file;
			if (file_exists($view_path)) {
				$view_content = file_get_contents($view_path);
			} else {
				FlyHelper::helper('View file not found!', 'Please create a view file in the following place: ' . content_tag('pre', 'app/views/' . $controller . '/' . $action . '.html.php'));
			}
		}

		
		static::fly_yield($view_content, $layout_path, $locals);
	}

	public static function fly_yield($view_content, $layout_path, $locals = null) {
		if (!empty($locals))
			extract($locals);

		if ($view_content && $layout_path) {
			// substituting view in layout
			$layout_content = file_get_contents($layout_path);
			$new_file_content = str_replace('{{yield}}', $view_content, $layout_content);
			$new_file_name = ROOT . 'temp/' . Router::$_called_controller . '_' . Router::$_called_action . '_' . microtime(rand().uniqid()) . '.php';
			$temp_file = file_put_contents($new_file_name, $new_file_content);

			require $new_file_name;
			unlink ($new_file_name);
		} else {
			// no layout
			require VIEW_PATH . Router::$_called_controller . '/' . Router::$_called_action . '.html.php';
		}

		// setting view rendered to true for later checks
		self::$_view_rendered = true;
	}

}