<?php

/**
* HTML Helper helps you write HTML tags through PHP
*/

class Html
{

	// creates Anchor tags
	public static function link_to($text, $url, $params = array())
	{
		$url = Router::routeByConstant($url);
		
		// setting get params for a link from $params['params']
		if (isset($params['params'])) {
			$get_params = self::array_to_params($params['params']);
			unset($params['params']);
		}

		$link = '<a href="' . $url . $get_params . '" ' . array_to_attributes($params) . '>' . $text . '</a>';
		return $link;
	}

	// redirects to given URL
	public static function redirect_to($path)
	{
		// converting to url from constant in case if it is
		$path = Router::routeByConstant($path);
		header('Location:'.$path);
		exit();
	}

	// array to attributes
	public static function array_to_attributes($array = array())
	{
		$params = ' ';
		foreach ($array as $key => $value) {
			$params .= $key . '="' . $value . '" ';
		}
		return $params;
	}

	// array to parameteres
	public static function array_to_params($array = array())
	{
		$params = '?';
		foreach ($array as $key => $value) {
			$params .= $key . '=' . $value . '&';
		}
		$params = substr($params, 0, strlen($params) - 1);
		return $params;
	}

	// content_tag() creates any paired tag
	public static function content_tag($tag, $content, $options = array())
	{
		$attributes = self::array_to_attributes($options);
		$tag = '<' . $tag . $attributes . '>' . $content . '</' . $tag . '>';
		return $tag;
	}

	// strong tag
	public static function strong($content, $options = array())
	{
		return '<strong' . self::array_to_attributes($options) . '>' . $content . '</strong>';
	}

	// b tag
	public static function b($content, $options = array())
	{
		return '<b' . self::array_to_attributes($options) . '>' . $content . '</b>';
	}

	// i tag
	public static function i($content, $options = array())
	{
		return '<i' . self::array_to_attributes($options) . '>' . $content . '</i>';
	}

	// u tag
	public static function u($content, $options = array())
	{
		return '<u' . self::array_to_attributes($options) . '>' . $content . '</u>';
	}

	// em tag
	public static function em($content, $options = array())
	{
		return '<em' . self::array_to_attributes($options) . '>' . $content . '</em>';
	}

	// br tag
	public static function br()
	{
		return '<br/>';
	}

	// hr tag
	public static function hr()
	{
		return '<hr/>';
	}
}