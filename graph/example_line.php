<?php

	require_once "../library/mysql.class.php";
	require_once "../library/functions.php";
        require_once "../library/Charts.php";


	$test = get('test')=='loop'?'loop':'assign';
	$type = get('type')=='memory'?'memory':'execution_time';

        $charts = new Charts();
        $charts->load_csv( "../csv/{$test}_{$type}.csv" );
        $charts->draw_line();

?>