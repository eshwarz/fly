<?php

class FlyHelper {

	public static function helper ($header, $message) {
		$content = "
		<div class='fly_helper'>
			<div class='header'>" . $header . "</div>
			<div class='content'>" . $message . "</div>
		</div>";
		
		$layout_path = VIEW_PATH . 'layouts/fly.html.php';
		View::fly_yield( $content, $layout_path );
		exit();
	}

	public static function not_found ($header, $message) {
		if (ENV == 'production') {
			self::helper('404 - Page Not Found!', 'Sorry, The page you are trying the view is not found!');
		} else {
			self::helper($header, $message);
		}
	}

}

?>