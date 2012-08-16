<?php

require_once "savant/Savant3.php";

$tpl = new Savant3();
$tpl->assign($myvar);

$html = $tpl->fetch($engine_path . '/tpl/template_assign.php');