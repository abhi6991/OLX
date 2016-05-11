<?php
    require_once('./includes/common.inc.php');		//single include file common for all PHP pages of your site 
    
    
    // define variables 
    
    //echo "came here";
    
    $name= $hostel = $phone_no = $passwd = $email="";
    
    $flag=true;   //Take a flag
    $message="";  //message to be displayed
    $mes="";
    
    
    //validate the basic inputs
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);          //remove slashes
      $data = htmlspecialchars($data);      //remove html tags or symbols
      return $data;							//return refined data
    }
    
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	
      //$room_no = test_input($_POST['room_no']);
      $name = test_input($_POST['name']);
      $hostel = test_input($_POST['hostel']);
      $phone_no = test_input($_POST['phone_no']);
      $passwd = test_input($_POST['passwd']);
      $email = test_input($_POST['email']);
    	
     
    }
    
    
    
    
    
    
    
    //If input method is post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      if (empty($_POST['name'])) {
        $message = "Name is required";
    	$mes=1;
    	$flag=false;
    	
    	
      } else {
           $name = test_input($_POST['name']);
    
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $message = "Only letters and white space allowed";
    		$mes=2;
    		$flag=false;
    
        }
      }
    
      
      if (empty($_POST['email'])) {
        $message = "Email is required";
    	$mes=3;
    	$flag=false;
    
      } else {
        $email = test_input($_POST['email']);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $message = "Invalid email format"; 
    	  $mes=4;
    	  $flag=false;
    	  	
    
        }
      }
    
      
    
      
       if (empty($_POST['hostel'])) {
        $message="Hostel name required";
    	$mes=5;
    	$flag=false;
    
      } 
      
      
      
    
      if (empty($_POST['phone_no'])) {
        $message = "Phone no is required";
    	$mes=6;
    	$flag=false;
    
      } 
      
      
      
      if(empty($_POST['passwd'])){
    	  $message="Password must be entered";
    		$mes=7;
    		$flag=false;	
      }
      
      
       if(empty($_POST['passwdcnf'])){
    	  $message="Password must be entered";
    		$mes=8;
    		$flag=false;
      }
      
      //check for equality of passwords
      if($_POST['passwd']!=$_POST['passwdcnf']){
    	  $message="Password Mismatch";
    	  $mes=9;
    	  $flag=false;
    	  
      }
    
    	  
    }
    
    
    
    //If input has correct format
    
    if($flag)
    {
    	
    	if(isset($_POST['name'])){		//check if a form has been submitted
    	  
    		$db=get_global_db_pdo();	       //get PDO connector object
    	  
    	  
    	  
    
    	  
    		//password encryption
    	  
    		$salt=dechex(mt_rand(0,21474883647)).dechex(mt_rand(0,21474883647)); //make salt
    		$pass=hash('sha256',$_POST['passwd'].$salt);                   //hash 
    		
    			for($round=0;$round<65536;$round++)
    			{
    				$pass=hash('sha256',$pass.$salt);       //repeted hash
    	
    			}
    
    	  
    	  
    		//create a structure for the insert into student query to be used henceforth
    	  
    		$qry_ins1="insert into user_table (name,passwd,hostel,phone_no,email,salt) values(?,?,?,?,?,?)";	//? is like an anonymous-label
    	
    	
    	  
    	  
    
    	  
    		try{
    		  
    			$stmt=$db->prepare($qry_ins1);   //prepare query	
    	 
    	  
    	  
    			$num=$stmt->execute(array($name,$pass,$hostel,$phone_no,$email,$salt));
    			
    			if($num){
    	  
    				//echo "success";
    		 
    				header('location:index1.php');
    			}	
    	
    	
    		}
    		
    		catch(PDOException $ex){
    			die("Failed".$ex->getmessage());
    			header('location:index.php');
    		}
    	  
    		
    	  
    	 
    	  
    	  
    	
    	
    	}
    }
    
    
    
    else
    {
    	//die("Failed".$message);
    	//$message="12";
    	header('location:index.php?tokken='.$mes);
    	
    }	
    
    
    
    
    	
    	
    
    
    ?>