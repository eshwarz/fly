<?php
// image_tag function

function image_path ($image) {
	$image_path = "/app/assets/images/";
	return $image_path.$image;
}

function image_tag ($image, $params = null) {
	$image_tag = '<img src="'.image_path($image).'" ';
	if (!empty($params))
		$image_tag .= array_to_params($params);
	$image_tag .= '/>';
	return $image_tag;
}
?>