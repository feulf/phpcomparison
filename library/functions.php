<?php

	date_default_timezone_set('America/New_York');

	function dump( $mixed, $exit = 1 ){
		echo "<pre>dump \n---------------------- \n\n" . print_r( $mixed, true ) . "\n----------------------<pre>";
		if( $exit ) exit;
	}
	
	function timer(){
		$microtime = explode(' ', microtime());
	    return $microtime[1] . substr($microtime[0], 1);
	}

	function msec( $m ){
		return round($m) . " &mu;s";
	}
	
	function format_memory( $size ){
		if( $size > 0 ){
		    $unim = array("B","KB","MB","GB","TB","PB");
		    for( $i=0; $size >= 1024; $i++ )
		        $size = $size / 1024;
		    return round( $size, 2 ) . " ".$unim[$i];
		}
	}

	function get( $key = null ){
		if( isset($_GET[$key]) ){
			if( is_array( $_GET[$key] ) ){
				
				$g = array();
				foreach( $_GET[$key] as $k => $v )
					$g[$k] = addslashes($v);
				return $g;
			}
			else
				return addslashes( $_GET[$key] );
		}
		
	}

	function getDirectorySize($tpl){
		global $template_list_package_size;
		return $template_list_package_size[$tpl];
	}
  
	function db_install($db) {
		//log table
		$db->query("CREATE TABLE IF NOT EXISTS `template_benchmark` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`template_engine` varchar(255) NOT NULL,
			`test` varchar(60) NOT NULL,
			`n` int(11) NOT NULL,
			`execution_time` int(11) NOT NULL,
			`memory` int(11) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
		//counter table
		$db->query("CREATE TABLE IF NOT EXISTS `template_test_counter` (
			`test` varchar(30) NOT NULL,
			`template_number` int(11) NOT NULL,
			`test_number` int(11) NOT NULL,
			`execution_number` int(11) NOT NULL,
			`time` int(11) NOT NULL,
			PRIMARY KEY (`test`,`template_number`,`test_number`,`execution_number`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
		//clean up
		$db->query("TRUNCATE TABLE template_benchmark");
		$db->query("TRUNCATE TABLE template_test_counter");
		$db->query("INSERT INTO template_test_counter VALUES ('assign',0,0,0,0)");
		//session reset
		$_SESSION['template_number'] = $_SESSION['test_number'] = $_SESSION['execution_number'] = 0;
	}