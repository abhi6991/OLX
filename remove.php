<?php

 require_once('./includes/common.inc.php');
    //Add notifications to the window
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$db=get_global_db_pdo();
   
		$qry="delete from bid_notify where bidid  = $id ";
    					
    
    					try{
    		  
    							$stmt = $db->prepare($qry);
    			
    							$stmt->execute();
    							
    
    					}
    		
    					catch(PDOException $ex){
    							die("Failed".$ex->getmessage());
    							header('location:index1.html');
    					}
		
		
		
	}
	
	
	header('location:index1.php');
?>	