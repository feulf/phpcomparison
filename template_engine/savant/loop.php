<?php

require_once "savant/Savant3.php";

$tpl = new Savant3();
$tpl->assign('foo', $myvar);

$html = $tpl->fetch($engine_path . '/tpl/template_loop.php');