<?php
	session_start();
	session_destroy();	//unsets session cookie for this user's session from server databses
	
	header('location:index.php');	//redirect
?>