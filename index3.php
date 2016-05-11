<?php
error_reporting(0);
if(!isset($_SESSION['user_id']))
    session_start();

	if(!isset($_SESSION['user_id']))
	{
		header('location:index.php?token2=1');
	}
	else
	{
   require_once('./includes/common.inc.php');		//single include file common for all PHP pages of your site 
   
   
   
   include_once('./includes/header.php'); //header
   //Define variables
   $name='name';
   $pro_name='pro_name';
   $category='category';
   $present_cond='present_cond';
   $year_used='year_used';
   $asking_price='asking_price';
   $description='description';
   $path="home/files/";
   $imgname='image_name';
   
   
   
   			//get all data with the product id 
   			$db=get_global_db_pdo();
   			$product_id=$_GET['pid'];   //product_id 
   
   			
   			
   			$query="select * from product_table,user_table,image where product_id =$product_id and pid=$product_id and user_id2=user_id and user_id=user_id3 ;";
   			
   			$stmt = $db->prepare($query);
   			$stmt->execute();
   			$product = $stmt->fetchAll();
   			
   			$user_id=$product[0]['user_id2'];
   			
   		
   
  
   if(isset($_POST['bidprice']))
   {
   	
   	
   	$qry_ins="insert into bid_store (product_id,user_id,bid_price) values(?,?,?)";	//? is like an anonymous-label
   	$que_insert="insert into bid_notify(admin_id,bidid) values(?,?)";
   	
   	  
   	  
   
   	  
   		try{
   		  
   			$stmt=$db->prepare($qry_ins);   //prepare query	
   	 
   	  
   	  
   			$num=$stmt->execute(array($product_id,$_SESSION['user_id'],$_POST['bidprice']));
	



			  //a request to get bid_id
   				$qry="select * from bid_store order by bid_time desc limit 1";	//? is like an anonymous-label
   	
   	
   			
   				$stmt=$db->prepare($qry);   //prepare query	
   	
   				$stmt->execute();
				
                   $rows=$stmt ->fetchAll();
                   foreach ($rows as $row):
                    $bid_id=$row['bid_id'];
                   endforeach;
   				
				
			
			$stml=$db->prepare($que_insert);	
   			$num=$stml->execute(array($user_id,$bid_id));
			
			
   	
   		}
   		
   		catch(PDOException $ex){
   			echo '<script> alert("Bid could not be added"); </script>';
   			
   		}
   	
   }
   
   
   ?>
<br><br><br>
<div class="container" >
   <div class="row">
      <div class="col-sm-6">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
               <li data-target="#myCarousel" data-slide-to="3"></li>
               <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <img src="<?php echo $path.$product[0][$imgname].'.jpg' ; ?>" alt="Image1">
               </div>
               <div class="item">
                  <img src="<?php echo $path.$product[1][$imgname].'.jpg' ; ?>" alt="Image2">
               </div>
               <div class="item">
                  <img src="<?php echo $path.$product[2][$imgname].'.jpg' ; ?>" alt="Image3">
               </div>
               <div class="item">
                  <img src="<?php echo $path.$product[3][$imgname].'.jpg' ; ?>" alt="Image4">
               </div>
               <div class="item">
                  <img src="<?php echo $path.$product[4][$imgname].'.jpg' ; ?>" alt="Image5">
               </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            
            </a>
         </div>
      </div>
      <!--col 6-->
      <div class="col-sm-offset-1 col-sm-5">
         <br><br><br><br><br><br>
         <div class ="row">
            <div class="col-sm-4"><label for="Name" >Seller Name</label></div>
            <div class="col-sm-8 pull-left " >
               <?php echo $product[0]['name']; ?>   
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name" >Product Name</label></div>
            <div class="col-sm-8 pull-left">
               <?php echo $product[0][$pro_name]; ?> 
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name"  >Category</label></div>
            <div class="col-sm-8 pull-left">
               <?php echo $product[0][$category]; ?> 
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name" >Present Condition</label></div>
            <div class="col-sm-8 pull-left">
               <?php echo $product[0][$present_cond]; ?> 
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name" >Year Used</label></div>
            <div class="col-sm-8 pull-left">
               <?php echo $product[0][$year_used]; ?> 
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name" >Asking Price</label></div>
            <div class="col-sm-8 pull-left">
               <p>	&#8377; <?php echo $product[0][$asking_price]; ?>  </p>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-sm-4"><label for="Name" >Description</label></div>
            <div class="col-sm-8 pull-left"> <?php echo $product[0][$description]; ?>  </p>		  </div>
            <br>
         </div>
         <br><br>
         <div class="row">
            <div>
               <a href="#" data-toggle="modal" data-target="#continueToBuy">
                  <span ></span> 
                  <button type="submit" class="btn btn-success col-sm-offset-3 col-sm-6 btn-lg col-sm-offset-3">
                     <h5>Continue to Buy</h5>
                  </button>
               </a>
               <!--row-->
            </div>
         </div>
      </div>
      <br>
   </div>
   
   <br><br>
   <div class="modal fade" id="continueToBuy" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <!--Form inside modal content-->   
            <div class="modal-header" >
               <h4 style="color:green;">Register Here</h4>
            </div>
            <!--modal-header-->
            <div class="modal-body">
               <form class="form" action="#" method="POST">
                  <h3 style="color:blue;" >CONTACT INFORMATION OF SELLER </h3>
                  <br><br>
                  <div class="row">
                     <div class="col-sm-4"><label for="Name" >Seller Name</label></div>
                     <div class="col-sm-8 pull-left " >
                        <?php echo $product[0]['name']; ?>   
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-4"><label for="Name" >Seller Adress</label></div>
                     <div class="col-sm-8 pull-left " >
                        <?php echo $product[0]['hostel']; ?>   
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-4"><label for="Name" >Seller Contact</label></div>
                     <div class="col-sm-8 pull-left " >
                        <?php echo $product[0]['phone_no']; ?>   
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-sm-4"><label for="Name" >Enter Your Bid</label></div>
                     <div class="col-sm-8 pull-left">
                        <input type="text" name="bidprice" placeholder="Enter your bid value in INR &#8377; " class="form-control" required autofocus>
                     </div>
                  </div>
                  <br><br>
                  <button  type="submit"  class="btn btn-success col-sm-12" ">Submit</button>
               </form>
               <br>
            </div>
            <!--Modal body-->
            <div class="modal-footer">
               <button  type="button"  class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
         </div>
         <!--modal-content-->
      </div>
      <!--modal-dialog-->
   </div>
   <!--modal-fade-->

<!--modal-content-->
<!--modal-dialog-->

<!--<div class="modal-footer">
   <a href="index1.php">
      <button type="submit" class="btn btn-primary ">
         <h5>Back to home</h5>
      </button>
   </a>
</div>-->

</div>
</div>

<!--Footer-->
	<?php include_once('./includes/footer.php');} ?>
<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
<!-- Bootstrap JS -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="includes/js/script.js"></script>
	
</body>
