PHP Template Engine Comparison
------------------------------
speed matter ... sometimes ...

This benchmark test the speed of few popular template engine, you can fork the project and contribute by adding your favorite template engine.



How works the benchmark?
-----------------------

1.) Add your database login details to the "library/conf.db.php" file (make sure the user has permission to create tables).

2.) Run the "test.php" file. Once it's completed, the results will be saved as CSV files in the "csv" folder.

3.) To draw the results you need the Charts class, which is not released open source with this package.

4.) To add more engines to the test, upload the engine to the "template_engines" folder and re-create the "assign" and "loop" tests.
    Check out the 'php' engine for a simple example of what is required. Then add your engine to the "library/config.php" file.