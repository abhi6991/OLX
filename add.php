<?php include_once('./includes/header.php'); ?>
            <!----------form starts here--------------->
            <br><br><br><br>
            <h1>Product Details</h1>
            <hr>
            <br>
            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Category : </label></div>
                        <div class="col-sm-6 pull-left">
                            <!-----Dropdown For Category-------->
                            <select class="form-control" name="category">
                                <option value="sports">Sports</option>
                                <option value="bicycle">Bicycle</option>
                                <option value="books">Books</option>
                                <option value="bag">Bag</option>
                                <option value="mobile">Mobile</option>
                                <option value="tv">TV</option>
                                <option value="laptop">Laptop</option>
                                <option value="cooler">Cooler</option>
                            </select>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name">Product Name : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="text" name="pro_name" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Present Condition : </label></div>
                        <div class="col-sm-6 pull-left" >
                            <select class="form-control" name="present_cond">
                                <option >Excellent</option>
                                <option >Good</option>
                                <option >Average</option>
                                <option >Poor</option>
                            </select>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Year Used : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="text" name="year_used" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name">Asking Price : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="text" name="asking_price" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Image 1 : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="file" name="image1" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Image 2 : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="file" name="image2" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Image 3 : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="file" name="image3" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Image 4 : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="file" name="image4" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name" >Image 5 : </label></div>
                        <div class="col-sm-6 pull-left">
                            <input type="file" name="image5" class="form-control" required autofocus>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2"><label for="Name">Description : </label></div>
                        <div class="col-sm-6 pull-left">
                            <textarea name="description" rows="4" class="form-control" placeholder="More about Products!!!!!" required autofocus></textarea>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <button type="submit" class="btn btn-success col-lg-6">
                            <h4>Add</h4>
                        </button>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
        </div>
        <!--------row---------->
        </div><!-----container--------->
        </form><!---------------form ends here-------------------->
        <br><br><br><br>
		
<?php include_once('./includes/footer.php'); ?>