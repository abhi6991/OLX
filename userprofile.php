<?php
if(!isset($_SESSION['user_id']))
    session_start();
	if(!isset($_SESSION['user_id']))
	{
		header('location:index.php?token2=1');
	}
	else
	{
   require_once('./includes/common.inc.php');	
   include_once('./includes/header.php');
    
    $username=$_GET['name'];
	//echo "name".$username;
    $db=get_global_db_pdo();
    $query="select * from user_table where name='$username'";
    $stmt = $db->prepare($query);
   			$stmt->execute();
   			$userinfo = $stmt->fetchAll();
    ?>
       
   <br><br><br><br>
   
   
   <!-----callout------------>
            <div class="row" id="bigCallout">
               <div class="col-12">
                  <div class="well">
                     <div class="page-header">
                        <center>
                           <h1>Buyer Profile</h1>
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
<div style="font-size:24px">
   <div class ="row" >
     <div class="col-sm-3"></div>
       <div class="col-sm-9">
           <div class="row">
   <div class="col-sm-3"><label for="Name" ><p style="color:green">Buyer Name </label></div>
   <div class ="col-sm-2"></div>
            <div class="col-sm-4 pull-left " >
              <?php echo $userinfo[0]['name'] ;?>
            </div>
         </div>
         </div>
         </div>
         <div class ="row">
     <div class="col-sm-3"></div>
       <div class="col-sm-9">
           <div class="row">
   <div class="col-sm-3"><label for="Name" ><p style="color:green">Buyer Contact </label></div>
           <div class ="col-sm-2"></div>
            <div class="col-sm-4 pull-left " >
                 <?php echo $userinfo[0]['phone_no'] ;?>
            </div>
         </div>
         </div>
         </div>
       <div class ="row">
     <div class="col-sm-3"></div>
       <div class="col-sm-9">
           <div class="row">
   <div class="col-sm-3"><label for="Name" ><p style="color:green">Buyer Address </label></div>
           <div class ="col-sm-2"></div>
            <div class="col-sm-4 pull-left " >
                 <?php echo $userinfo[0]['hostel'] ;?>
            </div>
         </div>
         </div>
         </div>
      <br><br><BR>
         <div class="row">
             <div class="col-sm-10"></div>
			 
             <div class ="col-sm-2">
          <a href="index1.php">
          <button type="submit" class="btn btn-primary ">
           <h5>Back to home</h5>
         </button>
        </a></div></div><br></div></body><br>        </div>
	<?php  include_once('./includes/footer.php'); }?>