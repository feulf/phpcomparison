<?php

require_once 'dwoo/dwooAutoload.php';
	
$dwoo = new Dwoo(); 
$data = new Dwoo_Data();
$data->assign($myvar);

$html = $dwoo->get($engine_path . '/tpl/template_assign.html', $data);