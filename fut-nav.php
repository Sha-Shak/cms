
    <link rel="stylesheet" href="./assets/css/n-style.css">
    <div id="nav-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: white !important;">
            <div class="col-3">
                <a class="navbar-brand" href="index.html"> <img src="./assets/images/Nlogo.png" class="img-fluid" alt=""
                        sty le="width: 100%;"> </a>
            </div>

            <div class="col-9">
                <div class="row">
                    <div class="col-9">
                        <div class="mr-auto search-wrap" id="navbar-menu-ls">






                            <input type="text" placeholder="Search here..." name="search-cms" maxlength="200"
                                id="search-cms">
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


                                <li class="nav-item">
                                    <a class="nav-link" href="profile.html"><i class="fas fa-user"
                                            style="color: #44546a; "></i></a>
                                </li>

                                <li class="nav-item">


                                    <a class="nav-link" href="javascript:void(0)" onclick="toggleNotifi()"><i
                                            class="fas fa-bell"></i> </a>


                                </li>
                                <div class="notifi-box" id="box">
                                    <div style=" width: 320px;   height: 500px; overflow-y:auto; overflow-x:hidden;">
                                        <h2>Notifications <span class="notification-count">17</span></h2>
                                        <div class="notifi-item">
                                            <img class="img-fluid" style="height: 50px;" src="./assets/images/pro.png"
                                                alt="img">
                                            <div class="text">
                                                <h4>Elias Abdurrahman</h4>
                                                <p>@lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>

                                        <div class="notifi-item">
                                            <img class="img-fluid" style="height: 50px;" src="./assets/images/smith.jpg"
                                                alt="img">
                                            <div class="text">
                                                <h4>John Doe</h4>
                                                <p>@lorem ipsum dolor sit amet</p>
                                            </div>
                                        </div>

                                        <div class="notifi-item">
                                            <img class="img-fluid" style="height: 50px;" src="./assets/images/jpro.jpg"
                                                alt="img">
                                            <div class="text">
                                                <h4>Emad Ali</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores
                                                    maiores
                                                    amet porro quam sequi ducimus itaque culpa tempore animi explicabo
                                                    quis
                                                    impedit, delectus quod nostrum ad officiis repudiandae, magnam
                                                    dolore?
                                                </p>
                                            </div>
                                        </div>

                                        <div class="notifi-item">
                                            <img class="img-fluid" style="height: 50px;" src="./assets/images/pro.png"
                                                alt="img">

                                        </div>




                                    </div>
                                </div>




                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </div>
    <br>





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
    <br>

    
    <script src="./assets/js/n-script.js"></script>


    



    <script>


        function load_notifications() {


            $('.notification-block').html("Loading categories...");
            $.ajax({

                url: "phpajax/load_notification.php",
                method: "POST",
                dataType: "json",

                success: function (res) {
                    $('.notification-block').html(res.block);
                    $('.notification-count').html(res.count);

                    //messageAlert(res);
                }
            });
        }

        setInterval(function () {
            load_notifications();
        }, 10000);



    </script>


</body>

</html>
