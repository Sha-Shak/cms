<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="images/favicon.png">
    <title>bitCable</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome4.0.7.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">


    <link href="js/plugins/scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="css/app.css" id="maincss">
    <link rel="stylesheet" href="css/dashboard_blank.css">

</head>

<body class="dashboard">


    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid nav-left-padding">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="#"><img src="images/logo-bitcables.png" alt="bitcables"></a> </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"> &nbsp;
                        <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="fa fa-navicon" aria-hidden="true"></span></button>
                    </li>
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right user-menu">
                    <li><a href="../navbar/"><span class="fa fa-gear"></span> Setting</a></li>

                    <li class="dropdown"> <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user-circle-o"></span> <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <!-- Fixed navbar -->

    <div id="wrapper">
        <!-- Sidebar -->

        <div id="sidebar-wrapper" class="mCustomScrollbar">

            <div class="section">
                <i class="fa fa-group  icon"></i>
                <span>Customers</span>
            </div>


            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a></li>

                <li class="active"> <a href="ChannelList.aspx"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>Channels <i class="arrow fa fa-angle-down"></i></a>
                    <ul class="nav-pills nav-stacked" st yle="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-th-list fa-stack-1x "></i></span>All Channels</a></li>
                        <li class="active"><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-upload fa-stack-1x "></i></span>Bulk Upload <i class="arrow fa fa-angle-down"></i></a>

                            <ul class="nav-pills nav-stacked" st yle="list-style-type:none;">
                                <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New</a></li>
                                <li><a href="#" class="current"><span class="fa-stack fa-lg pull-left"><i class="fa fa-th-list fa-stack-1x "></i></span>All Channels <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-upload fa-stack-1x "></i></span>Bulk Upload</a></li>
                            </ul>

                        </li>
                    </ul>
                </li>

                <li> <a href="pakageList.aspx"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dropbox fa-stack-1x "></i></span> Pakages <i class="arrow fa fa-angle-down"></i></a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New <i class="arrow fa fa-angle-down"></i></a>

                            <ul class="nav-pills nav-stacked" st yle="list-style-type:none;">
                                <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New</a></li>
                                <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-th-list fa-stack-1x "></i></span>All Channels</a></li>
                                <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-upload fa-stack-1x "></i></span>Bulk Upload</a></li>
                            </ul>



                        </li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-th-list fa-stack-1x "></i></span>All Pakages</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-upload fa-stack-1x "></i></span>Bulk Upload</a></li>
                    </ul>
                </li>



                <li><a href="customerList.aspx"><span class="fa-stack fa-lg pull-left"><i class="fa fa-group fa-stack-1x "></i></span> Customers <i class="arrow fa fa-angle-down"></i></a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-th-list fa-stack-1x "></i></span>All Customers</a></li>
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-upload fa-stack-1x "></i></span>Bulk Upload</a></li>
                    </ul>
                </li>



                <li><a href="productList.aspx"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Payment <i class="arrow fa fa-angle-down"></i></a>

                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus fa-stack-1x "></i></span>Add New</a></li>
                    </ul>


                </li>



                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-bar-chart fa-stack-1x "></i></span>Report</a> </li>

                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>
                <li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-support fa-stack-1x "></i></span>Help Guide</a> </li>


            </ul>

            <div style="height:54px;">
            </div>


        </div>
        <!-- /#sidebar-wrapper -->





        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <!--h1 class="page-title">Customers</a></h1-->

                        <!-- START PLACING YOUR CONTENT HERE -->


                        <div class="admin-profilebar">
                            <div class="row">
                                <div class="">
                                    <div class="adminproimage">
                                        <img src="images/profile_picture/profile.jpg" alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="adminproname">
                                        <h3>Samiul Haq</h3>
                                        <h5>Novotel limited</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                    <div class="dashbord-menu ">
                                    <div class="container-fluid">
                                       
                                        <nav class="navbar-right ">


                                            <ul class="nav navbar-nav admin-nav">
                                                <li class="active"><a href="#" class="activeplus">Dashbord</a></li>
                                                <li><a href="#">Profile</a></li>
                                                <li><a href="#">Issues</a></li>
                                                <li><a href="#">Invoices</a></li>
                                                <li><a href="#">SOFs</a></li>
                                                <li><a href="#">Payment</a></li>
                                            </ul>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                         
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6  ">
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dashbord-box ">
                                            <div class="dash-head-text">
                                                <h3>
                                                    Dashbord
                                                </h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="dashbordcount">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="countmain linehelp">
                                                <img src="images/icons/isuue-counts.png" alt="">
                                                <h1>6</h1>
                                                <h5>Issue Counts</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="countmain">
                                                <img src="images/icons/due-amount.png" alt="">
                                                <h1>8</h1>
                                                <h5>Due Amount </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="countmain">
                                                <img src="images/icons/announcement.png" alt="">
                                                <h1>15</h1>
                                                <h5>Announcement</h5>
                                            </div>
                                        </div>
                                        <div class="container-fluid">
                                             <div class="row" >
                                            <div class="col-md-6 col-sm-6">
                                               <div class="nweissuebox">
                                                      <div class="leftbtn">
                                                      <img src="images/icons/isuue-counts.png" alt="">
                                                <button>Raise New Issue</button>
                                            </div>
                                               </div>
                                             
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                 <div class="nweissuebox">
                                                        <div class="rightbtn " >
                                                        <img src="images/icons/due-amount.png" alt="" >
                                                <button>Pay Bill</button>
                                            </div>
                                                 </div>
                                               
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                  
                                </div>

                                  <div class="row">
                                        <div class="col-md-12">
                                            <div class="feedsbox">
                                                <div class="feedhead">Feeds</div>
                                                <div class="yourmass">Your Ticket #1234 has been resolved</div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-6 col-md-6  ">
                                  <div class="row right-annouce">
                                       <div class="col-md-12">
                                            <div class="announcement1">
                                                <div class="annouce">
                                                <img src="images/icons/announcement.png" alt="">
                                               Annoucement</div>
                                                <div class="yourmass1">
                                               <img src="images/profile_picture/profile.jpg" alt=""><span class="spantext">Scheduled Maintainace Coming</span> 
                                             </div>
                                              <div class="yourmass1">
                                               <img src="images/profile_picture/profile.jpg" alt=""><span class="spantext">Eid Vation Sarts from 04 aug 2019 to 09  aug 2019</span> 
                                             </div>
                                              <div class="yourmass1">
                                               <img src="images/profile_picture/profile.jpg" alt=""><span class="spantext">Eid Vation Sarts from 04 aug 2019 to 09  aug 2019</span> 
                                             </div>
                                            </div>
                                       </div>
                                       
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                           <div class="task">
                                                <div class="feedhead">Task Summary</div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="t-summary linehelp">
                                                            <h1>5</h1>
                                                            <p>#of Open Issues</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                     <div class="t-summary">
                                                            <h1>1</h1>
                                                            <p>#of Notifications</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                         <div class="t-summary">
                                                            <h1>2</h1>
                                                            <p>#of Announcement</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                                 
                            </div>
                        </div>










                        <!-- START PLACING YOUR CONTENT HERE -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->



    <!-- #page-footer -->
    <div class="container-fluid">
        <div class="page_footer">
            <div class="row">
                <div class="col-xs-2"><a class="" href="http://www.bithut.biz/" target="_blank" bo><img src="images/logo_bithut_sm.png" height="30" border="0"></a></div>
                <div class="col-xs-10  copyright">Copyright ?? <a class="" href="http://www.bithut.biz/" target="_blank">Bithut Ltd.</a></div>
            </div>
        </div>
    </div>
    <!-- /#page-footer -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sidebar_menu.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>



    <!-- FLOT CHART-->
    <script src="js/plugins/Flot/jquery.flot.js"></script>
    <script src="js/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/Flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/Flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/Flot/jquery.flot.time.js"></script>
    <script src="js/plugins/Flot/jquery.flot.categories.js"></script>
    <script src="js/plugins/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="js/demo-flot.js"></script>
    <script src="js/app.js"></script>

    <!-- END FLOT CHART-->



</body></html>
