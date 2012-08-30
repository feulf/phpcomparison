<?php

/**
 *  Benchmark
 *  ---------
 *  This benchmark is realized by Federico Ulfo. The library are part of the RainFramework.
 *  Distributed under MIT license http://www.opensource.org/licenses/mit-license.php
 */


	session_start();
	
	if(isset($_SESSION['working'])) {
		header("Refresh: 30; url=index.php");
		echo 'Benchmarking currently in progress. The results will appear here once the test has completed.' . "\n";
		exit();
	}

	require_once "library/mysql.class.php";
	require_once "library/functions.php";
	require_once "library/config.php";

	$db = new mysql;
	$db->connect() or die("db connection error");
	
	$test = get('test')=='loop'?'loop':'assign';
	
	$summary = $db->get_list( "SELECT template_engine AS name, avg(execution_time) AS execution_time, avg(memory) AS memory FROM template_benchmark WHERE test='$test' GROUP BY template_engine ORDER BY execution_time" );

    $last_update = $db->get_field( "time", "SELECT time FROM template_test_counter LIMIT 1" );
    $last_update_date = date( "M d Y", $last_update );
    $last_update_time = date( "h:i A", $last_update );

	$db = new mysql;
	$db->connect() or die("db connection error");
	$template_tested = (array) $db->get_list( "SELECT template_engine FROM template_benchmark WHERE test='$test' GROUP BY template_engine ORDER BY template_engine", "template_engine", "template_engine" );

	if( $template_selected = get( 'template' ) ){
		$where = "WHERE test='$test' AND (";
		$i=0;
		foreach( $template_selected as $tpl => $on ){
			$where .= $i==0?" template_engine='$tpl'":" OR template_engine='$tpl'";
			$i=1;
		}
		$where .= ")";
	}
	else
		$where = "WHERE test='$test'";
		

	$rows = $db->get_list( "SELECT template_engine, n, avg(execution_time) AS execution_time, avg(memory) AS memory FROM template_benchmark $where GROUP BY template_engine, n ORDER BY n, execution_time, template_engine" );
	$template_show = $db->get_list( "SELECT template_engine, avg(execution_time) AS execution_time FROM template_benchmark $where GROUP BY template_engine ORDER BY n, execution_time, template_engine", "template_engine", "template_engine" );
	$nrows = $db->get_list( "SELECT n FROM template_benchmark $where GROUP BY n" );
?>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Template Engine Comparison</title>
	<link href="graph/style.css" type="text/css" rel="stylesheet"/>
	<script>
	
		
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-5639487-17']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</head>
<body>

	<div id="wrapper">

		<h1>PHP Template Engine Comparison</h1>
		<h3>Speed matters... sometimes...</h3>
		<br/>

        <div id="last_update">updated on <?php echo $last_update_date; ?> at <?php echo $last_update_time; ?></div>

		<p>
		A blogger asked me "Do you know any professional benchmarks for templates?" So I made this one. 
		Now, this project is getting the attention of the international PHP developers community, which is divided
		in two. One says PHP itself is the best template engine, the other says PHP needs template engines.
		With these benchmark &amp; charts you can compare the performances of template engines vs PHP templates, and make your choice.
		
		<br/><br/><br/>
		This benchmark is performed by executing an assignment and a loop test. Each template engine is executed <?php echo $n_test_for_template; ?> times foreach single test.
        The test is executed on compiled template. The charts shows the average execution time and memory consumed for each test. Have fun! <br/>

        <br/><br/>
        This project is open source <a href="https://github.com/rainphp/phpcomparison" target="_blank">click here to download the benchmark!</a> and <a href="https://twitter.com/feulf" target="_blank">here follow me on Twitter</a>

		</p>
		<br/><br/>
		  <div id="selector">
		  	<form action="index.php">
		      <?php
		      	$sel = "";
		    	foreach( $template_tested as $template ){
		    		if( isset($template_show[ $template ] ))
		    			$sel .= "template[".$template  . "]=on&";
		    		echo '<label for="'.$template.'">'.$template.'</label> <input type="checkbox" name="template['.$template.']" '. ( isset($template_show[ $template ]) ? 'checked="checked"':'' ) .'> &nbsp;&nbsp; ';
		    	}
		    ?>
		    &nbsp;
		    <select name="test"><option value="assign" <?php if($test=='assign')echo 'SELECTED'; ?> >Assign</option><option value="loop" <?php if($test=='loop')echo 'SELECTED'; ?>>Loop</option></select>
		    &nbsp; &nbsp; &nbsp;	<input type="submit" value="Click to refresh">
		    </form>
		  </div>

  		<div class="graph">
  			<h2>Summary (<?php echo $test; ?>)</h2>

			<table cellpadding="0" cellspacing="1">
				<tr>
					<td class="table_title">Test</td>
					<td class="table_title">tot. time</td>
					<td class="table_title">tot. memory</td>
					<td class="table_title">package size</td>
				</tr>
		
			<?php 
				global $template_website;
				foreach( $summary as $name => $res ){ 
					if( isset($template_show[$res['name']]) ){
				?>
			
				<tr>
					<td><?php echo '<a href="'.($template_website[$res['name']]).'" target="_blank">'.$res['name'] . '</a>'; ?>  <span class="comment"><? echo $template_list_version[$res['name']]; ?></span></td>
					<td><?php echo msec($res['execution_time']); ?></td>
					<td><?php echo format_memory($res['memory']); ?></td>
					<td><?php echo getDirectorySize($res['name']); ?></td>
				</tr>
			
			<?php } } ?>
			
			</table>

  		</div>

		<div class="graph">
			<h2>Execution Time (<?php echo $test; ?>)</h2>
			<div class="graph_inner">
				<iframe id="graph2" src="graph/line.php?<?php echo $sel; ?>test=<?php echo $test; ?>" width="100%" height="350" style="border:0px;"></iframe>
			</div>
			<h2>Memory (<?php echo $test; ?>)</h2>
			<div class="graph_inner">
				<iframe id="graph3" src="graph/line.php?<?php echo $sel; ?>type=memory&test=<?php echo $test; ?>" width="100%" height="350" style="border:0px;"></iframe>
			</div>

		</div>
		
		<div class="graph">
			<h2>Total average (<?php echo $test; ?>)</h2>
			<div class="graph_inner">
				<div style="float:left;"><iframe src="graph/pie.php?<?php echo $sel; ?>test=<?php echo $test; ?>" width="440" height="380" style="border:0px;"></iframe></div>
				<div style="float:right;"><iframe src="graph/pie.php?<?php echo $sel; ?>test=<?php echo $test; ?>&type=memory" width="440" height="380" style="border:0px;"></iframe></div>
			</div>
		</div>
  
	</div>
	
	<div id="social">
            <a href="https://twitter.com/feulf" target="_blank">Follow me on Twitter</a>
<br/><br/>
	</div>
	
	<div id="copyright">
		<a href="http://www.federicoulfo.it">Federico Ulfo</a>
	</div>
	
	
	
</body>
</html>

