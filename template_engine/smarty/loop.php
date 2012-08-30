<?php
require_once 'libs/Smarty.class.php';

$tpl = new Smarty;
$tpl->_file_perms = 0664;
$tpl->_dir_perms = 0775;
$tpl->setTemplateDir($GLOBALS['engine_path'] . '/templates');
if (!is_writable($GLOBALS['engine_path'] . '/templates_c')) {
	echo 'Smarty templates_c folder is not writable: '.$GLOBALS['engine_path'] . '/templates_c';
	exit;
}
$tpl->setCompileDir($GLOBALS['engine_path'] . '/templates_c');
if (!is_writable($GLOBALS['engine_path'] . '/cache')) {
	echo 'Smarty cache folder is not writable: '.$GLOBALS['engine_path'] . '/cache';
	exit;
}
$tpl->setCacheDir($GLOBALS['engine_path'] . '/cache');
$tpl->assign($GLOBALS['myvar']);

$html = $tpl->fetch('template_loop.html');