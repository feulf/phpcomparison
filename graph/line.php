<?php

	require "../vendor/autoload.php";
	require_once "../library/functions.php";
        use Rain\DB;
        DB::configure('config_dir', dirname(__DIR__) .'/config/');
        DB::init();

	$test = get('test')=='loop'?'loop':'assign';
	$type = get('type')=='memory'?'memory':'execution_time';
	$template_tested = DB::getAllArray("SELECT template_engine 
                                       FROM template_benchmark 
                                       WHERE test=:test
                                       GROUP BY template_engine 
                                       ORDER BY template_engine", 
                                       array(':test'=>$test),
                                       "template_engine", 
                                       "template_engine" );

	$rows = DB::getAllArray( "SELECT template_engine, 
                                         n, 
                                         avg(execution_time) AS execution_time, 
                                         round(avg(memory)/1024) AS memory 
                                  FROM template_benchmark 
                                  WHERE test=:test
                                  GROUP BY template_engine, n 
                                  ORDER BY n, template_engine",
                                  array(':test'=>$test));
	$template_show = DB::getAllArray( "SELECT template_engine, 
                                             avg(execution_time) AS execution_time 
                                           FROM template_benchmark 
                                           WHERE test=:test
                                           GROUP BY template_engine 
                                           ORDER BY n, template_engine", 
                                           array(":test"=>$test),
                                           "template_engine", "template_engine" );
	$nrows = DB::getAllArray("SELECT n 
                                  FROM template_benchmark 
                                  WHERE test=:test
                                  GROUP BY n",
                                  array(':test'=>$test)
                                 );

	$color = array('#3366cc','#dc3912','#ff9900','#109618','#990099','#0099c6','#dd4477' );
	$nc = sizeof($color);
	$color_sel = "colors:[";
	
	$i=0;$cs=false;
	foreach( $template_tested as $template ){
		if( isset($template_show[ $template ] )){
			$color_sel .= $cs ? ",'".$color[$i%$nc] . "'" : "'".$color[$i%$nc] . "'" ;
			$cs=true;
		}
		$i++;
	}
	$color_sel .= "],";

	
  	// create the execution time array
  	$tpl_array = array();		  		
  	for( $i=0;$i<count($rows);$i++){
  		if( !isset( $tpl_array[ $rows[$i]['n'] ] ) )
  			$tpl_array[ $rows[$i]['n'] ][] = $rows[$i]['n'];
  		$tpl_array[ $rows[$i]['n'] ][] = round( $rows[$i][$type] );
  	}
	
  	$html = "data.addRows(".(count($nrows)).");\n";

	// add column
	foreach( $template_show as $tpl )
  		$html .= "data.addColumn('number', '$tpl');\n";
  	
  	$row=0;
  	foreach( $tpl_array as $num => $array ){
  		for( $col=0;$col< count($array); $col++)
			$html .= $col==0 ? 'data.setValue('.$row.','.$col.','. "'" . $num. "'" . ");\n" : 'data.setValue('.$row.','.$col.','. ( $array[$col] ) . ");\n";
		$row++;
  	}

?>


<html>
	<head>
		<link href="../graph/style.css" type="text/css" rel="stylesheet"/>
		    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		    <script type="text/javascript">
		    	google.load("visualization", "1", {packages:["corechart"]});
				google.setOnLoadCallback(drawChart);
				function drawChart() {
					// Create and populate the data table.
					var data = new google.visualization.DataTable();
					data.addColumn('string', '<?php echo $type; ?>' );
				  
					<?php echo $html; ?>
					
					var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
					chart.draw(data, {lineType: "function", <?php echo $color_sel; ?> width:750, height: 300, vAxis: {maxValue: 10}} );
				}
			</script>
		</head>
	<body>
		<?php
			if( $type == 'memory' )
				echo "Memory (KB)";
			else
				echo "Execution Time (&mu;s)"
		?>
		<div id="line_chart"></div>
		
		<div style="margin-left:600px;">
		<?php
			if( $test == 'assign' )
				echo "Assigned variables";
			else
				echo "Array elements"
		?>
		</div>

	</body>
</html>