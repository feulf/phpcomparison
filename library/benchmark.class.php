<?php

class Benchmark{

	private $bench_class;
	
	public function Benchmark( $bench_class ){
		require_once 'benchmark/' . $bench_class . ".php";
		$this->bench_class = $bench_class;
	}

	/**
	* Run the benchmark
	* @param int Minimum number of iterations
	* @param int Maximum number of iterations
	* @param int Amount to increment by on each test.
	*/
	public function run_template_assign(){

		$db = sqlite_open('mysqlitedb', 0666, $sqliteerror);

		global $n;
		$class = new $this->bench_class;
		$methods = get_class_methods( $this->bench_class );
		$h = '';
		// Now let's do all the methods
		
		
		foreach ($methods as $method){
			$h .= $method . ',';
			$start = microtime(true);
			$class->$method();
			$exc = floor((microtime(true) - $start) * 1000);
			sqlite_query($db, "INSERT INTO template_assign ('$method',$n,$exc)" );
		}
		return $h;
	}
}
	
?>