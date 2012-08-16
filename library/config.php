<?php

#------------------------------------
#   Configuration 
#------------------------------------

global $template_list_package_size, $template_website;

// number of execution test for each template
$n_test_for_template = 10;

// number of variables assigned in each test
$n_values = array( 1, 10, 20, 50, 100 );

// get the list of the templates
$template_list = array(
	//'anetple',
    //'haanga',
    //'savant',
    //'dwoo',
	'raintpl',
	'php',
	'smarty',
	'twig',
);

$template_list_version = array(
	'anetple' => '1.0',
    'haanga' => '1.0.4',
    'savant' => '3.0.1',
	'php' => phpversion(),
	'raintpl' => '2.7.0',
    'dwoo' => '1.1.1',
	'smarty' => '3.1.7',
	'twig' => '1.5.1',
);
$template_list_package_size = array(
	'anetple' => '16 KB',
    'haanga' => '532 KB',
    'savant' => '209 KB',
	'php' => '4 KB',
	'raintpl' => '37 KB',
    'dwoo' => '848 KB',
	'smarty' => '971 KB',
	'twig' => '647 KB',
);

$template_website = array(
	'anetple' => '',
    'haanga' => 'http://haanga.org',
    'savant' => 'http://phpsavant.com',
	'php' => 'http://php.net',
	'raintpl' => 'http://www.raintpl.com',
    'dwoo' => 'http://dwoo.org',
	'smarty' => 'http://www.smarty.com',
	'twig' => 'http://twig-project.org',
);