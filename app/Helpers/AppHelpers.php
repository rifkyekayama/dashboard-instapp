<?php

namespace App\Helpers;

class AppHelpers{

	public static function changeLang($lang, $changeLang){
		$url = parse_url($lang);
		$path = explode('/', $url['path']);
		$path[1] = $changeLang;
		$url['path'] = implode('/', $path);
		$port = !is_null($url['port']) ? ":".$url['port'] : '';
		$mix = $url['scheme']."://".$url['host'].$port.$url['path'];
		return $mix;
	}
}