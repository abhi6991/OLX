<?php
if(!isset($_SESSION['user_id']))
    session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('location:index.php?token2=1');
	}
	else
	{
include_once('./includes/header.php');

include_once('./includes/home.php');
	}
?>    
    
    
    
    
