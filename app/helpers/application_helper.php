<?php
function current_user() {
	if (!empty($_SESSION['fly_user'])) {
		$uid = $_SESSION['fly_user'];
		return User::find($uid);
	} else {
		return false;
	}
}
?>