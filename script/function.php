<?php
	function get_current_url($with_get = true, $get_short_url = false)
	{
		$url = '';
		if (!$get_short_url) {
			if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
				$url .= 'https://';
			} else {
				$url .= 'http://';
			}
			$url .= $_SERVER['HTTP_HOST'];
		}
		$url .= $_SERVER['REQUEST_URI'];
		if (!$with_get && String::strpos($url, '?') !== false) {
			$url = String::substr($url, 0, String::strpos($url, '?'));
		}
		return $url;
	}
?>