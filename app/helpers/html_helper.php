<?php

/**
* HTML Helper helps you write HTML tags through PHP
*/

class Html
{

	// creates Anchor tags
	public static function link_to($text, $url, $params = array())
	{
		if (strpos($url, '/') === false && strpos($url, '#') === false) {
			$url = Router::route_by_constant($url);
		}
		$link = '<a href="'.$url.'" '.array_to_params($params).'>'.$text.'</a>';
		return $link;
	}

	// redirects to given URL
	public static function redirect_to($path)
	{
		if (strpos($path, '/') === false && strpos($url, '#') === false) {
			$path = Router::route_by_constant($path);
		}
		header('Location:'.$path);
		exit();
	}

	// array to parameters
	public static function array_to_params($array = array())
	{
		$params = ' ';
		foreach ($array as $key => $value) {
			$params .= $key . '="' . $value . '" ';
		}
		return $params;
	}

	// content_tag() creates any paired tag
	public static function content_tag($tag, $content, $options = array())
	{
		$attributes = self::array_to_params($options);
		$tag = '<' . $tag . $attributes . '>' . $content . '</' . $tag . '>';
		return $tag;
	}


}