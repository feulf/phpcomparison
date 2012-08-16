<?php

include_once('dwoo/dwooAutoload.php');
	
$dwoo = new Dwoo(); 
$data = new Dwoo_Data(); 
$data->assign('foo', $myvar);

$html = $dwoo->get($engine_path . '/tpl/template_loop.html', $data);