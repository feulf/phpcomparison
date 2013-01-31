<?php
require_once 'libs/PHPTAL.php';
try {
    $tpl = new PHPTAL($GLOBALS['engine_path'].'/templates/template_assign.html');
    $tpl->vars = $GLOBALS['myvar'];
    $html = $tpl->execute();
} catch (Exception $e) {
    echo "<pre>";
    echo $e;
    echo "</pre>";
}

