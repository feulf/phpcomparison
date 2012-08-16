<?php

/**
 *  Benchmark
 *  ---------
 *  This benchmark is realized by Federico Ulfo. The library are part of the RainFramework.
 *  Distributed under MIT license http://www.opensource.org/licenses/mit-license.php
 */

error_reporting(E_ALL ^ E_NOTICE);

session_start();
	
require_once "library/functions.php";
require_once "library/mysql.class.php";
require_once "library/config.php";

$db = new mysql;
$db->connect() or die("db connection error");

//install / reset?
if(isset($_GET['reset']) || !isset($_SESSION['working'])) {
	db_install($db);
}

//no more installs!
$_SESSION['working'] = 1;

$vars = $db->get_row("SELECT * FROM template_test_counter");

$test = $vars['test'];
$template_number = $vars['template_number'];
$test_number = $vars['test_number'];
$execution_number = $vars['execution_number'];	

$myvar = array();
$n = $n_values[$test_number];
$template_engine = $template_list[$template_number];
$engine_path = 'template_engine/' . $template_engine;
	
for($i = 0; $i < $n; $i++) {
	if($test == 'loop') {
		$myvar[] = array(
			'id' => $i,
			'name' => "<b>longname$i</b>",
			'param1' => $i,
			'param2' => 'eiho',
			'param3' => '<h1>hello world</h1>'
		);
	} else {
		$myvar[] = '<b>blah!</b>';
	}
}	

// start benchmark	
$stimer = explode(' ', microtime());
$start = $stimer[1] + $stimer[0];
$memstart = memory_get_usage();

require_once 'template_engine/' . $template_engine . "/" . $test . ".php"; 
	
$mem = memory_get_usage() - $memstart;
$stimer = explode(' ', microtime());
$exc = $stimer[1] + $stimer[0];
$exc = round(($exc - $start) * 1000000);

// stop benchmark
$html = '<h1>Template speed test</h1>
		template: <b>'.$template_engine.'</b><br/>test type: <b>'.$test.'</b><br/>
		test cycle: <b>'.($execution_number+1).'/'.$n_test_for_template.'</b><br/>
		n variables: <b>'.$n.'</b><br/>
		execution time: <b>'.$exc.'</b><br/>
		memory used: <b>'.$mem.'</b>';

//save to db
$db->query("INSERT INTO template_benchmark (template_engine,test,n,execution_time,memory) VALUES('$template_engine', '$test','$n', '$exc', '$mem')");

//+1 cycle
$execution_number++;

//end point check?
if($execution_number >= $n_test_for_template) {
	$execution_number = 0;
	$template_number++;
	if($template_number >= count($template_list)) {
		$template_number = 0;
		$test_number++;
		if($test_number >= count($n_values)) {
			if($test == 'assign') {
				$template_number = $test_number = $execution_number = 0;
				$db->query("UPDATE `template_test_counter` SET `test` = 'loop', `template_number` = '$template_number', `test_number` = '$test_number', `execution_number` = '$execution_number'");
				header("Refresh: 0.1; url=test.php");
				exit;
			}else{
				header("Refresh: 0.1; url=save.php");
				$db->query("UPDATE `template_test_counter` SET `test` = '$test', `template_number` = '$template_number', `test_number` = '$test_number', `execution_number` = '$execution_number'");
				$template_number = $test_number = $execution_number = 0;
				unset($_SESSION['working']);
				exit;
			}
		}
	}
}
	
$db->query("UPDATE `template_test_counter` SET `test` = '$test', `template_number` = '$template_number', `test_number` = '$test_number', `execution_number` = '$execution_number', time=UNIX_TIMESTAMP()");

header("Refresh: 0.1; url=test.php?test=$test");
echo $html;