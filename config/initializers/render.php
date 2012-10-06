<?php

// render function for rendering a php file
// function render ($opts) {
// 	if (isset($opts['partial'])) {
// 		require "_".$opts['partial'];
// 	}
// 	if (isset($opts['action']) && !isset($opts['controller'])) {
// 		// get controller which is being called, and call action of that controller
// 	}
// 	if (isset($opts['action']) && isset($opts['controller'])) {
// 		require ROOT."app/views/".$opts['controller']."/".$opts['action'].".php";
// 	}
// 	// if is_string($opts) {
// 	// 	// not for partials
// 	// 	require $opts
// 	// }
// }

class View {

	public static function render ($opts = array()) {
		$params = $opts['params'];
		// case 2:
		// $view = $opts['view'];
		// case 3:
		// $partial = $opts['partial'];

		extract($params);
		
		if (!empty($opts['controller']) && !empty($opts['action']) && !empty($opts['params']) && empty($opts['view']) && empty($opts['partial'])) {
			$controller = $opts['controller'];
			$action = $opts['action'];
			$view_path = VIEW_PATH . $controller . '/' . $action . '.html.php';
			$layout_file = isset($layout) ? $layout . '.html.php' : 'application.html.php';
			$layout_path = VIEW_PATH . 'layouts/' . $layout_file;

			$layout_content = file_get_contents($layout_path);
			$view_content = file_get_contents($view_path);
			$new_file_content = str_replace('{{yield}}', $view_content, $layout_content);
			$new_file_name = ROOT . 'temp/' . microtime(rand().uniqid()) . '.php';
			$temp_file = file_put_contents($new_file_name, $new_file_content);

			require $new_file_name;
			unlink ($new_file_name);
		}


	}

}

?>