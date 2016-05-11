<?php
//error_reporting(0);
    require_once('./includes/common.inc.php');
    
    session_start();
    
    
    
    //if(isset($_SESSION['user_id']))
    //die( '<br>already logged in !!! <br>');
    
    
    
    $flag="true";	
    
    
     if(isset($_POST['name'])){   //If form submitted
     	
    	$db=get_global_db_pdo();
    
    	$query1="select * from user_table where name  = ?  ";
    	$stmt = $db->prepare($query1);
    	
    	$stmt->execute(array($_POST['name']));
    	$res1=$stmt->fetch(PDO::FETCH_ASSOC);
    	
    	
    	  //matching name
    	if($res1['name']!=$_POST['name'])
    	{
    		$flag=false;
    	}
    	 
    	else{
    		 
    			$salt=$res1['salt'];  //taking salt
    			
    	
    			$check=hash('sha256',$_POST['passwd'].$salt);
    	
    			for($round=0;$round<65536;$round++)
    			{
    				$check=hash('sha256',$check.$salt);
    
    			}
    
    
    			$query2="select * from user_table where name  = ? and passwd = ? ";
    			
    
    			try{
      
    					$stmt = $db->prepare($query2);
    	
    					$stmt->execute(array($_POST['name'],$check));
    					$res2=$stmt->fetch(PDO::FETCH_ASSOC);
    	
    					if($res2){
    							
    							$_SESSION['user_id']=$res2['user_id'];
    							$_SESSION['user_name']=$_POST['name'];		
    							//login success...set a session var and send cookie to browser			
    							
    							header('location:index1.php');
    					}
    					else
    					{
    						//echo("Incorrect password");
    					    header('location:index.php?token=1');
    					}			
    
    
    			}
    
    			catch(PDOException $ex){
    					die("Failed".$ex->getmessage());
    					header('location:index.html');
    			}
     	
    	
    			
    
    	
    	
    	
    	
    	
    	
    	}//end of inner else
    
    		
     }   //if ends here
     
     
    if($flag==false){
     
     //die("Username or password is incorrect");
      header('location:index.php?token=1');
    }
    
     
    ?>
