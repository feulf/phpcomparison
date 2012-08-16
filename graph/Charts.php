<?php


	class Charts{
		
		private static 	$charts_count = 0;
                private static  $colors = "['#3366cc','#dc3912','#ff9900','#109618','#990099','#0099c6','#dd4477']";

		/**
		 * Load data from CSV file
		 *
		 */
		function load_csv( $file ){
			$file = file_get_contents( $file );
			$rows = explode("\n",$file);
			for( $i=0;$i<count($rows);$i++ )
                                $this->data[$i] = explode( ",", $rows[$i] );
		}
						
		/**
		 * Load data from array
		 *
		 */
		function set_data($array){
			$this->data = $array;
		}



		/**
		 * Draw line
		 *
		 */
		function draw_line(){
			$this->_draw('line');
		}
		
		
		
		/**
		 * Draw pie
		 *
		 */
		function draw_pie(){
			$this->_draw('pie');
		}

		
		
		
		
		
		private function _draw( $chart = 'line'){
			
			$id = 'name' . self::$charts_count;

			if( !self::$charts_count )
				$this->_init_script();
			self::$charts_count++;

			$js = '<script>' . "\n";
			$js .= '	google.load("visualization", "1", {packages:["corechart"]});' . "\n";
			$js .= '	google.setOnLoadCallback(drawChart);' . "\n";
			$js .= '	function drawChart() {' . "\n";
			$js .= '		var data = new google.visualization.DataTable();' . "\n";

			$data = $this->data;

			$rows = count($data);
			$ncol = count($data[0]);
			
			for( $i=0;$i<$ncol;$i++ )
				if($i==0)
					$js .= "		data.addColumn('string', '{$data[0][$i]}' );" . "\n";
				else
					$js .= "		data.addColumn('number', '{$data[0][$i]}' );" . "\n";

			$js .= '		data.addRows('.($rows-1).');' . "\n";
			
			
			for($i=1;$i<$rows;$i++)
				for( $j=0;$j<$ncol;$j++)
					if($j==0)
						$js .= "		data.setValue(".($i-1).", $j, '{$data[$i][$j]}' )". "\n";
					else
						$js .= "		data.setValue(".($i-1).", $j, {$data[$i][$j]} )". "\n";
			

			if( $chart == 'line' ){
				$js .= "		var chart = new google.visualization.LineChart(document.getElementById('$id'));" . "\n";
				$js .= "		chart.draw(data, {lineType: 'function', colors:".self::$colors.", width:750, height: 300, vAxis: {maxValue: 10}} );" . "\n";
			}
			else{
				$js .= "		var chart = new google.visualization.PieChart(document.getElementById('$id'));";
				$js .= "		chart.draw(data, {width: 430, height: 350, colors:['#3366cc','#dc3912','#ff9900','#109618'], is3D:true });";
			}
			
			$js .= '	}' . "\n";
			$js .= '</script>' . "\n";

			$html = '<div id="'.$id.'"></div>';

			echo $js;
			echo $html;

		}

		function _init_script(){
			$js = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>' . "\n";
			echo $js;
		}

	}


?>



