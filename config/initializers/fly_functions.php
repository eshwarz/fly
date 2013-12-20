<?php
// Fly globals
function require_all($destination) {
	Fly::require_all($destination);
}

function require_js($file) {
	Fly::require_js($file);
}

function require_css($file) {
	Fly::require_css($file);
}

function humanize($str) {
	return Fly::humanize($str);
}

function escape_data ($data) {
	return Fly::escape_data($data);
}

// used once

function link_less($file) {
	return Fly::link_less($file);
}

function link_css($file) {
	return Fly::link_css($file);
}

function error_handler($severity, $error, $file, $line) {
	return Fly::errorHandler($severity, $error, $file, $line);
}

function shutdown() {
	return Fly::shutdown();
}

// Html globals
function array_to_attributes ($array) {
	return Html::array_to_attributes($array);
}

function array_to_params ($array) {
	return Html::array_to_params($array);
}

function link_to($text, $url, $params = array()) {
	return Html::link_to($text, $url, $params);
}

function redirect_to($path) {
	return Html::redirect_to($path);
}

function content_tag($tag, $content, $options = array()) {
	return Html::content_tag($tag, $content, $options);
}

function strong($content, $options = array()) {
	return Html::strong($content, $options);
}

function b($content, $options = array()) {
	return Html::b($content, $options);
}

function i($content, $options = array()) {
	return Html::i($content, $options);
}

function u($content, $options = array()) {
	return Html::u($content, $options);
}

function em($content, $options = array()) {
	return Html::em($content, $options);
}

function br() {
	return Html::br();
}

function hr() {
	return Html::hr();
}

// Input global functions
function get_params($key = null, $xss_filter = false) {
	return Input::getParams($key, $xss_filter);
}

function post_params($key = null, $xss_filter = false) {
	return Input::postParams($key, $xss_filter);
}

function params($key = null, $xss_filter = false) {
	return Input::params($key, $xss_filter);
}

function server($key = null) {
	return Input::server($key);
}

function user_agent() {
	return Input::userAgent();
}

function set_session($key, $value) {
	return Session::setSession($key, $value);
}

function session($key = null) {
	return Session::getSession($key);
}

function remove_session($key = null) {
	return Session::removeSession($key);
}

function set_cookie($name, $value, $expire = 0, $path = COOKIE_PATH, $domain = COOKIE_DOMAIN, $secure = false, $httponly = false) {
	return Session::saveCookie($name, $value, $expire, $path, $domain, $secure, $httponly);
}

function cookie($key = null) {
	return Session::cookie($key);
}

function remove_cookie($key = null) {
	return Session::removeCookie($key);
}