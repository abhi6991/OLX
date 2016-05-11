<?php
   //all database-related functions can be written here
   $db=null;
   
   function get_global_db_pdo() {		//returns PDO database connector object to be used for all database queries
      global $db;
   
      if ($db === null) {		//if $db has not been created before...one connector object exists for entire PHP page 
          
   	//a try-catch block is used for error-handling...error-prone code written in try block and handler code in catch block
   	try {
              $db = new PDO(DB_ENGINE.'host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
   		
   		
   		
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