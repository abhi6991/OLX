<?php
	error_reporting(0);

    require_once('./includes/common.inc.php');
    //Add notifications to the window
    
	if(!isset($_SESSION['user_id']))
    session_start();
    $db=get_global_db_pdo();
    $usrid=$_SESSION['user_id'];
    //echo $usrid.'<br>';
    $qry="select * from bid_notify where admin_id  = ? ";
    					
    
    					try{
    		  
    							$stmt = $db->prepare($qry);
    			
    							$stmt->execute(array($usrid));
    							$rows=$stmt->fetchAll();
    			
    								
    
    					}
    		
    					catch(PDOException $ex){
    							die("Failed".$ex->getmessage());
    							header('location:index1.html');
    					}							
    
    
    ?>
<!doctype html>
<html>
    <head>
        <!-- Website Title & Description for Search Engine purposes -->
        <title>OLX</title>
        <meta name="description" content="Learn how to code your first responsive website with the new Twitter Bootstrap 3.">
        <!-- Mobile viewport optimized -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		 <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="includes/css/styles.css">
        <!-- Include Modernizr in the head, before any other Javascript -->
        <script src="includes/js/modernizr-2.6.2.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container" id="main">
        <div class="navbar navbar-fixed-top">
            <div class="container">
                
                
                <div class="nav-collapse collapse navbar-responsive-collapse">
				
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./index.php">Home</a></li>
                    </ul>
                    <!--navbar=-->
                    <form class="navbar-form pull-left" action="./search.php" method="POST">
                        <input name="searchText" type="text" class="form-control" placeholder="Search!!!!" id="searchInput">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <!--navbar-form-->
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bell"></span>Notifications</a></li>
                        <li><a href="./add.php"><span class="glyphicon glyphicon-plus"></span>Add a product</a></li>
                        <!--add product-->
                        <li class="dropdown">
						
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>My Account<strong class="caret"></strong></a>

                            <ul class="dropdown-menu">
                                <?php
								$username=$_SESSION['user_name'];
								echo'
								<li><a href="./userprofile.php?'.'name='.$username.'" ><span class="glyphicon glyphicon-refresh"></span>User Profile</a></li>
								';
								?>
								
                                <li><a href="./logout.php"><span class="glyphicon glyphicon-refresh"></span>Signout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--nav collapse-->
            </div>
            <!--container-->
        </div>
        <!--navbar fixed top-->
        <!----------- Modal ---------------->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <!--Form inside modal content-->   
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" style="color:blue;">
                        Notifications</h4>
                    </div>
                    <!--modal-header-->
                    <div class="modal-body">
                        <!--Here the notifications are added-->
                        <?php
						
						
							if($rows==null)
							{
								echo '<strong class="success">No new Notification</strong>';
							}
							
							else
							{
                            foreach ($rows as $row):
								
                            
                            //A query to fetch data from bid_store
                            //product details
                            //and bidder details
                            
                            
                            
                            
                            //First fetch product_id and user_id from bid store
                            
                            $query="select * from bid_store where bid_id  = ? ";
                            
                            
                            try{
                            
                            $stmt = $db->prepare($query);
                            
                            $stmt->execute(array($row['bidid']));
                            $data=$stmt->fetchAll();
                            
                            if($data){
                            	
                            foreach ($data as $datum):	
                            	$bidderid=$datum['user_id'];
                            	$pid=$datum['product_id'];
                            	$bidprice=$datum['bid_price'];
                            	$bid_time=$datum['bid_time'];
                            endforeach;
                            	
                            	//Query 1
                            	$qur1="select name from user_table where
                            	       user_id=? ;";
                            	$stmt=$db->prepare($qur1);
                            	
                            	$stmt->execute(array($bidderid));
                            	$data=$stmt->fetchAll();
                            	
                            	//Extract user name
                            foreach ($data as $datum):	
                            	$name=$datum['name'];
                            	//echo "name=".$name.'<br>';
                            endforeach;	
                            	
                            	//Query 2
                            	$qur2="select pro_name from product_table where
                            	       product_id=?";
                            	$stmt=$db->prepare($qur2);
                            	
                            	$stmt->execute(array($pid));
                            	$data=$stmt->fetchAll();
                            		
                            
                            	//Extract product name
                            foreach ($data as $datum):
                            	$pname=$datum['pro_name'];	
                            	//echo "product name".$pname.'<br>';
                            endforeach;	
                            	
                            	
                            	//Now we may print a notification
                            	echo '
                            	<div>
                            	
                            		<div class="row">
                            		<div class="col-md-offset-8 col-md-2 pull-right">
                            		<a href="./remove.php?'.'id='.$row['bidid'].'" class="btn btn-info btn-lg">
                            		<span class="glyphicon glyphicon-remove"> Remove </span>
                            		</a>	
                            		</div>
                            		</div>
                            		<div class="row">
                            		<div class="col-md-3" style="color:green;">
                            				
                            			<strong>Product Name</strong>
                            		</div>
                            		<div class="col-md-9">'
                            			,$pname,'
                            			<br>
                            		</div>	
                            		</div>
                            		<div class="row">
                            		<div class="col-md-3"  style="color:green;">
                            			<strong>Username</strong>
                            		</div>
                            		<div class="col-md-9">		
                            		
										
									<a href="./userprofile.php?'.'name='.$name.'" >
                            		 ',$name,' 
                            		</a>
                            			<br>
                            		</div>
                            		</div>
                            		<div class="row">
                            			<div class="col-md-3"  style="color:green;">	
                            			<strong>Bid Amount</strong>
                            			</div>
                            			<div class="col-md-9">
                            			
                            			',$bidprice,'
                            			<br>
                            			</div>
                            			</div>
                            	</div>	
                            	';	
                            	
                                                }//if cloed
                                        	
                            
                                        }//try closed
                            
                            catch(PDOException $ex){
                            die("Failed".$ex->getmessage());
                            header('location:index1.html');
                            }	
                            
                            						
                            endforeach;
                            }
                            ?>		
                    </div>
                    <!--Modal body-->
                    <!--
                        <div class="modal-body">
                        	hello world!!!!!!!
                              </div><!--Modal body-->
                    <div class="modal-footer">
                        <button  type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <!----modal footer------->
                </div>
                <!--modal-content-->
            </div>
            <!--modal-dialog-->
        </div>
        <!--modal-fade-->
        <!---</div><!----container--------->
    
