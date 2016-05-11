<?php
    //all database-related functions can be written here
    $db=null;
    
    //define variables
    
    
    const DB_ENGINE = 'mysql';		//PDO database Engine
    const DB_HOST = 'localhost';    // database host name
    const DB_PORT = 3306;			// port on which mysql is current running on server
    const DB_NAME = 'mypdodb';			// database name and can be changed accordingly
    const DB_USER = 'root';			// username for database connection 
    const DB_PASSWORD = '';	// password for database connection for the above user
    
    
    
    
    
    
    function get_global_db_pdo() {		//returns PDO database connector object to be used for all database queries
       global $db;
    
       if ($db === null) {		//if $db has not been created before...one connector object exists for entire PHP page 
           
    	//a try-catch block is used for error-handling...error-prone code written in try block and handler code in catch block
    	try {
               $db = new PDO(DB_ENGINE.'::host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
    		
    		/*new PDO('mysql::host=localhost;port=3306;dbname=stu;charset=utf8', 'root', 'abc1234');
    		refer to http://phpro.org/tutorials/Introduction-to-PHP-PDO.html for details on connecting to other database types
    		*/
               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	//configure PDO connector to show errors in form of Exception objects which can be caught through catch block
    		
           } catch (Exception $e) {
               disp_error('Caught exception connecting to database');
               throw $e;
           }
       }
    
       return $db;
    }
    
    function  disp_error($str){
    echo "<br/><span style='color:red'>$str</span><br/>";
    }
    
    
    
    
    ?>