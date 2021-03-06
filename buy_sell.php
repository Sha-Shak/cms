<?php 
require "core/common/conn.php";
session_start();


?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buy Now-CashMyStash</title>
	<link rel="icon" href="./img/favicon.png" type="image/gif" sizes="50x16">
	<link rel="stylesheet" href="assets/css/productlist.css">
	<link rel="stylesheet" href="assets/css/side.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- CSS LIBRARY -->
	<link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />


	<link rel="stylesheet" type="text/css" href="assets/css/bit-style.css" />






</head>

<body>
<div id="nav-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important;">
      <div class="col-3">
        <a class="navbar-brand" href="index.html"> <img src="./img/Nlogo.png" class="img-fluid" alt="" sty le="width: 100%;"> </a>
      </div>

      <div class="col-9">
        <div class="row">
          <div class="col-9">
            <div class="mr-auto search-wrap" id="navbar-menu-ls">

           




<input type="text" placeholder="Sarch here..." name="search-cms" maxlength="200" id="search-cms">
<span class="fas fa-search  icon"></span>
                <!---input type="text" class="form-control" id="navsearch" placeholder="Search here">

                <button class="btn btn-primary" style="margin-left: 3px;"> Search </button-->

             
            </div>

          </div>
          <div class="col-3">
            <div>
              <ul class="nav nav bar-nav d-flex action-links topbar-icon">
                <li class="nav-item  ">
                  <a class="nav-link" href="#"><i class="fas fa-comments" style="color: #44546a;"></i>
                  </a>
                </li>
            <?php if($_SESSION["cms_user"] == ''){  ?>
                <li class="nav-item">
                  <a class="nav-link" href="profile.html"><i class="fas fa-user" style="color: #44546a; "></i></a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link" href="profile.html"><i class="fas fa-user" style="color: red; "></i></a>
                </li>
            <?php } ?>

                <li class="nav-item">
                  <a class="nav-link" href="#"> <span> <i class="fas fa-bell" style="color: #44546a;"></i> </span></a>
                </li>
              </ul>
            </div>

          </div>
        </div>






      </div>

    </nav>
    <br>
  </div>

	<!---end of nav-->

	<!-- top-bar -->

	<div class="container">

		<div class="row section-nav">
			<div class="col snav snav-buysell active   text-center">
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
				<a href="#"><i class="fas fa-camera fa-3x"> </i> </a>
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







			<div class="row">

				<div class="col-12">
					<!-- Slick Slider -->


					<div class="thumb-slider-wrapper" st yle="height: 500px; overflow: hidden">


						<div class="product-gallery thumb-left">

							<ul id="main-slider" class="pdt-gallery pdt-gal1">
								<li><img src="assets/images/i1.jpg" alt=""></li>
								<li><img src="assets/images/i2.jpg" alt=""></li>
								<li><img src="assets/images/i3.jpg" alt=""></li>
								<li><img src="assets/images/i1.jpg" alt=""></li>
							</ul>
							<div class="thumb-wrap">
								<ul class="pdt-gallery-thumb pdt-thumb1">
									<li><img src="assets/images/i1.jpg" alt=""></li>
									<li><img src="assets/images/i2.jpg" alt=""></li>
									<li><img src="assets/images/i3.jpg" alt=""></li>
									<li><img src="assets/images/i3.jpg" alt=""></li>
									<li><img src="assets/images/i1.jpg" alt=""></li>
									<li><img src="assets/images/i1.jpg" alt=""></li>
									<li><img src="assets/images/i1.jpg" alt=""></li>
								</ul>
							</div>

						</div>


					</div>












					<div class="container" id="slick-title">
						<div class="row">
							<div class="col-md-10">
								<b> MacBook Air</b> <br>
								<b>$600</b>

								<p> <small>By Alif Hossain, Long Time member, sold 14 items so far.</small> </p>

								<br>


							</div>
							<div class="col-md-2 text-center">
								<div class="row" id="like-share">
									<a href="#" class="likes">
										<i class="fas fa-heart" aria-hidden="true" style="font-weight: normal"></i>
									</a>
									<a href="#" style="margin-left: 15px; color: #44546A !important;"><i
											class="fas fa-share-alt"></i></a>
								</div>


								<div class="row">
									<div class="seller-btn" id="product-contact">
										<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
											data-target="#myModal">Contact Seller</button>
										<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Send a message</h4>
														<button type="button" class="close" data-dismiss="modal">&times;
														</button>


													</div>
													<div class="modal-body">
														<h5>MacBook Air</h5>
														<p style="padding-left: 10px; font-size: small; color: gray; ">
															To:
															Alif Hossain</p>
														<textarea name="contacr-seller" id="contact-sell" cols="37"
															rows="5"></textarea>
													</div>

													</style>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary"
															data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>
									</div>
									<br>
								</div>
								<br>
							</div>

						</div>



					</div>


					<!-- End of Slick Slider -->

					<div id="buy-option">


						<div class="container text-center" id="buy-option-body">
							<input type="radio" id="buy" name="type" value="buynow">
							<label for="buy">Buy Now</label>
							<input type="radio" id="auction" name="type" value="auction">
							<label for="auction">Auction</label>
							<input type="radio" id="exchange" name="type" value="exchange">
							<label for="exchange">Exchange</label>
							<input type="radio" id="rent" name="type" value="rent">
							<label for="rent">Rent</label>
							<input type="radio" id=giveaway name="type" value="giveaway">
							<label for="giveaway">Giveaway</label>
							<input type="radio" id="donation" name="type" value="donation">
							<label for="donation">Donation</label>
						</div>



						<br>
					</div>


					<!-- Seller option -->
					<div class="card " id="seller-option">


						<div class="card-body">
							<h5 class="c-header">Other Options</h5>
							<br>
							<div class="row text-center" id="purchasing-option">
								<div class="col-sm-4">
									<h6>Bidding</h6>
									<a href="#">
										<h5>$350</h5>
									</a>
								</div>
								<div class="col-sm-4">
									<h6>Exchange</h6>
									<h5>Available</h5>

								</div>
								<div class="col-sm-4">
									<h6>Rent</h6>
									<h5>Not Available</h5>

								</div>


							</div>


						</div>
						<br>
					</div>



					<!-- Auction -->
					<div class="card" id="auction-option">
						<h5 class="c-header">
							Auction
						</h5>

						<div class="container">

							<div class="card-body">


								<p id="bid-day"> Bid end in 4days 2 minutes</p>
								<div class="row">
									<div class="col-sm-4">
										<input class="form-control" type="text" placeholder="bid here" id="" required>
									</div>
									<div class="col-sm-3">
										<a href="#" class="btn btn-primary">Place Bid</a>
									</div>
									<div class="col-sm-3" id="bid-text">
										<p>You have to bid at least 2600</p>
									</div>
								</div>
								<br>

								<div class="col-sm-4">
									<h6 id="bvalue">Best Value:</h6>
								</div>
								<div class="col-sm-4">
									<a href="#" class="btn btn-primary">Make an Offer</a>
								</div>



							</div>
						</div>
						<br>
					</div>



					<!-- Exchange -->
					<div class="card " id="ex-option">

						<div class="container">

							<div class="card-body" id="give-card">
								<br>

								<h5 class="c-header">Exchange</h5>

								<br>

								<div class="container ex-box">
									<p>Provide Your Exchange Offer: </p>
									<div class="row">
										<div class="col-md-12 text-center">
											<table style="width: 100%;" class="text-center">
												<tr>
													<th>Images</th>
													<th>Name</th>
													<th>Value</th>
													<th>Details</th>
												</tr>
												<tr>
													<td> <img class="table-image" src="./img/i1.jpg" alt=""></td>
													<td>Phone</td>
													<td>$300</td>
													<td>Fresh Condition</td>
												</tr>

												<tr>
													<td> <img class="table-image" src="./img/i2.jpg" alt=""></td>
													<td>Phone</td>
													<td>$300</td>
													<td>Fresh Condition</td>
												</tr>
											</table>
										</div>
									</div>
									<br>
									<div class="row>
									<div class=" seller-btn">
										<a href="" data-toggle="modal" data-target="#addModal"
											style="color: #44546a !important;">+add
											details</a>

										<div class="modal fade" id="addModal" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Send a message</h4>
														<button type="button" class="closer"
															data-dismiss="modal">&times;
														</button>


													</div>
													<div class="modal-body">
														<form action="">
															<div class="ups-img">
																<div class="post-header">
																	<h5>Add Photos</h5>
																</div>
																<hr>
																<label for="file-upload" class="custom-file-upload">
																	<i class="fas fa-camera"></i> Add Photo
																</label>
																<input id="file-upload" type="file" />
															</div>
															<br>

															<label for="ex-name"> Name</label>
															<input type="text" class="form-control" id="ex-name">
															<br>
															<label for="ex-value">Value</label>
															<input type="number" class="form-control" id="ex-value">
															<br>

															<br>

															<textarea name="contacr-seller" id="contact-sell" cols="37"
																rows="5"></textarea>
														</form>


														<div class="modal-footer">
															<input type="submit" class="btn btn-primary btn-block"
																data-dismiss="modal" value="Submit">
														</div>
													</div>

												</div>
											</div>
										</div>


										<br>

									</div>
								</div>
							</div>


							<br>
							<br>
						</div>

						<br>
					</div>


					<!-- Rent -->
					<div class="card" id="rent-option">
						<h5 class="c-header">Rent</h5>
						<div class="container">

							<div class="card-body">
								<div class="row text-center" id="buttons">


									<div class="col-sm">
										<a href="#" class="btn btn-primary btn-block btn-dark">Rent for a Day</a>
									</div>
									<div class="col-sm">
										<a href="#" class="btn btn-primary active btn-block "
											style="background-color: #e7e5e5 !important; border-color: #e7e5e5 !important; color:gray;">Rent
											for a
											week</a>
									</div>
									<div class="col-sm">
										<a href="#" class="btn btn-primary btn-block "
											style="background-color: #e7e5e5 !important; border-color: #e7e5e5 !important; color:gray;">Rent
											for a
											month</a>
									</div>

								</div>
								<br>
								<div class="container">
									<div class="form-group row">
										<label for="sdate" class="col col-form-label" style="margin-left: 20px;">Start
											Date</label>
										<div class="col-sm-4">
											<input type="date" class="form-control" id="sdate"
												placeholder="DD/MM/YYYY/">
										</div>
										<label for="edate" class="col-2 col-form-label">End Date</label>
										<div class="col-sm-4">
											<input type="date" class="form-control" id="edate"
												placeholder="DD/MM/YYYY/">
										</div>
									</div>
								</div>
								<br>
								<div class="text-center">


									<br>
									<h5>Other Renting Options</h5>
									<br>
									<div class="row">
										<div class="col-sm-4">
											<h6>Daily rental Fee</h6>
											<a href="#">
												<h6>$35</h6>
											</a>
										</div>
										<div class="col-sm-4">
											<h6>Weekly Rental Fee</h6>
											<a href="#">
												<h6>$185</h6>
											</a>

										</div>
										<div class="col-sm-4">
											<h6>Weekly Rental Fee</h6>
											<a href="#">
												<h6>$485</h6>
											</a>

										</div>
									</div>

								</div>

							</div>
						</div>
						<br>
					</div>



					<!-- Donation -->

					<div class="card " id="don-option">
						<h5 class="c-header">Donation </h5>
						<div class="container">

							<div class="card-body">



								<br>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Why me?</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>





							</div>
							<br>
						</div>

					</div>



					<!-- Giveaway -->
					<div class="card " id="give-option">
						<h5 class="c-header">Giveaway </h5>
						<div class="container">

							<div class="card-body">



								<br>
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Why me?</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>





							</div>
							<br>

						</div>
					</div>


					<!-- Deatils -->
					<div class="card" id="details">

						<div class="card-body">

							<h5 class="c-header">Details</h5>

							<div class="container">
								<p class="cond">Condition Good</p>
								<p class="product-des">Product description here. Lorem ipsum dolor sit amet, consectetur
									adipisicing elit. Ullam commodi nulla voluptate cupiditate nihil. Quidem fuga
									expedita, provident magnam odit eaque, ipsa esse rerum nihil ut quasi aspernatur!
									Recusandae, aliquid.</p>

							</div>


						</div>
					</div>
					<br>
					<!-- shipping -->

					<div class="card" id="shipping">

						<div class="card-body">

							<h5 class="c-header">Shipping method: </h5>
							<br>
							<div class="container">
								<input type="radio" onclick="myFunction()" id="ship" name="shipping" value="cpay">

								<label for="ship">Shipping</label>

								<input type="radio" onclick="myFuction()" name="shipping" id="pick"
									style="margin-left: 10px;">
								<label for="pick"> Pickup</label>
							</div>


							<br>

						</div>
					</div>
					<br>


					<!-- Ship to -->
					<div class="card" id="my">
						<div class="card-body">
							<h5 class="c-header">Ship To: </h5>

							<div class="container">
								<div class="row" id="address">
									<a href="#">+add new address</a>
								</div>

								<br>
								<br>
								<div class="container">
									<div class="row">

										<div class="col-md-4">
											<div class="pad" id="sender">
												<div class="row">
													<div class="col-8">
														<div class=" send-detail">
															<p>House #44, Sector 1, Road 14</p>
															<p>Uttara, Dhaka-1230</p>
															<p>Bangladesh</p>
															<p>8887776665</p>
														</div>

													</div>
													<div class="col-4">
														<a href="#" id="del"> <i class="far fa-trash-alt"></i> </a>
														<a href="#" id="edit" alt="edit"> <i class="far fa-edit"></i>
														</a>

													</div>
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="pad" id="sender">
												<div class="row">
													<div class="col-8">
														<p>House #44, Sector 1, Road 14</p>
														<p>Uttara, Dhaka-1230</p>
														<p>Bangladesh</p>
														<p>8887776665</p>

													</div>
													<div class="col-4">
														<a href="#"> <i class="far fa-trash-alt"></i> </a>
														<a href="#" id="edit" alt="edit"> <i class="far fa-edit"></i>
														</a>

													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="pad" id="sender">
												<div class="row">
													<div class="col-8">
														<p>House #44, Sector 1, Road 14</p>
														<p>Uttara, Dhaka-1230</p>
														<p>Bangladesh</p>
														<p>8887776665</p>

													</div>
													<div class="col-4">
														<a href="#" id="del "> <i class=" far fa-trash-alt"></i> </a>
														<a href="#" id="edit" alt="edit"> <i class="far fa-edit"></i>
														</a>

													</div>
												</div>



											</div>
										</div>
									</div>
								</div>
								<br>
							</div>


							<br>
						</div>
						<br>

					</div>


					<div class="card" id="mypick">
						<div class="card-body">
							<h5 class="c-header"> Pick up Location</h5>
							<div class="container">

								<div class="pick-detail ">
									<div class="container">
										<p>House #42, Road #3, Sector #9</p>
										<p>Uttara, Dhaka-1230</p>
										<p>Bangladesh</p>
										<p>875566</p>
									</div>
								</div>
								<br>
							</div>
						</div>

					</div>



					<!-- Form -->
					<div class="card" id="payment">

						<div class="card-body">


							<h5 class="c-header">Payment </h5>
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="row">
											<div class="col">
												<input type="radio" name="payment" id="buy-cod">
												<label for="buy-cod">Cash On Delivery</label>


												<input type="radio" name="payment" id="card" style="margin-left: 15px;">
												<label for="card"> Card Payment</label>
											</div>
										</div>


										<!-- <input type="radio" id="card1" name="card" value="card1">
							  <label for="card1"><input class="form-control " type="text" placeholder="Visa" id="" required></label><br>
							  <input type="radio" id="card2" name="card" value="card2">
							  <label for="card2"><input class="form-control " type="text" placeholder="Visa" id="" required></label><br>
							   -->
										<div class="card-form">
											<form>
												<input class="form-control" type="text" placeholder=" Card Name" id=""
													required>
												<br>
												<input class="form-control" type="text"
													placeholder="Credit card/Debit Card" id="" required> <br>
												<div class="row">
													<div class="col-sm-3" style="float: left;">
														<input class="form-control" type="text" placeholder="MM/YY"
															id="" required>
														<br>
													</div>

													<div class="col-sm-3">
														<input class="form-control" type="text" placeholder="CVC" id=""
															required>
														<br>
													</div>
												</div>
											</form>
										</div>

										<div class="cod-amount">
											<input class="form-control" type="text" placeholder="Cash on Delivery" id=""
												required>

											<br>
										</div>
										<!-- row -->
									</div>
								</div>
								<hr>
								<div class="container">
									<a href="#">
										<p> Do you have a voucher? </p>
									</a>
									<p>By making this product you agree to our <a href="#">terms and conditions</a>.
									</p>


									
									<br>
								</div>
							</div>





						</div>
					</div>
					<br>



					<button id="placeorder" type="submit"
										class="btn btn-primary btn-block text-center">Place Order</button>


				</div>

			</div>









		</div>




	</div>


	<!-- New Footer -->
	<footer class="footer-distributed">

		<div class="footer-left">

			<h3>CashMyStash</h3>

			<p class="footer-links">
				<a href="#">Home</a>
				.
				<a href="#">About</a>
				.
				<a href="#">Faq</a>
				.
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
				Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptas deserunt voluptatum a tenetur
				quae cupiditate ex repellat amet nobis laudantium, beatae mollitia alias eaque blanditiis natus
				architecto magni itaque.
			</p>



		</div>

	</footer>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

	<!-- carousel -->

	<script src="./assets/js/owl.carousel.min.js"></script>
	<script src="./assets/js/jquer.js"></script>

	<script src="assets/js/slick.min.js"></script>

	<script>
		$(function () {
			$('.pdt-gal1').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.pdt-thumb1',
				autoplay: true,
				pauseOnHover: true,
			});

			$('.pdt-thumb1').slick({
				slidesToShow: 4,
				infinite: true,
				slidesToScroll: 1,
				asNavFor: '.pdt-gal1',
				focusOnSelect: true,
				autoplay: false,
				vertical: true,
				verticalSwiping: true,
				arrows: false,
				centerMode: true,
			});


		});			
	</script>

	<!-- custom like -->

	<script>
		$(this).animate({ fontWeight: 'normal' });

		$(".likes").click(function () {

			$(this).find('.fa-heart').animate({ fontSize: '30px', fontWeight: '900' });


		});


	</script>


	<!-- Shipping-pickup -->



	<script>
		$(document).ready(function () {

			$("#my").attr('style', 'display:none;');

			$("input[name=shipping]:radio").change(function () {


				if ($('#ship').is(':checked')) {
					$("#my").attr('style', 'display:block;');
				} else {
					$("#my").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>

	<script>
		$(document).ready(function () {

			$("#mypick").attr('style', 'display:none;');

			$("input[name=shipping]:radio").change(function () {


				if ($('#pick').is(':checked')) {
					$("#mypick").attr('style', 'display:block;');
				} else {
					$("#mypick").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>


	<script>
		$(document).ready(function () {

			$(".cod-amount").attr('style', 'display:none;');

			$("input[name=payment]:radio").change(function () {


				if ($('#buy-cod').is(':checked')) {
					$(".cod-amount").attr('style', 'display:block;');
				} else {
					$(".cod-amount").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>

	<script>
		$(document).ready(function () {

			$(".card-form").attr('style', 'display:none;');

			$("input[name=payment]:radio").change(function () {


				if ($('#card').is(':checked')) {
					$(".card-form").attr('style', 'display:block;');
				} else {
					$(".card-form").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>



	<!-- buy now -->
	<script>
		$(document).ready(function () {

			$("#seller-option").attr('style', 'display:none;');
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#buy').is(':checked')) {
					$("#seller-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:block;');
					$("#payment").attr('style', 'display:block;');
				} else {
					$("#seller-option").attr('style', 'display:none;');
					
					$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>

	<!-- auction -->
	<script>
		$(document).ready(function () {

			$("#auction-option").attr('style', 'display:none;');
			
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#auction').is(':checked')) {
					$("#auction-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:block;');
					$("#payment").attr('style', 'display:block;');
				} else {
					$("#auction-option").attr('style', 'display:none;');
					
					$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>

	<!-- exchange -->
	<script>
		$(document).ready(function () {

			$("#ex-option").attr('style', 'display:none;');
			
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#exchange').is(':checked')) {
					$("#ex-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:block;');
					$("#payment").attr('style', 'display:block;');
				} else {
					$("#ex-option").attr('style', 'display:none;');
					$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>


	<!-- rent -->
	<script>
		$(document).ready(function () {

			$("#rent-option").attr('style', 'display:none;');
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#rent').is(':checked')) {
					$("#rent-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:block;');
					$("#payment").attr('style', 'display:block;');
				} else {
					$("#rent-option").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>

	<!-- donation -->
	<script>
		$(document).ready(function () {

			$("#don-option").attr('style', 'display:none;');
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#donation').is(':checked')) {
					$("#don-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');
				} else {
					$("#don-option").attr('style', 'display:none;');
					
				}
			});

			//attr('checked', true);

		});

	</script>

	<!-- giveaway --> -->
	<script>
		$(document).ready(function () {

			$("#give-option").attr('style', 'display:none;');
			$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');

			$("input[name=type]:radio").change(function () {


				if ($('#giveaway').is(':checked')) {
					$("#give-option").attr('style', 'display:block;');
					$("#shipping").attr('style', 'display:none;');
					$("#payment").attr('style', 'display:none;');
					
					
				} else {
					$("#give-option").attr('style', 'display:none;');
				}
			});

			//attr('checked', true);

		});

	</script>







</body>

</html>