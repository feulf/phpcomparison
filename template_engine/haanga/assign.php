<?php

require_once "haanga/lib/Haanga.php";

Haanga::Configure(array(
    'cache_dir' => $engine_path . '/tmp/',
    'template_dir' => $engine_path . '/tpl/',
    'compiler' => array(
		//'autoescape' => false,
    ),
));

$html = Haanga::load('template_assign.html', $myvar, true);