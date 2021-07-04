<?php 
require "core/common/conn.php";
session_start();



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  


  <title>CashMyStash</title>
  <link rel="stylesheet" href="assets/css/productlist.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- owl carousel -->
  <link rel="stylesheet" href="./assets/js/owl.carousel.min.css">
  <link rel="stylesheet" href="./assets/js/owl.theme.default.css">
  <link rel="stylesheet" href=".assets/js/owl.carousels.css">
  <link rel="icon" href="./img/favicon.png" type="image/gif" sizes="16x16">

  <link rel="stylesheet" type="text/css" href="assets/css/bit-style.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />
  <!-- heart -->
  <link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body>
  <div id="nav-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important;">

      <a class="navbar-brand" href="index.html"> <img src="./img/Nlogo.png" alt="" class="img-fluid"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="mr-auto" id="navbar-menu-ls">

          <ul class="navbar-nav" style="margin-left: 79px">

            <input type="text" class="form-control" id="navsearch" placeholder="Search here">

            <button class="btn btn-primary" style="margin-left: 3px;"> Search </button>

          </ul>
        </div>


        <div id="navbar-menu-rs" style="float: left;">
          <ul class="nav navbar-nav action-links">
            <li class="nav-item ">
              <a class="nav-link" href="#"><i class="fas fa-comments" style="color: #44546a;"></i> <span>Chat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-user" style="color: #44546a;"></i> <span>My Account</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#"> <span> <i class="fas fa-bell" style="color: #44546a;"></i> </span></a>
            </li>
          </ul>
        </div>



      </div>
    </nav>
    <br>
  </div>

  <!---end of nav-->


  <div class="container">

    <div class="row section-nav">

      <div class="col snav snav-buysell text-center">
        <a href="buy_sell.html"><i class="fas fa-shopping-basket"></i> <span>Buy Now</span></a>
        <!--				<span class="snav-bottom-line"></span>-->
      </div>
      <div class="col snav snav-auction text-center">
        <a href="auction.html" id="topbar"><i class="fas fa-file-signature"></i> <span>Auction</span></a>
      </div>
      <div class="col snav snav-exchange  text-center">
        <a href="exchange.html"><i class="fas fa-sync"></i> <span>Exchange</span></a>
      </div>


      <div class="col snav-camera text-center">
        <a href="post_category.html"><i class="fas fa-camera fa-3x"> </i> </a>
      </div>
      <div class="col snav snav-exchange text-center">

        <a href="rent.html"> <i class="fas fa-dollar-sign"></i> <span>Rent</span></a>
      </div>
      <div class="col snav snav-donation text-center">
        <a href="donation.html"><i class="fas fa-hand-holding-usd"></i> <span>Donation</span></a>
      </div>
      <div class="col snav snav-giveway text-center">
        <a href="giveaway.html"><i class="fas fa-gift"></i> <span>Giveaway</span></a>
      </div>
    </div>


  </div>

  <div class="section-divider"></div>






  <div class="container" style="background-color:white; border-top:0px solid #44546A;">

    <div class="content-base-margin">





      <!-- Sidebar navigation -->

      <div class="container" style="background-color:white;">
        <div class="row">
          <div class="col-lg-3" style=" border-right: solid 1px lightgrey; ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <div class="col">
                      <!-- Sidebar navigation -->
                      <div class="sidebar-cmt">
                        <div class="container">
                          <small>Sort By</small>
                        </div>
                        <div class="form-group" name = "sortof">
                          <div class="resize">
                            <select class="form-control">
                              <option value=1>New</option>
                              <option value="2"> Price High</option>
                              <option value="3"> Price Low</option>

                            </select>
                          </div>
                        </div>
                        </div>
                        





                        <div style="font-size: small;" class="type">
                          <p style="font-weight: bold;">Filter By Post Type</p>
                         <?php $qry = "SELECT `id`, `title` FROM `postingboard` WHERE st=1";
                               $result = $conn->query($qry); 
                                if ($result->num_rows > 0){
                                  while($row = $result->fetch_assoc()) { ?>
                         
                                    <input type="checkbox" id="check-box" name="typ" value="<?php echo $row["id"] ?>">
                                    <label for=""><?php echo $row["title"] ?></label><br>
                
                            <?php }} ?>

                        </div>
                        <br>




                        <div style="font-size: small;" class="cate">
                          <p style="font-weight: bold;">Filter By Post Category</p>
                          <?php $qry = "SELECT `id`, `title` FROM `catagory` WHERE st=1 and ischildonly = 0";
                            $result = $conn->query($qry); 
                            if ($result->num_rows > 0)
                            {
                                 while($row = $result->fetch_assoc()) { ?>
                                 
                                <input type="checkbox" id="check-box" name="cate" value="<?php echo $row["id"] ?>">
                                <label for=""><?php echo $row["title"] ?></label><br>
                                
                        <?php }} ?>
                        </div>


                        <div style="font-size: small;" class="deliv">
                        <p style="font-weight: bold;">Filter By Post Delivery</p>
                          <?php $qry = "SELECT `id`, `title` FROM `deliverymode` WHERE st=1";
                            $result = $conn->query($qry); 
                            if ($result->num_rows > 0)
                            {
                                 while($row = $result->fetch_assoc()) { ?>
                                    <input type="checkbox" id="check-box" name="deli" value="<?php echo $row["id"]; ?>">
                                    <label for=""><?php echo $row["title"] ?></label><br>
                        
                        <?php }} ?>
                          <br>
                        </div>
                        
                        <div style="font-size: small;" class="paymnt">
                          <p style="font-weight: bold;">Filter By Post Payment</p>
                          <?php $qry = "SELECT `id`, `title` FROM `paytype` WHERE st=1";
                                $result = $conn->query($qry); 
                                if ($result->num_rows > 0)
                                {
                                     while($row = $result->fetch_assoc()) { ?>
                                        <input type="checkbox" id="check-box" name="paym" value="<?php echo $row["id"]?>">
                                        <label for=""><?php echo $row["title"] ?></label><br>
                            
                            <?php }} ?>
                          <br>
                        </div>





                    <div style="font-size: small;" class="loc">
                          <p style="  font-weight: bold;">Filter Post By Location</p>
                          <ul style="font-size: small; list-style: none;">
                            <li>All Of Bangladesh</li>
                            <ul style="list-style: none;">
                              <li>Dhaka
                                <ul style="list-style: none;">
                                  <li>Mirpur</li>
                                  <li>Uttara</li>

                                  <li>Bashundhara</li>
                                </ul>
                              </li>

                            </ul>


                        </div>
                        <!--font size sidebar-->

                      </div>
                      <!--sidebar-class-cmt-->

                      <!--/. Sidebar navigation -->

                      <!--/. Sidebar navigation -->

                    </div>
                  
              </div>
            </nav>
          </div>


          <!--carousel-->
          <div class="col-lg-9">
            <div class="row">
              <div class="col">
                <ul class="breadcrumb" id="breadcrumbs" style="margin-left: cm; background-color: white;">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">All Ads</a></li>
                  <li><a href="#">Dhaka</a></li>

                </ul>




              </div>
            </div>
            <div class="row">
              <div class="col">

                <br>
                <!-- boosted ad -->

                <div class="wrapper">
                  <div class="owl-carousel owl-theme" id="boost-ad">
                    <div class=" item" id="boost">
                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <a href=""> <img class="card-img" src="./img/i1.jpg" alt=""> </a>
                            </div>
                            <div class="col-sm-5">
                              <a href="">
                                <h5 class="c-title"> Google Pixel 4

                                </h5>
                              </a>
                              <a href="">
                                <p class="c-name">By Mr. Boltu</p>
                              </a>
                              <a href="">
                                <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or
                                  scratches.
                                  It's
                                  in mint Condition</p>
                              </a>

                            </div>
                            <div class="col-3">
                              <a href="" style="color: #44546A !important; "> <small> <i
                                    class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> </a>
                              <br>
                              <a href=""> <small class="text-center"
                                  style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> </a>
                              <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="item">

                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <a href=""> <img class="card-img" src="./img/i1.jpg" alt=""> </a>
                            </div>
                            <div class="col-sm-5">
                              <a href="">
                                <h5 class="c-title"> Google Pixel 4

                                </h5>
                              </a>
                              <a href="">
                                <p class="c-name">By Mr. Boltu</p>
                              </a>
                              <a href="">
                                <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or
                                  scratches.
                                  It's
                                  in mint Condition</p>
                              </a>

                            </div>
                            <div class="col-3">
                              <a href="" style="color: #44546A !important; "> <small> <i
                                    class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> </a>
                              <br>
                              <a href=""> <small class="text-center"
                                  style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> </a>
                              <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="item">
                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <a href=""> <img class="card-img" src="./img/i1.jpg" alt=""> </a>
                            </div>
                            <div class="col-sm-5">
                              <a href="">
                                <h5 class="c-title"> Google Pixel 4

                                </h5>
                              </a>
                              <a href="">
                                <p class="c-name">By Mr. Boltu</p>
                              </a>
                              <a href="">
                                <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or
                                  scratches.
                                  It's
                                  in mint Condition</p>
                              </a>

                            </div>
                            <div class="col-3">
                              <a href="" style="color: #44546A !important; "> <small> <i
                                    class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> </a>
                              <br>
                              <a href=""> <small class="text-center"
                                  style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> </a>
                              <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <a href=""> <img class="card-img" src="./img/i1.jpg" alt=""> </a>
                            </div>
                            <div class="col-sm-5">
                              <a href="">
                                <h5 class="c-title"> Google Pixel 4

                                </h5>
                              </a>
                              <a href="">
                                <p class="c-name">By Mr. Boltu</p>
                              </a>
                              <a href="">
                                <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or
                                  scratches.
                                  It's
                                  in mint Condition</p>
                              </a>

                            </div>
                            <div class="col-3">
                              <a href="" style="color: #44546A !important; "> <small> <i
                                    class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> </a>
                              <br>
                              <a href=""> <small class="text-center"
                                  style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> </a>
                              <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="item">
                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <img class="card-img" src="./img/i1.jpg" alt="">
                            </div>
                            <div class="col-sm-5">
                              <h5 class="c-title"> Google Pixel 4

                              </h5>
                              <p class="c-name">By Mr. Boltu</p>
                              <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or scratches.
                                It's
                                in mint Condition</p>

                            </div>
                            <div class="col-3">
                              <small> <i class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> <br>
                              <small class="text-center"
                                style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="item">
                      <div class="card" style="background-color: lightyellow;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <a href=""> <img class="card-img" src="./img/i1.jpg" alt=""> </a>
                            </div>
                            <div class="col-sm-5">
                              <a href="">
                                <h5 class="c-title"> Google Pixel 4

                                </h5>
                              </a>
                              <a href="">
                                <p class="c-name">By Mr. Boltu</p>
                              </a>
                              <a href="">
                                <p class="c-details">Phone is in very good Condition. Fresh as new. No dents or
                                  scratches.
                                  It's
                                  in mint Condition</p>
                              </a>

                            </div>
                            <div class="col-3">
                              <a href="" style="color: #44546A !important; "> <small> <i
                                    class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh</small> </a>
                              <br>
                              <a href=""> <small class="text-center"
                                  style="font-size: x-large ; color: #44546a; font-weight: bold;;">$450</small> </a>
                              <br>
                              <a href="#" class="btn btn-primary btn" id="contact-btn"
                                style="margin-right: 10px;">Contact
                                Seller</a>
                            </div>
                            <div class="col">


                              <a href="#" class="likes">
                                <i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
                              </a>



                            </div>

                          </div>
                        </div>
                      </div>

                    </div>

                  </div>

                </div>


                <!-- listing -->
<div class="post_load" data-id = "1" data-obj = "listing">
   
       </div> 

</div>



                

  <!-- New Footer -->

  <footer class="footer-distributed">

    <div class="footer-left">

      <h3>CashMyStash</h3>

      <p class="footer-links">
        <a href="#">Home</a>

        <a href="#">About</a>

        <a href="#">Faq</a>

        <a href="#">Contact</a>
      </p>

      <p class="footer-company-name">CashMyStash &copy; 2020</p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>221b Baker Street</span> London, United Kingdom</p>
      </div>

      <div>
        <i class="fas fa-phone"></i>
        <p>+2211224</p>
      </div>

      <div>
        <i class="far fa-envelope"></i>
        <p><a href="#">contact@cashmystash.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>About the company</span>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptas deserunt voluptatum a tenetur quae
        cupiditate ex repellat amet nobis laudantium, beatae mollitia alias eaque blanditiis natus architecto magni
        itaque.
      </p>

      <div class="footer-icons">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

      </div>

    </div>

  </footer>



  <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  <!-- carousel -->

  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/jquer.js"></script>


  <script>
    $(this).animate({ fontWeight: 'normal' });

    $(".likes").click(function () {

      $(this).find('.fa-heart').animate({ fontSize: '30px', fontWeight: '900' });


    });

  </script>
  
  	<script>
 $(document).ready(function(e) {
     
     //var al = $('.sortof').value();
	 //alart(al);
	
     load_post("", "", "", "");
			
	function load_post(typ, cate, deli, paym){
	    
	    
	    
			$('.post_load').html("Loading...");
			//alert(paym);
			
			
			$.ajax({
				url:"core/phpajax/load_products_json.php",
				method:"POST",
				dataType:"json",
				data:{typ:typ, cate: cate, deli: deli, paym:paym},
				success:function(res)
				{
					$('.post_load').html(res.output);
					//$('.snav-buysell').html(res.cat);
				}
			});	    
	    
	    
	}
	
$(".type input").click(function(){
    //alert($(this).val());
    var typ = '';
    var cate = '';
    var deli = '';
    var paym = '';
    
    $('input[name=typ]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            typ = typ.concat(t, ",");
    });
    
    $('input[name=cate]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            cate = cate.concat(t, ",");
    });
    
    $('input[name=deli]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            deli = deli.concat(t, ",");
    });
    
    $('input[name=paym]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
        paym = paym.concat(t, ",");
    });
    
    load_post(typ,cate, deli, paym);
    
    //alert(a);
    
});


//category
$(".cate input").click(function(){
    //alert($(this).val());
    var typ = '';
    var cate = '';
    var deli = '';
    var paym = '';
    
    $('input[name=typ]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            typ = typ.concat(t, ",");
    });
    
    $('input[name=cate]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            cate = cate.concat(t, ",");
    });
    
    $('input[name=deli]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            deli = deli.concat(t, ",");
    });
    
    $('input[name=paym]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
        paym = paym.concat(t, ",");
    });
    
    load_post(typ,cate, deli, paym);
    
    //alert(a);
    
});

//Delivery mode
$(".deliv input").click(function(){
    //alert($(this).val());
    var typ = '';
    var cate = '';
    var deli = '';
    var paym = '';
    
    $('input[name=typ]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            typ = typ.concat(t, ",");
    });
    
    $('input[name=cate]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            cate = cate.concat(t, ",");
    });
    
    $('input[name=deli]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            deli = deli.concat(t, ",");
    });
    
    $('input[name=paym]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
        paym = paym.concat(t, ",");
    });
    
    load_post(typ,cate, deli, paym);
    
    //alert(a);
    
});

//Payment method
$(".paymnt input").click(function(){
    //alert($(this).val());
    var typ = '';
    var cate = '';
    var deli = '';
    var paym = '';
    
    $('input[name=typ]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            typ = typ.concat(t, ",");
    });
    
    $('input[name=cate]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            cate = cate.concat(t, ",");
    });
    
    $('input[name=deli]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
            deli = deli.concat(t, ",");
    });
    
    $('input[name=paym]').each(function () {
        var t = (this.checked ? $(this).val() : "");
        if(t != '')
        paym = paym.concat(t, ",");
    });
    
    load_post(typ,cate, deli, paym);
    
    //alert(a);
    
});




		
			
			
});
	
	</script>

</body>

</html>