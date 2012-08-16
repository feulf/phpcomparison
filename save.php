<?php
/**
 *  Benchmark
 *  ---------
 *  This benchmark is realized by Federico Ulfo. The library are part of the RainFramework.
 *  Distributed under MIT license http://www.opensource.org/licenses/mit-license.php
 */
	require_once "library/mysql.class.php";
	require_once "library/functions.php";
	require_once "library/config.php";

	$db = new mysql;
	$db->connect() or die("db connection error");

        $test_list = array( 'assign', 'loop' );
        $title_list = array( "execution_time", "memory" );

        if( !file_exists("csv/{$test_list[0]}_{$title_list[0]}.csv") ){

            foreach( $test_list as $test ){

                $template_tested =  $db->get_list( "SELECT template_engine FROM template_benchmark WHERE test='$test' GROUP BY template_engine ORDER BY n,template_engine", "template_engine", "template_engine" );
                $rows =             $db->get_list( "SELECT template_engine, round(avg(execution_time)) AS execution_time, round(avg(memory)/1024) AS memory, n FROM template_benchmark WHERE test='$test' GROUP BY template_engine, n ORDER BY n, template_engine" );
                $template_show =    $db->get_list( "SELECT template_engine, avg(execution_time) AS execution_time FROM template_benchmark WHERE test='$test' GROUP BY template_engine ORDER BY n, template_engine", "template_engine", "template_engine" );
                $nrows =            $db->get_list( "SELECT n FROM template_benchmark WHERE test='$test' GROUP BY n" );

                foreach ( $title_list as $title ){

                    $head = $title;
                    foreach( $template_tested as $k => $v )
                        $head .= $head ? ",$v" : "$v";

                    // create the execution time array
                    $tpl_array = array();
                    for( $i=0;$i<count($rows);$i++){
                            if( !isset( $tpl_array[ $rows[$i]['n'] ] ) )
                                    $tpl_array[ $rows[$i]['n'] ][] = $rows[$i]['n'];
                            $tpl_array[ $rows[$i]['n'] ][] = round( $rows[$i][$title] );
                    }

                    $html = $head;
                    foreach( $tpl_array as $num => $array ){
                        $html .= "\n";
                        for( $col=0;$col< count($array); $col++)
                                $html .= $col==0 ? $num : ",{$array[$col]}";
                    }

                    file_put_contents( "csv/{$test}_{$title}.csv", $html );

                }
            }
        }

        header( "Refresh: 0.1; url=index.php" );

?>