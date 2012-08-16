<?php

require_once 'inc/rain.tpl.class.php';
	
raintpl::$tpl_dir = $engine_path . '/tpl/';
raintpl::$cache_dir = $engine_path . '/tmp/';

$tpl = new raintpl;
$tpl->assign($myvar);

$html = $tpl->draw("template_assign", true);