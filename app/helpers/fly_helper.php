<?php

class Fly {

	public static function helper ($header, $message) {
		$content = "
		<div class='fly_helper'>
			<div class='header'>" . $header . "</div>
			<div class='content'>" . $message . "</div>
		</div>";
		require_once VIEW_PATH . 'layouts/fly.html.php';

		echo $content;
	}

}

?>