<?php

require_once 'libs/Smarty.class.php';

$tpl = new Smarty;
$tpl->template_dir = $engine_path . '/templates';
$tpl->compile_dir = $engine_path . '/templates_c';
$tpl->assign($myvar);

$html = $tpl->fetch('template_assign.html');