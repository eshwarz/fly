<?php
// Welcome to fly with PHP framework 
// For the easiest way to use PHP.
// This is an open source. Feel free to fork it at https://github.com/eshwarz/fly.git

// requiring all the files in a folder
function require_all($destination) {
	$dir = opendir($destination);	
	while ($file = readdir($dir))
	{
		if ($file!='.' && $file!='..')
		{
			require_once $destination."/".$file;
		}
	}
	closedir($dir);
}

// array to parameters
function array_to_params ($array) {
	$params = ' ';
	foreach ($array as $key => $value) {
		$params .= $key.'="'.$value.'" ';
	}
	return $params;
}
?>