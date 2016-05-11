<!doctype html>
<html>
    <head>
        <!-- Website Title & Description for Search Engine purposes -->
        <title>Home</title>
        <meta name="description" content="Learn how to code your first responsive website with the new Twitter Bootstrap 3.">
        <!-- Mobile viewport optimized -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		<link href="bootstrap/css/style.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="includes/css/styles.css">
        <!-- Include Modernizr in the head, before any other Javascript -->
        <script src="includes/js/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>
        <!-----------------nav bar----------------------->
        <div class="container" id="main">
        <div class="navbar navbar-fixed-top">
            <div class="container">
                <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                
                <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home </a></li>
                        <li>&nbsp;&nbsp;&nbsp;</li>
                    </ul>
					
                    <!--nav navbar-nav-->
                    <form class="navbar-form pull-left" action="./search.php" method="POST">
					
                        <input name="searchText" type="text" class="form-control" placeholder="Search!!!!" id="searchInput">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <!--navbar-form-->
                    <ul class="nav navbar-nav pull-right">
                        <!--Login Form-->
                        <form class="navbar-form pull-left" method="POST" action="./login.php">
                            <input type="text" name="name" class="form-control" placeholder="username" id="searchInput">
                            <input type="password" name="passwd" class="form-control" placeholder="password" id="searchInput">
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                        <!--login of navbar pull right-->
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit">
                            </span>Sign up</a>
                        </li>
                        <!--sign up toggle-->
                    </ul>
                    <!--navbar pull right login-->
                </div>
                <!--nav collapse-->
            </div>
            <!--container-->
        </div>
        <!--navbar-->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <!--Form inside modal content-->   
                    <div class="modal-header" >
                        <h4>Register Here</h4>
                    </div>
                    <!--modal-header-->
                    <div class="modal-body">
                        <form class="form" action="validate.php" method="POST">
                            <div class="row">
                                <div class="col-sm-4"><label for="Name" class="sr-only">User Name</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="text" name="name" placeholder="Username" class="form-control" required autofocus>
                                </div>
                                <div class="col-sm-4"><label for="Name" class="sr-only">Email Id</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="text" name="email" placeholder="email-id" class="form-control" required autofocus>
                                </div>
                                <div class="col-sm-4"><label for="Name" class="sr-only">Hostel</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="text" name="hostel" placeholder="Hostel" class="form-control" required autofocus> 
                                </div>
                                <div class="col-sm-4"><label for="Name" class="sr-only">Contact</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="number" name="phone_no" placeholder="Contact Number" class="form-control" required autofocus>
                                </div>
                                <div class="col-sm-4"><label for="Name" class="sr-only">Password</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="password" name="passwd" placeholder="Password" class="form-control" required autofocus>
                                </div>
                                <div class="col-sm-4"><label for="Name" class="sr-only">Conform Password</label></div>
                                <div class="col-sm-8 pull-left">
                                    <input type="password" name="passwdcnf" placeholder="Conform Password" class="form-control" required autofocus>
                                </div>
                            </div>
                            <!--row-->
                            <br>
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