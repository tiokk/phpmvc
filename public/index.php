<?php
require_once '../app/init.php';
function sanitize_output($buffer){
	$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s','/<!--(?!\[if)(.|\s)*?-->/');
	$replace = array('>','<','\\1','');
	$buffer = preg_replace($search, $replace, $buffer);
	return $buffer;	
}
ob_start("sanitize_output");
$app = new App;
ob_end_flush(); 
