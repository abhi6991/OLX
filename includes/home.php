<?php
	//initialize values
	
	$p="cat=";
	$cat1="sports";
	$cat2="bicycle";
	$cat3="books";
	$cat4="bag";
	$cat5="mobile";
	$cat6="tv";
	$cat7="laptop";
	$cat8="cooler";
	
?>	
	



<br><br><br><br>
  
    <!------------carousel--------------->
    <div class="carousel slide" id="myCarousel">
    
    <!--Indicators-->
    <ol class="carousel-indicators">
   		<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
        <li data-slide-to="1" data-target="#myCarousel"></li>
        <li data-slide-to="2" data-target="#myCarousel"></li>   
    </ol>
    
    	<div class="carousel-inner" role="listbox">
        	<div class="item active" id="slide1">
            	
			<img src="./images/crousal1.jpg" alt="Image3">

            </div><!--item1-->
            
            <div class="item" id="slide2">
            	
			<img src="./images/crousal2.jpg" alt="Image3">

            </div><!--item2-->
            
            <div class="item" id="slide3">
            	
				<img src="./images/crousal3.jpg" alt="Image3">
            </div><!--item3-->
        
        </div><!--carousel-inner-->
        
        <!--carousel controls-->
        <a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a> 
        <a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a> 
    
    </div><!--carousel slide-->
    
    
    <!-----callout------------>
    <div class="row" id="bigCallout">
    	<div class="col-12">
        	<div class="well">
            	<div class="page-header">
                	<center><h4>Categories</h4></center>
                </div><!--header-->
                
            </div><!--well-->
        </div><!--col-12-->
    
    </div><!--row bigcallout-->
    
    <!----------------------categories------------------------->
    <br><br>
    
    
    <div class="row" id="features">
    	<div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 1</h3>
                </div><!--panel-heading-->
                <img src="images/sports.jpg" alt="category 1 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat1.'" class="btn btn-warning btn-block">Sports</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(1)-->
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 2</h3>
                </div><!--panel-heading-->
                <img src="images/cycle.jpg" alt="category 2 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat2.'" class="btn btn-warning btn-block">Bicycle</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(2)-->
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 3</h3>
                </div><!--panel-heading-->
                <img src="images/books.jpg" alt="category 3 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat3.'" class="btn btn-warning btn-block">Books</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(3)-->
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 4</h3>
                </div><!--panel-heading-->
                <img src="images/bag.jpg" alt="category 3 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat4.'" class="btn btn-warning btn-block">Bag</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(4)-->
    </div><!-- row features-->
    
	
	<br><br><br>
    <div class="row" id="features">
    	<div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 5</h3>
                </div><!--panel-heading-->
                <img src="images/mobile.jpg" alt="category 1 products" class="img-circle">
        <?php echo '<a href="./category.php?' .$p.$cat5.'" class="btn btn-warning btn-block">Mobile</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(1)-->
		
		
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 6</h3>
                </div><!--panel-heading-->
                <img src="images/tv.jpg" alt="category 2 products" class="img-circle">
                <?php echo'<a  href="./category.php? '.$p.$cat6.' "  class="btn btn-warning btn-block">TV</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(2)-->
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 7</h3>
                </div><!--panel-heading-->
                <img src="images/laptop.jpg" alt="category 3 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat7.'" class="btn btn-warning btn-block">Laptop</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(3)-->
		
		
        <div class="col-sm-3 feature">
        	<div class="panel">
            	<div class="panel-heading">
                	<h3 class="panel-title">Category 8</h3>
                </div><!--panel-heading-->
                <img src="images/cooler.jpg" alt="category 3 products" class="img-circle">
                <?php echo '<a href="./category.php?' .$p.$cat8.'" class="btn btn-warning btn-block">Cooler</a>'; ?>
            </div><!--panel-->
    	</div><!--feature col 3(4)-->
    </div><!-- row features-->
    
    
    <!-----------------------categories Ends Here----------------------->
    
 
    <br><br><br>
    <!-----------------Thumbnails----------------->
   
    	<div class="col-12">
        	<h3>Trending Products</h3>
			<br><br>
            <div class="thumbnails row">
            	<div class="col-6">
                	<div class="thumbnail">
                    	<img src="images/image1.jpg" alt="Trending Product 1">
                        <!--price tag-->
                        <div class="label label-success price"><span class="glyphicon glyphicon-tag"> <sup>&#8377;</sup>6000</span></div>
                        <div class="caption">
                        	<h3>Cooler</h3>
                            
                            <p><a href="./index3.php?pid=69" class="btn btn-primary btn-small" target="_blank">Buy Now</a> <a href="https://google.com/" class="btn btn-small btn-link" target="_blank">Similar Products</a></p>
                    	</div><!--end caption-->      
                    </div><!--thumbnail-->
                </div><!--end col-6(1)-->
                <div class="col-6">
                	<div class="thumbnail">
                    	<img src="images/image2.jpg" alt="Trending Product 2">
                        <!--price tag-->
                        <div class="label label-info price"><span class="glyphicon glyphicon-tag"> <sup>&#8377;</sup>5000</span></div>
                        <div class="caption">
                        	<h3>Cycle</h3>
                            
                            <p><a href="./index3.php?pid=70" class="btn btn-primary btn-small" target="_blank">Buy Now</a> <a href="https://google.com/" class="btn btn-small btn-link" target="_blank">Similar Products</a></p>
                        </div><!--end caption-->
                    </div><!--thumbnail-->
                </div><!--end col-6(2)-->
            </div><!--row-->
    	</div><!--col 12-->
      
	</div><!-- end container -->
    <!--footer section-->
	<br><br>
   <?php include_once('./includes/footer.php'); ?>
   
   
 <!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<!--<script src="includes/js/jquery.js"></script>-->
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
    
</div>
</body>
</html>
