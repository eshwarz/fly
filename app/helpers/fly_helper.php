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

	public static function notFound ($header, $message) {
		if (ENV == 'production') {
			self::helper(
				content_tag('h3', '404 - Page Not Found!', array('style' => 'text-align: center;')),
				content_tag('h2', 'Sorry, The page you are trying the view is not found!', array('style' => 'text-align: center;'))
			);
		} else {
			self::helper($header, $message);
		}
	}

	public static function emergencyMessage () {
		self::helper(
			content_tag('h3', ':\'( Something went wrong!', array('style' => 'text-align: center;')),
			content_tag('h2', 'Sorry, Something went wrong and we are trying to fix it!', array('style' => 'text-align: center;'))
		);
	}

}

?>