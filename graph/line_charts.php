<?php

	require_once "../library/mysql.class.php";
	require_once "../library/functions.php";
        require_once "Charts.php";

	$test = get('test')=='loop'?'loop':'assign';
	$type = get('type')=='memory'?'memory':'execution_time';


        $chart = new Charts;
        $chart->load_csv( "../csv/{$test}_{$type}.csv" );
        $chart->draw();

?>