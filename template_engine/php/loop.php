<?php

ob_start();
require_once 'tpl/template_loop.php';
$html = ob_get_clean();