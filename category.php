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
   
   
   
   include_once('./includes/header.php'); //header
   //Define variables
   $path="home/files/";
   $pro_name='pro_name';
   $asking_price='asking_price';
   $imgname='image_name';
   $product_id='product_id';
   $ext=".jpg";
   $p="pid=";
   $category=$_GET['cat'];
   $category2=strtoupper($category);
   			//get all data with the product id 
   			$db=get_global_db_pdo();
   			 
   			//echo "category=".$category;
   			$query="select *  from product_table,image where category like
			'%$category%' and product_id=pid group by pid ;";
   			
   			$stmt = $db->prepare($query);
   			$stmt->execute();
   			$product = $stmt->fetchAll();
				if($product==null)
				{
					echo '<script> alert("No result Found for your search"); </script>';
					//header('location:index1.php');
				}
				else
				{
   			
   		
   
   
   
   
     
     ?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Untitled Document</title>
   </head>
   <body>
      <br><br><br>
      <div class="contaner">
         <div class="col-12">
            <!-----callout------------>
            <div class="row" id="bigCallout">
               <div class="col-12">
                  <div class="well">
                     <div class="page-header">
                        <center>
                           <h1><?php echo $product[0]['category'];  ?></h1>
                        </center>
                     </div>
                     <!--header-->
                  </div>
                  <!--well-->
               </div>
               <!--col-12-->
            </div>
            <!--row bigcallout-->
            <br><br>
            <?php
               foreach ($product as $pro) :
               
                        echo  '	<div class="col-3">
                            	<div class="thumbnail">
                                	      <img src=" '.$path.$pro[$imgname].$ext.' 
               				  " alt="Image2">
                                    <!--price tag-->
                                    <div class="label label-success price"><span class="glyphicon glyphicon-tag"> <sup>&#8377; ' .$pro['asking_price'].' </sup></span></div>
                                    <div class="caption">
               			<br><br>
                                    	<h3> ' .$pro['pro_name'].' </h3>
                                        <br><br>
                                        <p><a href="./index3.php?' .$p.$pro['product_id'].'" class="btn btn-primary btn-small" target="_blank">Buy Now</a> <a href="https://google.com/" class="btn btn-small btn-link" target="_blank">Similar Products</a></p>
                                	</div><!--end caption-->      
                                </div><!--thumbnail-->
                            </div><!--end col-3(1)--> ';
                            
                            
                        endforeach;    
                        ?>    
         </div>
         <!--row-->
      </div>
      <!--col 12-->
      </div><!-----end container------>
      <br><br><br>
   </body>
</html>
<?php 
   include_once('./includes/footer.php');
   
   
	}
	}
	
?>	