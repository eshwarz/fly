<?php

class FlyHelper {

	public static function helper ($header, $message) {
		$content = "
		<div class='fly_helper'>
			<div class='header'>" . $header . "</div>
			<div class='content'>" . $message . "</div>
		</div>";
		
		$layout_path = VIEW_PATH . 'layouts/fly.html.php';
		View::yield( $content, $layout_path );
	}

}

?>