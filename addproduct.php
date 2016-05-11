<?php
	if(!isset($_SESSION['user_id']))
    session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('location:index.php?token2=1');
	}
	else
	{	
   require_once('./includes/common.inc.php');		//single include file common for all PHP pages of your site
   require_once('./class.upload.php'); 
   session_start();
   
   // define variables 
   
   //echo "came here";
   
   $pro_name= $category = $year_used = $present_cond = $asking_price = $description="";
   
   $flag=true;   //Take a flag
   $message="";  //message to be displayed
   
   
   
   //validate the basic inputs
   function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);         //remove slashes
     $data = htmlspecialchars($data);     //remove html tags or symbols
     return $data;							//return refined data
   }
   
   
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   	
     $pro_name = test_input($_POST['pro_name']);
     $category=test_input($_POST['category']);            
     $year_used = test_input($_POST['year_used']);
     $present_cond = test_input($_POST['present_cond']);  
     $asking_price = test_input($_POST['asking_price']);
     $description=test_input($_POST['description']);      
     $image1=$_FILES['image1'];
     $image2=$_FILES['image2'];
     $image3=$_FILES['image3'];
     $image4=$_FILES['image4'];
     $image5=$_FILES['image5'];
   
     
    
   }
   
   //$pid=$product_id
   //Image upload code
   function uploadimg($img,$pro_id,$pname,$usrid,$flg)
   {
   	$foo = new upload($img); 
   	if ($foo->uploaded) {
      
     
   	// save uploaded image with a new name,
   	// resized to 100px wide
   		$newname = $pname.$usrid.$flg;
   
   		$foo->file_new_name_body = $newname;
   		//echo "file name new=".$newname.'<br>';
   		$foo->image_resize = true;
   		$foo->image_convert = 'jpg';
   		$foo->image_x = 555;
   		$foo->image_y = 400;
   		$foo->Process('./home/files/');
   		
   		if ($foo->processed) {
   				//echo 'image renamed, resized x=100
   				//and converted to JPG'.'<br>';
   				//$foo->Clean();
   				
   			//insert image name into database table
   					
   					
   				//$pname_usr_id=$pname.$usrid.$flg;	
   				
   				//echo '<br>'.$pro_id.'<br>';
   				$qry_ins3="insert into image (pid,image_name,user_id3) values(?,?,?)";
   		
   				$db=get_global_db_pdo();	       //get PDO connector object
   
   				$stmt=$db->prepare($qry_ins3);   //prepare query	
   	 
   				
   	  
   				$num=$stmt->execute(array($pro_id,$newname,$usrid));
   				
   		} 
   		else {
   			echo 'error : ' . $foo->error;
   		} 
   	}  
   
   }
   
   
   //If input method is post
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
     if (empty($_POST['pro_name'])) {
       $message = "Product name is required";
   	$flag=false;
   	
   	
     }  
     
   	
   	if (empty($_POST['category'])) {
       $message = "Select Category ";
   	$flag=false;
   	
   	
      }  
     
     
     if (empty($_POST['year_used'])) {
       $message = "Year used field is required";
   	$flag=false;
   
     } 
   
     
   
     
      if (empty($_POST['present_cond'])) {
       $message="Present condition field required";
   	$flag=false;
   
     } 
     
     
     
   
     if (empty($_POST['asking_price'])) {
       $message = "Please add the minimum amount you wanna sell your product for";
   	$flag=false;
   
     } 
     
      if (empty($_POST['description'])) {
       $message = "Please add description of the product";
   	$flag=false;
   
     } 
     
    
    
     
     
     
     
   
   	  
   }
   
   
   
   //If input has correct format
   
   if($flag)
   {
   	
   	if(isset($_POST['pro_name'])){		//check if a form has been submitted
   	  
   		
   	  
   	 
   	  
   		$db=get_global_db_pdo();	       //get PDO connector object
   
   		//create a structure for the insert into student query to be used henceforth
   	  
   		$qry_ins2="insert into product_table (category,user_id2,pro_name,year_used,present_cond,asking_price,description) values(?,?,?,?,?,?,?)";	//? is like an anonymous-label
   	
   	
   	  
   	  
   
   	  
   	 try{
   		  
   		     //As the user is logged in we can take take user_id from session var 
   			 
   			  $userid=$_SESSION['user_id'];			 
   		      //$userid=57;  //userid of shukla
   			  
   			  
   			  
                 
                 //a request to get product_id
   				$qry="select * from product_table order by time_add desc limit 1";	//? is like an anonymous-label
   	
   	
   			
   				$stmt=$db->prepare($qry);   //prepare query	
   	
   				$stmt->execute();
                   $rows=$stmt ->fetchAll();
                   foreach ($rows as $row):
                    $pid=$row['product_id'];
                   endforeach;
   				//echo $userid,$pro_name.'<br>';
   			
               
   				//echo "pid=".$pid.'<br>';echo $pid;
                   
   			$pid=$pid+1;
   			
               
               
                 
                 
   			  
   			  
   			  //query to add product in the product table
   			  
   			$stmt=$db->prepare($qry_ins2);   //prepare query	
   	 
   	  
   	  
   			$num=$stmt->execute(array($category,$userid,$pro_name,$year_used,$present_cond,$asking_price,$description));
   	
   			
   
   	
   		if($num){
   	  
   				//echo "successfully added";
   		 
   				header('location:index1.php');
   				
   			
   			
   				
   			
   			
   			
   		}
   	
   	}//outer try 	
   		
   	catch(PDOException $ex){
   		die("Failed".$ex->getmessage());
   		header('location:index1.html');
   	}
   		
   		
   		
   			//upload images
   			
   				//image 1
   				uploadimg($image1,$pid,$pro_name,$userid,1);
   				
   				//image 2
   				uploadimg($image2,$pid,$pro_name,$userid,2);
   				
   				//image3
   				uploadimg($image3,$pid,$pro_name,$userid,3);
   				
   				//image4
   				uploadimg($image4,$pid,$pro_name,$userid,4);
   				
   				//image5
   				uploadimg($image5,$pid,$pro_name,$userid,5);
   		  
   		  
   		    //Query to add other product info in product_table 
   			
   	  
   		
   	  
   	 
   	  
   	  
   	
   	
   	}
   }
   
   
   else
   {
   	//die("Failed".$message);
   	header('location:index1.php');
   	
   }	
   
   
   
   
   	
   	
   
	}
   ?>