<?php

namespace common\modules;

class ServiceContainer {

	public static $config; 

	public static function config() {
		if(!self::$config)
			return require substr(__DIR__,0, strrpos(__DIR__, DIRECTORY_SEPARATOR)).DIRECTORY_SEPARATOR.config.DIRECTORY_SEPARATOR.'config.php';
		return self::$config;
	}


}




