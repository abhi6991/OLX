<?php
   include_once('./includes/headerhome.php');
   include_once('./includes/home.php');
   if(isset($_GET['token'])){
   	if($_GET['token']==1)
   		echo '<script> alert("Username or Password is incorrect"); </script>';
   	
   	
   	
   	
   }
   else if(isset($_GET['tokken']))
   {
   	$mes=$_GET['tokken'];
   	$message="";
      if($mes==1)
           echo '<script> alert("Name is required"); </script> ';
   	else if($mes==2)
   				 echo '<script> alert("Only letters and white space allowed"); </script> ';
   	else if($mes==3)
   				echo '<script> alert("Email is required"); </script> ';
   	else if($mes==4)
           echo '<script> alert("Invalid email format"); </script> ';
   	else if($mes==5)
           echo '<script> alert("Hostel name required"); </script> ';
   	else if($mes==6)
           echo '<script> alert("Phone no is required"); </script> ';
   	else if($mes==7)
           echo '<script> alert("Password must be entered"); </script> ';
   	else if($mes==8)
           echo '<script> alert("Password must be entered"); </script> ';
   	else if($mes==9)
           echo '<script> alert("Password Mismatch"); </script> ';
   
   }

	else if(isset($_GET['token2']))
	{
		if($_GET['token2']==1)
		{
			echo '<script> alert("Please login first!!!"); </script>';
		}
	}
   
   ?>