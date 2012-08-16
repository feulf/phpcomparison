<?php

error_reporting(E_ALL ^ E_NOTICE);

$n = 10;
$myvar = array();
$test = $_GET['test'] ? $_GET['test'] : 'assign';
$template_engine = $_GET['engine'] ? $_GET['engine'] : 'php';
$engine_path = 'template_engine/' . $template_engine;
	
for($i = 0; $i < $n; $i++) {
	if($test == 'loop') {
		$myvar[] = array(
			'id' => $i,
			'name' => "<b>longname$i</b>",
			'param1' => $i,
			'param2' => 'eiho',
			'param3' => '<h1>hello world</h1>'
		);
	} else {
		$myvar["var$i"] = '<b>blah!</b>';
	}
}	

//load template test
require_once 'template_engine/' . $template_engine . "/" . $test . ".php";

//display
echo $html;