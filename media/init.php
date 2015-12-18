<?php

//Universele klasse maken voor paden

/*** base path init ***/
$basepath = realpath(dirname(__FILE__));
define('BASE_PATH', $basepath . '/');

/*** site url init ***/
$baseurl = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
define('BASE_URL', $baseurl . '/');

/*** default paths init ***/
define('APPLICATION_PATH', BASE_PATH . 'application/');

/*** default urls init ***/
define('INDEX_URL', BASE_URL . 'index.php?r=');
//define('MEDIA_URL', BASE_URL . 'media/');
//define('CSS_URL', BASE_URL . 'css/');

/*** autoloading classes ***/
function __autoload($className)
{
	$pathArray = explode('_', $className);
	$pathName = implode('/', $pathArray);
	$file = strtolower(APPLICATION_PATH . $pathName . '.class.php');
	if (file_exists($file)) {
		require_once($file);
	}
	else {
		die('Cannot load class: ' . $className);
	}
}