<?php
	$db['default']['dbserver'] = 'mysql';
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = 'root';
	$db['default']['database'] = 'benchmark';
/*
To override db connection details, copy the above config values into a file called config.db.local.php,
which is set to be ignored by git and thus will not be committed inadvertently!
*/
if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR.'config.db.local.php')) {
	include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.db.local.php';
}
?>