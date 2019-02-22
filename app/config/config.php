<?php
if (isset($_GET['url'])) {
	$url = rtrim($_GET['url'],'/');
$url = explode('/', $url);
	define('PAGE', ucwords($url[0] ));
}else{
	define('PAGE', 'Home');
}
define('BASEURL', '/phpmvc/');
define('ASSETS_DIR', BASEURL.'assets/');
define('PLUGINS_DIR',BASEURL.'plugin/');
 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_mvc');
 