<?php
if(isset($_POST['searchText']))
{
	//echo $_POST['searchText'];

	$var=strtolower($_POST['searchText']);
	
	
	header('location:category.php?cat='.$var);
	
}


?>
	