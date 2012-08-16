<?php

extract($myvar);

ob_start();
require_once 'tpl/template_assign.php';
$html = ob_get_clean();