<?php
// image_tag function

function image_path ($image) {
	$image_path = SERVER_PATH."app/assets/images/";
	return $image_path.$image;
}

function image_tag ($image, $params) {
	$image_tag = '<img src="'.image_path($image).'" ';
	$image_tag .= array_to_params($params);
	$image_tag .= '/>';
	echo $image_tag;
}
?>