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
	//'dwoo',
	//'haanga',
	'php',
	'phptal',
	'raintpl',
	//'savant',
	'smarty',
	'twig',
	'twig12',
);

$template_list_version = array(
	'anetple' => '1.0',
	'haanga' => '1.0.4',
	'dwoo' => '1.1.1',
	'php' => phpversion(),
	'phptal' => '1.2.2',
	'raintpl' => '2.7.0',
	'savant' => '3.0.1',
	'smarty' => '3.1.11',
	'twig' => '1.5.1',
	'twig12' => '1.12.2',
);

$template_list_package_size = array(
	'anetple' => '16 KB',
	'dwoo' => '848 KB',
	'haanga' => '532 KB',
	'php' => '4 KB',
	'phptal' => '330 KB',
	'raintpl' => '37 KB',
	'savant' => '209 KB',
	'smarty' => '1100 KB',
	'twig' => '647 KB',
	'twig12' => '2000 KB',
);

$template_website = array(
	'anetple' => '',
	'dwoo' => 'http://dwoo.org',
	'haanga' => 'http://haanga.org',
	'php' => 'http://php.net',
	'phptal' => 'http://www.phptal.org/',
	'raintpl' => 'http://www.raintpl.com',
	'savant' => 'http://phpsavant.com',
	'smarty' => 'http://www.smarty.net/',
	'twig' => 'http://twig-project.org',
	'twig12' => 'http://twig-project.org',
);

