<?php
require "core/common/conn.php";
session_start();
$val= $_REQUEST["val"];

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  

  <title>Post ad-CashMyStash</title>
  <link rel="icon" href="./img/favicon.png" type="image/gif" sizes="50x16">
  <link rel="stylesheet" href="./assets/css/productlist.css">
  <link rel="stylesheet" href="./assets/css/side.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/bit-style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- CSS LIBRARY -->
  <link rel="stylesheet" type="text/css" href="./assets/css/slick.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/slick-theme.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  

<style>
    .sell-op, .auc-box  .don-op{
        display: none;
    } 
    .rent-box{
        display:none;
    }
    .up-im{
        padding: 10px;
    }
    .gallery-im{
        width: 100px;
        margin: 10px;
    }
    li{
        list-style-type: none;
    }
   
    .post-pic-title {
        color: black;
    }
    
    .price-col{
        margin-right: 15px;
    }
   
   .req-sign{
       color: red;
   }
   .post-title-photo{
       padding-left: 0px;
   }
   
   .post-pg-title {
       color: black;
       
   }
   
   #non-neg{
       margin-left: 10px;
   }
   
   .post-method-1, .post-method-2, .post-method-3 {
       margin-bottom: 5px;
       z-index: 1000px;
   }
   #post-des, #post-pay{
       margin-bottom: 0px !important;
      
   }
   
 .cod:hover .hidepay{
   
    font-size: 20px;
    visibility: visible;
    z-index: 1;
  
}
#6:hover + .hidepay{
    font-size: 20px; 
}

.cod .hidepay{
 visibility: hidden;
  
  background-color: white;
  color: black;
  margin-top:  ;
  border-radius: 5px;
  padding: 5px;
  margin-top: 30px;
  position: absolute;
  z-index: 1;
  top: 70;
  
  
}
    
.hidepay
{
    font-size: 12px !important;
    font-style: italic;
    border: 0.5px solid #44546a; 
    color: #44546a;
    font-weight: 300;
}
.fa-info-circle{
    color: #327be9;
    font-style: italic;
}

h6{
    color: black;
}
 .custom-radio input {
            display: none;
        }
         .custom-radio-s input {
            display: none;
        }
        .radio-btn {
            display: block ;
            margin: 5px;
            margin-top: 20px;
            width: 140px;
            height: 140px;
            border: 3px solid transparent;
            display: inline-block;
            border-radius: 5px;
            position: relative;
            text-align: center;
            box-shadow: 0 0 10px #c3c3c367;
            cursor: pointer;
        }
        .radio-btn-s {
            display: block ;
            margin: 5px;
            margin-top: 20px;
            width: 120px;
            height: 140px;
            border: 3px solid transparent;
            display: inline-block;
            border-radius: 5px;
            position: relative;
            text-align: center;
            box-shadow: 0 0 10px #c3c3c367;
            cursor: pointer;
        }

        .radio-btn>i {
            color: #ffffff;
            background-color: black;
            font-size: 20px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%) scale(4);
            border-radius: 50px;
            padding: 3px;
            transition: 0.2s;
            pointer-events: none;
            opacity: 0;
        }
         .radio-btn-s>i {
            color: #ffffff;
            background-color: black;
            font-size: 20px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%) scale(4);
            border-radius: 50px;
            padding: 3px;
            transition: 0.2s;
            pointer-events: none;
            opacity: 0;
        }

        .radio-btn .hobbies-icon {
            width: 80px;
            height: 80px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .radio-btn-s .hobbies-icon {
            width: 80px;
            height: 80px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .hobbies-icon-inp{
            width: 80px;
            height: 80px;
            position: absolute;
            top: 35% !important;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .hobbies-inp-text{
    margin-left: 20px
}

        
        .radio-btn .hobbies-icon i {
    color: black;
    line-height: 40px;
    font-size: 50px;
   
}
 .radio-btn-s .hobbies-icon i {
    color: black;
    line-height: 40px;
    font-size: 50px;
   
}

        .radio-btn .hobbies-icon h3 {
            color: black;
            font-family:  sans-serif;
            font-size: 16px;
            font-weight: 400;
          
            white-space: nowrap;
        }
         .radio-btn-s .hobbies-icon h3 {
            color: black;
            font-family:  sans-serif;
            font-size: 14px;
            font-weight: 400;
          
            white-space: nowrap;
        }

        .custom-radio input:checked+.radio-btn {
            border: 3px solid black;
        }
        .custom-radio input:checked+.radio-btn-s {
            border: 3px solid black;
        }
         

        .custom-radio input:checked+.radio-btn>i {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
        .custom-radio-s input:checked+.radio-btn-s>i {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
        .nex-img {
            max-width: 120px;
            margin-left: 7px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .nex-card-text {
            font-size: 14px;
            margin-top: 10px;
        }
        .nex-card-text-bid{
            margin-left: 10px;
                margin-top: 7px;
        }

        .nex-radio-buttons {
           
            margin: 0 auto;
            text-align: center;
        }
       .cus-inp {
        display: block !important;
        width: 80px;
        height: 80px;
        margin-left: 12px;
        padding: 10px;
        font-size: 25px;
        border: 0.5px solid lightgray;
        border-radius: 5px;
    }
    .rent-row, .gserv-row{
        padding: 0px 20px;
        margin-left: 20px
    }
    .gserv-row{
        display:none;
    }
    
    .nex-card-text-lg {
    font-size: 14px;
    margin-top: 10px;
    margin-left: -20px;
}
        
        
.sdel-met{
    display:none;
}
.serv-c-pay, .serv-cod {
    margin: 0px 10px;
}
 
/* NEW POST AD */
.multi_step_form {
  background: #f6f9fb;
  display: block;
  overflow-x: hidden;
}
.multi_step_form #msform {
  text-align: center;
  position: relative;
  padding-top: 50px;
  min-height: 820px;
  height: auto;
  max-width: 820px;
  margin: 0 auto;
  background: #ffffff;
  z-index: 1;
}

.multi_step_form #msform fieldset {
  border: 0;
  padding: 20px 105px 0;
  position: relative;
  width: 100%;
  left: 0;
  right: 0;
}
.multi_step_form #msform fieldset:not(:first-of-type) {
  display: none;
}

.multi_step_form #msform #progressbar {
  margin-bottom: 30px;
  overflow: hidden;
}
.multi_step_form #msform #progressbar li {
  list-style-type: none;
  color: #99a2a8;
  font-size: 9px;
  width: calc(100%/3);
  float: left;
  position: relative;
  font: 500 13px/1 "Roboto", sans-serif;
}
.multi_step_form #msform #progressbar li:nth-child(2):before {
  content: "\f466";
}
.multi_step_form #msform #progressbar li:nth-child(3):before {
  content: "\f4ce";
}
.multi_step_form #msform #progressbar li:before {
  content: "\f0a1";
  font-family: "Font Awesome 5 Free"; 
  font-weight: bolder;
 font-size: 20px;
  width: 50px;
  height: 50px;
  line-height: 50px;
  display: block;
  background: #eaf0f4;
  border-radius: 50%;
  margin: 0 auto 10px auto;
}
.multi_step_form #msform #progressbar li:after {
  content: '';
  width: 100%;
  height: 10px;
  background: #eaf0f4;
  position: absolute;
  left: -50%;
  top: 21px;
  z-index: -1;
}
.multi_step_form #msform #progressbar li:last-child:after {
  width: 150%;
}
.multi_step_form #msform #progressbar li.active {
  color: black;
}
.multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
  background: black;
  color: white;
}
.multi_step_form #msform .action-button {
  background: black;
  color: white;
  border: 0 none;
  border-radius: 5px;
  cursor: pointer;
  min-width: 130px;
  font: 700 14px/40px "Roboto", sans-serif;
  border: 1px solid black;
  margin: 0 5px;
  text-transform: uppercase;
  display: inline-block;
}
.multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
  background: #405867;
  border-color: #405867;
}
.multi_step_form #msform .previous_button {
  background: transparent;
  color: #99a2a8;
  border-color: #99a2a8;
}
.multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
  background: #405867;
  border-color: #405867;
  color: #fff;
}

    
    
    
</style>







</head>

<body>
    <?php include "./navbar.php" ?>
    
    <div class="section-divider"></div>




<form id="post-ad-form" action="common/addpost.php" method="POST" enctype="multipart/form-data">

    <div class="container" style="background-color:white; border-top:0px solid black;">

      <div class="content-base-margin">

        <div class="container" style="background-color:white;">
            <section class="multi_step_form">
    <form id="msform">
      <!-- Tittle -->

      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active">Select Post Type</li>
        <li>Product Details</li>
        <li>Shipping and Payment</li>
      </ul>
      <!-- fieldsets -->
     
          <div class="row">
           


            <div class="col-12 " id="post-ad">




              <br>
              <!--  <div class="ups-img">
                <div class="post-header">
                  <h6>Add Photos</h6>
                </div>
                <hr>
                <div class="row">
                 <div class="col-sm up-im">
                        <label for="uploadedhere">
                            <input type="file" id="uploadedhere" name = "photo" onchange="myfun()">
                            <img src="assets/images/upload.svg" id="changeimage1" height="130" width="110">
                        </label>
                    </div>
                    
                    <div class="col-sm up-im">
                        <label for="uploadedhere">
                            <input type="file" id="uploadedhere" name = "photo" onchange="myfun()">
                            <img src="assets/images/upload.svg" id="changeimage2" height="130" width="110">
                        </label>
                    </div>

                    <div class="col-sm up-im">
                        <label for="uploadedhere">
                            <input type="file" id="uploadedhere" name = "photo" onchange="myfun()">
                            <img src="assets/images/upload.svg" id="changeimage3" height="130" width="110">
                        </label>
                    </div>
                  
                    <div class="col-sm up-im">
                        <label for="uploadedhere">
                            <input type="file" id="uploadedhere" name = "photo" onchange="myfun()">
                            <img src="assets/images/upload.svg" id="changeimage4" height="130" width="110">
                        </label>
                    </div>

                   
                    
                    </div>






              </div>
              <br> -->
              
         <fieldset>      
            <!-- SELECT POST TYPE BLOCK -->   
            <div class="row" id="" reqired>
                <div class=" col-12 post-type">
                    
                <h6 class= "post=pg-title" > Select a Post Type <span class="req-sign">*</span> </h6>    
                
                <hr>
                    
                 <!-- <div class=" post-method-1">
                        
                    <input type="radio" name="post-met" id="post-met-1" value = "1">
                    <label for="post-met-1">
                      <h6>Sell</h6>
                    </label> -->
                    
                  <!-- <div class="sell-op">
                        <hr>
                     <!-- <input type="checkbox" id="buy-now" name="buy-now" value = "27">
                      <label for="buy-now">Sell Now</label>
                      <input type="checkbox" id="auction" name="auction" value = "28">
                      <label for="auction">Auction</label>
                      <input type="checkbox" id="exchange" name="exchange" value = "29">
                      <label for="exchange">Exchange</label> -->
                     <!-- <div class="row">
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="buy-now" name="buy-now" value="27" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class=" fas fa-shopping-basket fa-3x nex-img"></i>
                                        
                                        <h3 class="nex-card-text">Sell Now</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="auction" name="auction" value="28" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-file-signature"></i>
                                        
                                        <h3 class="nex-card-text">Auction</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="exchange" name="exchange" value="29" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-sync"></i>
                                        
                                        <h3 class="nex-card-text">Exchange</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card auc-box" id="card-auc">
                   <div class="pc-header">
                        <h6> Auction Field</h6>
                       
                    </div>
                    
                  <div class="row auc-field ">



                  
                      <div class="post-bid-am">
                      <label for="auc-amount">Minimum Bid</label>
                      <input type="number" min="0"  class="form text-center" id="auc-amount" name="auc-amount" value="0">
                      </div>
                      </div>
                      
                      

                 

                     <div class="row auc-field ">
                      <div class="post-bid-end">
                          
                      <span>Ends in: </span>
                      <input type="radio" id="auc-day-5" name="auc-day" value="5">
                      <label for="auc-day-5">5 Days</label>
                      <input type="radio" id="auc-day-7" name="auc-day" value="7">
                      <label for="auc-day-7">7 Days</label>
                      
                      </div>
                      
                    
                    </div>
              </div>
                 <!-- </div> -->
                  

                  <!--<div class="post-method-2"> -->

                 <!--   <input type="radio" name="post-met" id="post-met-2">
                    <label for="post-met-2">
                      <h6>Rent</h6>
                    </label> -->
                    
                    <!--<div class="rent-op">
                        
                      <input type="radio" id="rent" name="post-met" value = "2">
                      <label for="rent">Rent</label>
                    </div> -->
                     <!-- <div class="card rent-box" id="card-rent">
                    <div class="pc-header">
                        <h6> Rent Field</h6>
                    
                    </div>
                    <hr>


                  <div class="row">



                    <div class="col-sm day-field">
                      
                      <input type="number" min="0"  class="form" id="day-box" placeholder = "$" name="rent-day" value ="">
                      <label for="rent-day"> /Daily</label>

                    </div>

                    <div class="col-sm week-field">
                      
                      <input type="number" min="0"  class="form" id="week-box" placeholder = "$" name="rent-week" value="">
                      <label for="rent-week"> /Weekly</label>
                    </div>

                    <div class="col-sm month-field">
                      
                      <input type="number" min="0"  class="form" id="month-box" placeholder = "$" name="rent-month" value="">
                      <label for="rent-month"> /Monthly</label>
                    </div>


                    <br>
                

              </div>
              </div> -->
                 <!-- </div> -->
                  
                    
                    <div class="row">
                        <label class="custom-radio">
                                    <input type="radio" id="post-met-1" name="post-met" value = "1" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-shopping-basket"></i>
                                        
                                        <h3 class="nex-card-text">Sell</h3>
                                    </div>
                                    </div>
                                </label>
                         <label class="custom-radio">
                                    <input type="radio" id="rent" name="post-met" value = "2" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-dollar-sign"></i>
                                        
                                        <h3 class="nex-card-text">Rent</h3>
                                    </div>
                                    </div>
                                </label>
                                
                         <label class="custom-radio">
                                    <input type="radio" id="post-met-3" name="post-met" value = "3" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        
                                        <h3 class="nex-card-text">Donate</h3>
                                    </div>
                                    </div>
                                </label>
                                 <label class="custom-radio">
                                    <input type="radio" id="serv" name="post-met" value = "4" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                       <i class="fas fa-male"></i>
                                        
                                        <h3 class="nex-card-text">Service</h3>
                                    </div>
                                    </div>
                                </label>
                                
                    </div>    
                  <!--<div class="post-method-3">

                    <input type="radio" name="post-met" id="post-met-3" value = "3">
                    <label for="post-met-3">
                      <h6>Donate</h6>
                    </label> -->
                     <div class="sell-op">
                        <hr>
                     <!-- <input type="checkbox" id="buy-now" name="buy-now" value = "27">
                      <label for="buy-now">Sell Now</label>
                      <input type="checkbox" id="auction" name="auction" value = "28">
                      <label for="auction">Auction</label>
                      <input type="checkbox" id="exchange" name="exchange" value = "29">
                      <label for="exchange">Exchange</label> -->
                      <div class="row">
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="buy-now" name="buy-now" value="27" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class=" fas fa-shopping-basket fa-3x nex-img"></i>
                                        
                                        <h3 class="nex-card-text">Sell Now</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="auction" name="auction" value="28" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-file-signature"></i>
                                        
                                        <h3 class="nex-card-text">Auction</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col">
                                 <label class="custom-radio">
                                    <input type="checkbox" id="exchange" name="exchange" value="29" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-sync"></i>
                                        
                                        <h3 class="nex-card-text">Exchange</h3>
                                    </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                
                <div class="card auc-box" id="card-auc">
                    
                    <hr class="rev-hr">
                      
                                <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="auc-amount" name = "auc-amount" step="any" placeholder = "$" >
                                        <h3 class="nex-card-text-bid hobbies-inp-text ">Minimum Bid</h3>
                                    </div>
                                    </div>
                                </label>
                    
                <!--   <div class="pc-header">
                        <h6> Auction Field</h6>
                       
                    </div>
                    
                  <div class="row auc-field ">



                  
                      <div class="post-bid-am">
                      <label for="auc-amount">Minimum Bid</label>
                      <input type="number" min="0"  class="form text-center" id="auc-amount" name="auc-amount" value="0">
                      </div>
                      </div> -->
                      
                      

                 

                     <div class="row auc-field ">
                      <div class="post-bid-end">
                          
                      <span>Ends in: </span>
                      <input type="radio" id="auc-day-5" name="auc-day" value="5">
                      <label for="auc-day-5">5 Days</label>
                      <input type="radio" id="auc-day-7" name="auc-day" value="7">
                      <label for="auc-day-7">7 Days</label>
                      
                      </div>
                      
                    
                    </div>
              </div>
                <div class="rent-box" id="card-rent">
                    
                    <hr class="rev-hr">


                  <div class="row rent-row">
                                
                                
                                <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="day-box" placeholder = "$" name="rent-day" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Per Day</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                
                                 <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="week-box" placeholder = "$" name="rent-week" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Per Week</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                 <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="month-box" placeholder = "$" name="rent-month" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Per Month</h3>
                                    </div>
                                    </div>
                                </label>
                   
                 <!--   <div class="col-sm day-field">
                        
                      
                     <!-- <input type="number" min="0"  class="form" id="day-box" placeholder = "$" name="rent-day" value ="">
                      <label for="rent-day"> /Daily</label>

                    </div>

                    <div class="col-sm week-field">
                      
                      <input type="number" min="0"  class="form" id="week-box" placeholder = "$" name="rent-week" value="">
                      <label for="rent-week"> /Weekly</label>
                    </div>

                    <div class="col-sm month-field">
                      
                      <input type="number" min="0"  class="form" id="month-box" placeholder = "$" name="rent-month" value="">
                      <label for="rent-month"> /Monthly</label>
                    </div> -->


                    
                

              </div>
              </div>
                <div class="serve-box" id="card-serv">
                                <hr class="rev-hr">
                            <label class="custom-radio">
                                    <input type="radio" id="wserv" name="serv-op" value="1" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-sync"></i>
                                        
                                        <h3 class="nex-card-text">I want Service</h3>
                                    </div>
                                    </div>
                                </label>
                      
                      
                    
                           <label class="custom-radio">
                                    <input type="radio" id="gserv" name="serv-op" value="2" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-sync"></i>
                                        
                                        <h3 class="nex-card-text-lg">I provide Service</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                  <div class="row gserv-row">
                                
                                
                                <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="sday-box" placeholder = "$" name="serv-day2" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Day</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                
                                 <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                        <input type="number" min="0"  class="form cus-inp text-center" id="sweek-box" placeholder = "$" name="serv-week2" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Week</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                 <label class="custom-radio">
                                    
                                    <div class="radio-btn">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="smonth-box" placeholder = "$" name="serv-month2" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Month</h3>
                                    </div>
                                    </div>
                                </label>
                   
                


                    
                

              </div> 
               
               <div class="row wserv-row">
                                
                                
                                <label class="custom-radio-s">
                                    
                                    <div class="radio-btn-s">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="wsday-box" placeholder = "$" name="serv-day1" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Day</h3>
                                    </div>
                                    </div>
                                </label>
                                <label class="custom-radio-s">
                                    
                                    <div class="radio-btn-s">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                        <input type="number" min="0"  class="form cus-inp text-center" id="wsweek-box" placeholder = "$" name="serv-week1" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Week</h3>
                                    </div>
                                    </div>
                                </label>
                                 <label class="custom-radio-s">
                                    
                                    <div class="radio-btn-s">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="wsmonth-box" placeholder = "$" name="serv-month1" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">Charge/Month</h3>
                                    </div>
                                    </div>
                                </label>
                                 <label class="custom-radio-s">
                                    
                                    <div class="radio-btn-s">
                                    <div class="row hobbies-icon hobbies-icon-inp">
                                      
                                         <input type="number" min="0"  class="form cus-inp text-center" id="wsbud-box" placeholder = "$" name="serv-tot1" value ="" step="any">
                                        <h3 class="nex-card-text hobbies-inp-text">My Budget</h3>
                                    </div>
                                    </div>
                                </label>
                   
                


                    
                

              </div> 
                 
              </div>
                    <div class="don-op">
                        <hr>
                        
                         <label class="custom-radio">
                                    <input type="checkbox" id="donation" name="donation" value="31" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        
                                        <h3 class="nex-card-text">Doation</h3>
                                    </div>
                                    </div>
                                </label>
                                
                                
                            
                                 <label class="custom-radio">
                                    <input type="checkbox" id="giveaway" name="giveaway" value="32" />
                                    <div class="radio-btn"><i class="fas fa-check"></i>
                                    <div class="hobbies-icon">
                                       <i class="fas fa-gift"></i>
                                        
                                        <h3 class="nex-card-text">Giveaway</h3>
                                    </div>
                                    </div>
                                </label>
                                
                     <!-- <input type="checkbox" id="donation" name="donation" value = "31" >
                      <label for="donation">Donation</label>
                      <input type="checkbox" id="giveaway" name="giveaway" value = "32">
                      <label for="giveaway">Giveaway</label> -->
                    </div>
                  <!--</div> -->
                </div>
              </div> 
              <!-- SELECT POST TYPE BLOCK END -->
                <button type="button" class="next action-button">Continue</button>
         </fieldset>
         
         <fieldset>      	
              	<!-- Product details block -->
              	<div class="col-sm-12 col-md-12 post-title-photo ">
              	     <div class="row">
                <div class="col-12">
                  <h3><input type="text" class="" name="title" id="title" placeholder="Add a Title" maxlength="40" required></h3>
                  <br>

                </div>
              </div>
              
              <br>
                                    			<!--	<div class="col-sm-12">
                                    				  <h4 class="post-pic-title ">Add Picture</h4>
                                    				  <hr class="form-hr">
                                    				</div>
                                    				-->
                                    				<div class="col-lg-6 col-md-6 col-sm-12">
                                    				   <h6 class="post-pic-title "> Add Featured Picture <span class="req-sign">*</span> </h6>
                                    				   <hr>
                                    					<div class="input-group">
                                							<label class="input-group-btn">
                                								<span class="btn btn-primary btn-file btn-file">
                                								   <i class="fa fa-upload"></i><input type="file" name="attachment1" id="attachment1" style="display:none;" onchange="loadFile(event)" >
                                								</span>
                                							</label>
                                						   <!-- <input type="text" class="form-control" readonly> -->
                                    				    </div>
                                					<span class="help-block form-text text-muted">
                                    							Upload only one picture. 
                                    						</span> 
                                					</div> 
                                						<ul class="product-picture-preview">
                                    							<li style="none"><img id="output"  width="150" alt="" src=""><?php if($isfeature==1){?><span class="featured-images-badge">Featured</span><?php }?><!--<span class="glyphicon glyphicon-remove"></span></li> -->
                                    						
                                    						
                                    						<!--	<?php   
                                    							$gqryinv="SELECT id,`image` FROM `productimage` where `product`='".$code."' and imagetype=2";  //echo $gqryinv;die;
                                    							$gresultinv = $conn->query($gqryinv); if ($gresultinv->num_rows > 0) {while($growinv = $gresultinv->fetch_assoc()){
                                                                  
                                                                  $gimgid=$growinv["id"]; $gimg=$growinv["image"];$gphoto="../assets/images/product/70_75/".$gimg;
                                                                  $setdelurl="common/delobj.php?obj=productimage&ret=product&mod=1&id=".$gimgid."&prid=".$aid;
                                                                ?>
                                                               <li style="none"><img  src="<?php echo $gphoto;?>" data-imgid="$gimg"  data-id="$gimgid" width="150" alt=""> <a href="<?php echo $setdelurl; ?>" onclick="javascript:confirmationDelete($(this));return false;" class="remove-photo" title="Remove Photo" ><span class="glyphicon glyphicon-remove"></span></a></li> 
                                                                <?php }}?> 
                                                                -->
                                                                
                                                                
                                    							<!--<li><img src="images/placeholder.png" width="150" alt=""><span class="glyphicon glyphicon-remove"></span></li>
                                    							<li><img src="images/placeholder.png" width="150" alt=""><span class="glyphicon glyphicon-remove"></span></li>
                                    							<li><img src="images/placeholder.png" width="150" alt=""><span class="glyphicon glyphicon-remove"></span></li>
                                    							<li><img id="thumbnil" style="width:20%; margin-top:10px;"  src="" alt="image"/></li>-->
                                    						</ul>
                                        			<div class="col-lg-6 col-md-6 col-sm-12">
                            						    <h6 class="post-pg-title">Add Gallery Pictures</h6>
                            						    <hr> 
                                						<div class="input-group">
                                							<label class="input-group-btn">
                                								<span class="btn btn-primary btn-file btn-file">
                                								   <i class="fa fa-upload"></i> <input type="file" name="attachment2[]" i d="attachment2" style="display: none;" id="gallery-photo-add" multiple >
                                								</span>
                                							</label>
                                						<!--	<input type="text" class="form-control" readonly> -->
                                						</div>
                                						<span class="help-block form-text text-muted">
                                							Upload multiple pictures. 
                                						</span>
                                					</div>
                                    			
                                    				<div class="col-lg-12">
                                    					<div class="well">
                                    					
                                    						<div class="gallery" ></div>
                                    					</div>
                                    					
                                    				</div>
                                    		    </div>
              
             
              
               
              <!-- OLD POST TYPE 
               <div class="row" id="">
                <div class="post-type">
                    <?php /* $qry = "SELECT `id`, `title` FROM `postingboard` WHERE st=1";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0)
                    {
                         while($row = $result->fetch_assoc()) { if($row["id"] == 27){ ?>
                            <input type="checkbox" id="<?php echo $row["title"] ?>"name = 'type[]'  value="<?php echo $row["id"] ?>">
                            <label for="<?php echo $row["title"] ?>">Sell Now</label>
                        <?php } else { ?>
                        <input type="checkbox" id="<?php echo $row["title"] ?>" name = 'type[]' value="<?php echo $row["id"] ?>">
                            <label for="<?php echo $row["title"] ?>"><?php echo $row["title"] ?></label>
                    <?php }}} */ ?>
                </div>
              </div>
              
              -->
              
              
              <!-- NEW POST SELECTION -->
              
              
              <div class="row price-row">

                
                <div class="col-sm-3 price-col ">
                   
                  <h6> <input type="number" min="0"  class=" text-center" name="price" id="price" placeholder=" $ Price*" value = ""  > </h6>

                </div>
                
                <div class="col-sm-3 text-center qty-col">
                 <span>   <h6> <input type="number" min="0"  class=" text-center" name="quantity" id="quantity" placeholder="Quantity*" > </h6>  </span>
                </div>
                
                
              </div>
             
              
             <div class="row post-condition">
                  <br>
                <div class="negotiation-part col-sm">
                     <div class="post-header post-pg-title">
                         <h6>Negotiable <span class="req-sign">*</span> </h6>
                         <hr>
                     </div>
                     
              <div class="row">
                <div class="neg">
                    
                  <input type="radio" name="negotiable" id="negotiable" value = 1>
                  <label for="negotiable" style="margin-right:15px;">Yes</label>

                  <input type="radio" name="negotiable" id="non-neg" value = 0>
                  <label for="non-neg">No</label>

                </div>
              </div>
              </div>


                

                <div class= "col-divider"></div>


              
              
               <div class="authen col-sm">
                <div class="post-header post-pg-title">
                  <h6> Condition <span class="req-sign">*</span> </h6>
                  <hr>
                </div>
                
                <div class=" row">
                    <?php $qry = "SELECT `id`, `title` FROM `ItemCondition` WHERE st=1";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0)
                    {
                         while($row = $result->fetch_assoc()) { ?>
                         <div class="cod">
                         <input type="radio" id="<?php echo $row["id"] ?>" name="condition" value="<?php echo $row["id"] ?> " >
                         <label for="<?php echo $row["id"] ?>"><?php echo $row["title"] ?></label>
                         </div>
                    <?php }} ?>
                </div>

              </div>
              
              
              </div>
              
              <br>
              
              <h6 class="post-pg-title"> Select Category <span class="req-sign ">*</span> </h6>
              <hr>
             <div class="row">
            
              <div class="form-group col-sm-6">
                <select class="form-control" name = "category" id="category" required>
                  <option value="">Select category</option>
                  <?php $qry = "SELECT `id`, `title` FROM `catagory` WHERE st=1 and ischildonly = 0";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0)
                    {
                         while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["title"]?></option>
                  
                    <?php }} ?>

                </select>
                



              </div>
              <div class="form-group col-sm-6 ">
                <select class="form-control" name = "subcat" id="sub_category" required>
                  <option value=""> Sub category</option>
                </select>
                



              </div>
              
              </div>
              <br>

            <div class="description">
                <div class="form-group">
                  <label id="post-des" for="description">
                    <h6 > Add a description <span class="req-sign">*</span> </h6>
                   
                    
                  </label>
                  <hr>
                  
                  <textarea class="form-control" rows="5" id="description" name = "description" required ></textarea> <br>

                </div>


              </div>
              
              <!-- Product details block end -->

             <button type="button" class="action-button previous previous_button">Back</button>
            <button type="button" class="next action-button">Continue</button>
      </fieldset>
           
             
            <!--  <div class="row" id="post-method">
                <div class="post-header">
                  <h6>Post Type</h6>
                </div>
              </div> 
              <hr> -->
             
              
<!--

              <!-- fill in the details 
              <div class="post-header">
                <h5>Personal details</h5>
              </div>
              <hr>
              

              <div class="row" id="p-details">
                <div class="col-md">

                  <label for="name"> Name :</label>
                  <input type="text" class="form-control seller_name" id="name" name ="name" placeholder = "Name"  value="" required>


                </div>
                <div class="post-divider">

                </div>

                <!-- <div class="space"></div> 
                <div class="col-md">
                  <label for="phone"> Phone : </label>
                  <input type="tel" class="form-control seller_name" id="phone" name ="phone" value="+1" maxlength = "11" required>
                </div>
              </div>
              <br>
              <br>
              -->

        <fieldset>
    <!-- Shipping and payment block -->
    
             <h6 class="post-pg-title"> Select Location <span class="req-sign ">*</span> </h6>
            <hr>
        <div class="row">
            
              <div class="form-group col-sm-6 ">
                  <label for="country"> <h6>State</h6> </label>
                <select id="country" class="form-control" name = "state" required>
                  <option value="">Select State</option>
                  <?php $qry = "SELECT `id`, `title` FROM `state` WHERE country=2 AND st=1";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){ ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["title"]?></option>
                    <?php 
						}
					} 
					?>

                </select>
                



              </div>
              <div class="form-group col-sm-6 ">
				  <label for="district"><h6> City</h6></label>
                <select class="form-control" id="district" name = "tt" required>
                  <option value="">Select City</option>
                </select>
                
				 



              </div>
              <br>
              </div>

            <div class="del-met">
                 <br>
              <div class="post-header">
                <h6>Delivery Method <span class="req-sign">*</span></h6>
                <hr>
              </div>
              

              <div class="row" id="ship-met">
                 <?php $qry = "SELECT `id`, `title` FROM `deliverymode` WHERE st=1";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0)
                    {   
                         while($row = $result->fetch_assoc()) { if ($row["id"] == 1) {?>
                            <div class="c-pay">
                              <input type="checkbox"  id="ship" name="delivery[]" value="<?php echo $row["id"] ?>" >
            
                              <label for="ship"><?php echo $row["title"] ?></label>
            
                              
                                        </div>
                            <?php }else{ ?>
                            
                            <div class="cod">
                              <input type="checkbox" onclick="myFunc()" id="pick" name="delivery[]" value="<?php echo $row["id"]?>">
                              <label for="pick"><?php echo $row["title"] ?></label>
                              </div>
                              
                              </div>
                              
            </div>                  
                              <br>
                              
                              <!-- PICKUP ADDRESS BOX -->
                              <div class="conta iner">
                                <div class="form-group" id="pick">
            
                                  <div class="form-group" id="des-box">
                                    <label for="des-box">
                                      <h6>Address
                                      </h6>
                                    </label>
                                    <textarea class="form-control" rows="3" col="20" id="des-box" name = "daddress"></textarea> <br>
            
                                  </div>
            
                              
            
                              
                            </div>
                            

                            <?php }}} ?>

              </div>
              

            <!-- SERVICE DEL MET-->
            <div class="sdel-met">
                <div class="post-header">
                <h6>Delivery Method <span class="req-sign">*</span></h6>
                <hr>
              </div>
                <div class="row" id="serv-ship-met">
                
                            <div class="serv-c-pay">
                              <input type="checkbox"  id="serv-ship" name="delivery[]" value="1" >
            
                              <label for="serv-ship">I will Visit On site</label>
            
                              
                                        </div>
                          
                            
                            <div class="serv-cod">
                              <input type="checkbox" onclick="servmyFunc()" id="serv-pick" name="delivery[]" value="2">
                              <label for="serv-pick">Seeker Can Visit Me</label>
                              </div>
                              
                              </div>
            </div>
            <!-- SERVICE SEEKER VISIT BOX -->
           
             <div class="form-group" id="serv-des-box">
                                    <label for="serv-des-box">
                                      <h6>Address
                                      </h6>
                                    </label>
                                    <textarea class="form-control" rows="3" col="20"  name = "daddress"></textarea> <br>
            
                                  </div>
            
          <!-- PAYMENT METHOD -->
        <span class="payment-method">
              <div class="row" id="pay-method">
                <div class="post-header post-pg-title">
                  <h6 id="post-pay">Payment Method <span class="req-sign">*</span></h6>
                  
                </div>
                
                
              </div>
              <hr>
              
              <div class="row" id="pay-met">
              <?php $qry = "SELECT `id`, `title` FROM `paytype` WHERE st=1";
                    $result = $conn->query($qry); 
                    if ($result->num_rows > 0)
                    {
                         while($row = $result->fetch_assoc()) { ?>
    
                            <div class="cod">

                            <input type="checkbox" id="<?php echo $row["id"] ?>" name="pay[]" value="<?php echo $row["id"] ?>"  >
                            <label for="<?php echo $row["id"] ?>" id = "lab-<?= $row["id"] ?>"  ><?php echo $row["title"] ?></label>
                            
                            <span class="hidepay "> <i class="fas fa-info-circle"></i> By selecting Pay In person doesn't guarantee the final sell, as there are high chances that other buyers will purchase instantly by paying online </span>
                                
                            </div>
                            
                            
                            
                <?php }} ?>
              </div>

            </span>
              <br>
             <div ="agree"> 
              
                <input type="checkbox" name="agree" id="agree" required>
                <label for="agree"> I agree with the <a href="http://cms.bithut.com.bd/tnc.php">  terms & condition.  </a> <span class="req-sign">* </span>  </label>
                    
              </div>
              
              <br>


             
              <div id="submission">
               <?php
$chf = true;

if($_SESSION["cms_user"] != ''){
    $qry1 = "SELECT `id`  FROM `postitem` WHERE st = 1 AND cmsuser = ".$_SESSION["cms_user"]; 
    $result1 = $conn->query($qry1); 
    $total_post = $result1->num_rows;
    
    
    $qry1 = "SELECT a.`id`, a.`limits` limits FROM `pakagesetup` a, cmsuser b WHERE a.`pakagesetup` = b.package AND a.`countryid` = 2 AND b.id = ".$_SESSION["cms_user"];
            $result1 = $conn->query($qry1); 
            $row1 = $result1->fetch_assoc();
            $package_limit = $row1["limits"];
            $limits = $row1["limits"];
            
            if($row1["limits"] <= $total_post){
                $chf = false;
            }
}

?>            
                
                <button class="btn btn-primary btn-block text-center" <?php if (!$chf) { ?> data-toggle="modal" data-target="#exampleModalCenter" type = "button" <?php } else { ?>  type="submit" <?php } ?>>Post Ad</button>
                        
                        
                              
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <p class="package-modal-p"> Hi! You've reached your limit (<?= $package_limit ?> posts) to continue please upgrade your package! </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="package.php" class="btn btn-primary"> Package details</a> 
      </div>
    </div>
  </div>
</div>


              </div>
              
              <!-- Shipping n payment block ends -->
                <button type="button" class="action-button previous previous_button">Back</button>
        <a href="#" class="action-button">Finish</a>
      </fieldset>
      <!-- 3rd fldset end -->

            </div> <!-- Post AD block end -->
            <br>
          </div> <!-- post-ad row -->
        </div> <!-- post ad row container -->

      </div> <!-- Post ad content base margin end -->
    </div> <!-- Main container end b4 base margin -->
</div>



  </form>

   <?php include "./footer.php" ?>

  <script>
    $(document).ready(function () {
        
        //<!--agree -->
        
        $("input[id=agree]:checkbox").change(function(){
           
           if($("#agree").is(':checked')){
               swal({
  
  text: "I declare that this item(s) is not hazardous and unlawful prohibited item. This item does not contain vulgar, threat, weapon, hazardous liquid. I do not intend to sell or exchange for money laundering purposes. Unlawful activities will be shared to authorities. I certify that this product will not violate CMS terms and violation to this terms and condition may result in account suspension.",
  icon: "info",
  button: "I agree",
});
              //alert("")
           } 
        });
        

      $("#myDIV").attr('style', 'display:none;');

      $("input[id = ship]:checkbox").change(function () {


        if ($('#ship').is(':checked')) {
          $("#myDIV").attr('style', 'display:block;');
        } else {
          $("#myDIV").attr('style', 'display:none;');
        }
      });

      //attr('checked', true);

    });

  </script>

  <script>
    $(document).ready(function () {

      $("#des-box").attr('style', 'display:none;');
       $("#serv-des-box").attr('style', 'display:none;');
      

      $("input[id = pick]:checkbox").change(function () {


        if ($('#pick').is(':checked')) {
          $("#des-box").attr('style', 'display:block;');
         
        } else {
          $("#des-box").attr('style', 'display:none;');
        }
      });
      
       $("input[id = serv-pick]:checkbox").change(function () {


        if ($('#serv-pick').is(':checked')) {
          $("#serv-des-box").attr('style', 'display:block;');
         
        } else {
          $("#serv-des-box").attr('style', 'display:none;');
        }
      });

     
		
		
		//attr('checked', true);
		
		
		
		
		
		//############## district laoder
//call area cmb on district change		
	$('#country').change(function(){
		country = $(this).find("option:selected" ).val();
		load_district(country);
	});	
		
		function load_district(country){
			$.ajax({
				
				url:"core/phpajax/load_district.php",
				method:"POST",
				data:{state:country},
				beforeSend: function(){
					$('#district').html('<option>Loading divisions...</option>');
				},				
				success:function(data){
					$('#district').html(data);
					
					//alert(data);

				}				
		});
		
	 }
		
		
	$('#category').change(function(){
		category = $(this).find("option:selected" ).val();
		
		load_subcategory(category);
	});			
		function load_subcategory(category){
			$.ajax({
				
				url:"core/phpajax/load_subcategory.php",
				method:"POST",
				data:{parent:category},
				beforeSend: function(){
					$('#sub_category').html('<option>Loading sub categories...</option>');
				},				
				success:function(data){
					$('#sub_category').html(data);
					
					//alert(data);

				}				
		});
		
	 }
		
		
		

    });

  </script>
  
  
  <script>
      $(document).ready(function(){
          
          
      // alert("hh");
        //  alert("hhhh");
          //pay[]
         
                 
        /*$("input[name*='pay']").change(function(){
            var val = $(this).val();
            if(val == 6){
                alert("sss")
            }
        }); */
          
          
         // $(".auc-box").attr('style', 'display:none;');
         // $('.price-col').attr('style', 'display:block');
          
          $("input[name=auction]:checkbox").change(function () {
              
              
              if ($('#auction').is(':checked') ) {
                   
                                   //  $('.price-col').attr('style', 'display:none;'); 
                                  if( $("#buy-now").is(":checked") || $("#exchange").is (":checked")) {
                                  
                                          //  $(".price-col").attr('style', 'display:block');
                                  
                                  
                                              
                                              $(".negotiation-part").attr('style', 'display: block;');
                                                if( $("#buy-now").is(":checked") || $("#exchange").is (":checked")) {
                                                    $("#price").prop("required", true);
                                                   //  $(".price-col").attr('style', 'display:block');
                                                 
                                              }
                                               
                                              else {
                                                  if ($("#buy-now").is(":checked") || ($("#exchange").is(":checked"))) {
                                                      $("#price").prop("required", true);
                                                    //   $(".price-col").attr('style', 'display:block');
                                                   //   $(".auc-box").attr('style', 'display:block;');
                                                  }
                                                  else { 
                                                      $("#price").prop("required", false);
                                                   
                                                  }
                                                  
                                              }
                                  
                                 
                              }
                             
                                else
                                  {
                                    $(".negotiation-part").attr('style', 'display: none;');
                                   // $(".auc-box").attr('style', 'display:block;');
                                   // $('.price-col').attr('style', 'display:none');
                                    $("#price").prop("required", false);
                                   // alert("gg");
                                  }
                         }
         
            else {
                 $(".negotiation-part").attr('style', 'display: block;');
               // $(".auc-box").attr('style', 'display:none;');
              //  $('.price-col').attr('style', 'display:block');
            }
          })
      } )
  </script>
  
  
  <script>
      $(document).ready(function(){
          
           $(".auc-box").attr('style', 'display:none;');
          $("input[name=exchange]:checkbox").change(function () {
              
              
              if ($('#exchange').is(':checked') ) {
                   $(".negotiation-part").attr('style', 'display: block;');
                   
                    $(".price-col").attr('style', 'display: block');
                    
                   
                  
              if ($('#buy-now').is(':checked') ){
                  $(".negotiation-part").attr('style', 'display:block;');
                  // $(".auc-box").attr('style', 'display:none;');
                    $(".price-col").attr('style', 'display: block');
                    
                
                    
                  //alert("b");
              }
               if ($('#auction').is(':checked') ){
                  $(".auc-box").attr('style', 'display:block;');
                  $(".price-col").attr('style', 'display: block');
                  //alert("c");
                        
                     
              }
              else
              {
                $(".negotiation-part").attr('style', 'display: block;');
                $(".auc-box").attr('style', 'display:none;');
               // alert("gg");
              }
            }
         
            else {
            
                if($("#buy-now").is(":checked")) {
                    
                     $(".negotiation-part").attr('style', 'display: block');
                  $(".price-col").attr('style', 'display: block');
                
                }
            
                 $(".negotiation-part").attr('style', 'display: none');
                  $(".price-col").attr('style', 'display: none');
               // $(".auc-box").attr('style', 'display:block;');
            }
          })
      } )
  </script>
  
  
  <script>
      $(document).ready(function(){
          
          $(".auc-box").attr('style', 'display:none;');
          
          
          $("input[name=buy-now]:checkbox").change(function () {
              
              
              if ($('#buy-now').is(':checked') ) {
                               $(".negotiation-part").attr('style', 'display: block;');
                               // $(".auc-box").attr('style', 'display:none;');
                                 $(".price-col").attr('style', 'display: block');
                                // alert("sell");
                  
                                  if ($('#exchange').is(':checked') ){
                                        $(".negotiation-part").attr('style', 'display:block;');
                                         $(".auc-box").attr('style', 'display:none;');
                                          $(".price-col").attr('style', 'display: block');
                                         //alert("b");
                                         }
                                  else if ($('#auction').is(':checked') ){
                                          $(".auc-box").attr('style', 'display:block;');
                                           $(".price-col").attr('style', 'display: block');
                                    
                              }
                                    else
                                          {
                                                 $(".negotiation-part").attr('style', 'display: block;');
                                                 $(".auc-box").attr('style', 'display:none;');
                                                  $(".price-col").attr('style', 'display: block');
                                                     // alert("gg");
                                                  }
                          
                          
                            }
         
                    else {
                    
                            if($("#exchange").is(':checked')) {
                            
                                $(".negotiation-part").attr('style', 'display: block');
                                $(".price-col").attr('style', 'display: block');        
                            
                            }
                    
                         $(".negotiation-part").attr('style', 'display: none;');
                          $(".price-col").attr('style', 'display: none');
                       // $(".auc-box").attr('style', 'display:block;');
                    }
          })
      } )
  </script>
  
  
  
  
  
  <!-- RENT BOX -->
 <script>
    $(document).ready(function () {

      $(".rent-box").attr('style', 'display:none;');



      $("input[id=rent]:radio").change(function () {


        if ($('#rent').is(':checked')) {
            //$(".neg").attr('style', 'display: block;');
          $(".rent-box").attr('style', 'display:block;');
          $(".don-op").attr('style', 'display:none;');
           $(".sell-op").attr('style', 'display:none;');
            $('.auc-box').attr('style', 'display:none');
            $('.price-col').attr('style', 'display:none');
              $('.sdel-met').attr('style', 'display:none');
                $("#price").prop('required',false);
              $('.neg').attr('style', 'display: block');
              
               $('.payment-method').attr('style', 'display: block');
                $('#card-serv').attr('style', 'display:none');
                $('.gserv-row').attr('style', 'display:none');
           $('.wserv-row').attr('style', 'display:none');
             $('.price-row').attr('style','display:block');
            $('.del-met').attr('style', 'display:block');
         
             
            
            
            //CHECKBOX-UNCHECK
           $("#buy-now").prop("checked", false);
          $("#auction").prop("checked", false);
          $("#donation").prop("checked", false);
          $("#giveaway").prop("checked", false);
          $("#exchange").prop("checked", false);
          $("#gserv").prop("checked", false);
          $("#wserv").prop("checked", false);
          
          //required
          
           $("#quantity").prop("required", true);
          
        } else {
          $(".rent-box").attr('style', 'display:none;');
          $('.price-col').attr('style', 'display: block');
          //$("#brc").prop('required', false);//change tr
         // alert("hh"); NOT CAPTURING
        }
      });



    });
  </script>
  
  
  
  
  
   <!-- Auction BOX -->
  <!-- <script>
    $(document).ready(function () {

      $(".auc-box").attr('style', 'display:none;');
       $(".negotiation-part").attr('style', 'display: block;');



      $("input[name=auction]:checkbox").change(function () {


        if ($('#auction').is(':checked')) {
            $(".negotiation-part").attr('style', 'display: none;');
            $(".auc-box").attr('style', 'display:block;');
            
         
        }
        
       
        
        else {
          $(".auc-box").attr('style', 'display:none;');
          $(".negotiation-part").attr('style', 'display: block;');
        }
      });



    });
  </script>
  
  
  -->
  
  
  
  
  
  
  <!-- IMAGE PREVIEW -->
   <script>

        var i = 0;
        function myfun() {
            i++;

            var x = document.getElementById("uploadedhere").files[0];
            var currentimage1 = document.getElementById("changeimage1");
             var currentimage2 = document.getElementById("changeimage2");
             var currentimage3 = document.getElementById("changeimage3");
             var currentimage4 = document.getElementById("changeimage4");
             var currentimage5 = document.getElementById("changeimage5");
             var currentimage6 = document.getElementById("changeimage6");


            var reader = new FileReader();

            reader.onload = function () {

                if (i == "1") {
                    currentimage1.src = reader.result;
                }

                if (i == "2") {
                     currentimage2.src = reader.result;
                 }
                 if (i == "3") {
                     currentimage3.src = reader.result;
                 }
                 if (i == "4") {
                     currentimage4.src = reader.result;
                 }
                 if (i == "5") {
                     currentimage5.src = reader.result;
                 }
                 if (i == "6") {
                     currentimage6.src = reader.result;
                 }


            }




            reader.readAsDataURL(x);
        }












    </script>
    
    
  
    
    
    <script>
    $(document).ready(function () {
        
       
        
         $('.don-op').attr('style', 'display:none');
        
       // $('.rent-op').attr('style', 'display:none');
         // $('.don-op').attr('style', 'display:none');
          $('.neg').attr('style', 'display:block');
          

      $("input[id=post-met-1]:radio").change(function () {

        if ($('#post-met-1').is(':checked')) {
            //alert("pm1");
          $('.sell-op').attr('style', 'display:block');
         $('.rent-box').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
          $('.sdel-met').attr('style', 'display:none');
          $("#price").prop("required", true);
          $('.price-col').attr('style', 'display: block');
           $('.negotiation-part').attr('style', 'display: block');
         // alert("ss");
         $('.payment-method').attr('style', 'display: block');
          $("#card-serv").attr('style', 'display:none');
          $('.gserv-row').attr('style', 'display:none');
           $('.wserv-row').attr('style', 'display:none');
            $('.price-row').attr('style','display:block');
            $('.price-col').attr('style','display:block');
            $('.qty-col').attr('style', 'display:block');
         
          
          //check uncheck
            
            $("#donation").prop("checked", false);
          $("#giveaway").prop("checked", false);
           $("#gserv").prop("checked", false);
          $("#wserv").prop("checked", false);
          
          //required
          $("#quantity").prop("required", true);
           
          
         
        
        //UNCHECK ATTEMPT
        
        //  $("input[id=rent]:radio").attr("checked", false);
         
         // $("input[id=donation]:checkbox").attr("checked", false);
          //$("input[id=giveaway]:checkbox").attr("checked", false);
          //($('#rent').(':unchecked'))
          
        
          
         // else($('#auction').is(':checked') && $('.buy-now').is(':checked') ){
             
           //     alert("hello");
             
             // $('.neg').attr('style', 'display: block');
              
    //      }
          

            
        
        } else {
        //  $('.rent-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
          $('.sell-op').attr('style', 'display:none');
           $("#price").prop("required", false);
            $('#card-serv').attr('style', 'display:block');
          
        }

      })
    });
  </script>
 
  
  



 <!-- OLD RENT POST_MET_2 <script>
    $(document).ready(function () {
         $('.don-op').attr('style', 'display:none');

      $("input[id=post-met-2]:radio").change(function () {

        if ($('#post-met-2').is(':checked')) {
            //$(".neg").attr('style', 'display: block;');
         // $('.rent-op').attr('style', 'display:block');
           $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
          

        } else {
          $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
       //   $('.rent-op').attr('style', 'display:none');
        }

      })
    });
  </script> -->
 
   <script>
    $(document).ready(function () {
         $('#card-serv').attr('style', 'display:none');
          $('.wserv-row').attr('style', 'display:none;');
          //  alert("hh");
            
      $("input[id=serv]:radio").change(function () {

        if ($('#serv').is(':checked')) {
            //$(".neg").attr('style', 'display: block;');
         // $('.rent-op').attr('style', 'display:block');
          $('#card-serv').attr('style', 'display:block');
           $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
           $(".rent-box").attr('style', 'display:none;');
            $(".auc-box").attr('style', 'display:none;');
            $('.post-condition').attr('style','display:none');
            $('.price-row').attr('style','display:none');
            $('.del-met').attr('style', 'display:none');
            $('.sdel-met').attr('style', 'display:block');
            
            //check uncheck
         $("#buy-now").prop("checked", false);
          $("#auction").prop("checked", false);
           $("#exchange").prop("checked", false);
          $("#donation").prop("checked", false);
           $("#giveaway").prop("checked", false);
            
            
              $("input[id=gserv]:radio").change(function () {
                if($('#gserv').is(':checked')){
                    //alert("gs");
                    $('.gserv-row').attr('style', 'display:block;');
                    $('.wserv-row').attr('style', 'display:none;');
                }
                else{
                    $('.gserv-row').attr('style', 'display:none;');
                }
              });
               $("input[id=wserv]:radio").change(function () {
                if($('#wserv').is(':checked')){
                    //alert("ws");
                    $('.wserv-row').attr('style', 'display:block;');
                    $('.gserv-row').attr('style', 'display:none;');
                }
                else{
                    $('.wserv-row').attr('style', 'display:none;');
                }
              });

        } else {
             $('#card-serv').attr('style', 'display:none');
          $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
       //   $('.rent-op').attr('style', 'display:none');
        }

      })
    });
  </script>

  <script>
    $(document).ready(function () {
        
         $('.don-op').attr('style', 'display:none');
        //  $('.price-col').attr('style', 'display: block');
        

      $("input[id=post-met-3]:radio").change(function () {

        if ($('#post-met-3').is(':checked')) {
             $("#negotiable").prop("required", false);
            //$(".neg").attr('style', 'display: block;');
          $('.don-op').attr('style', 'display:block');
          $('.rent-box').attr('style', 'display:none');
          $('.sell-op').attr('style', 'display:none');
           $('.auc-box').attr('style', 'display:none');
        $('.sdel-met').attr('style', 'display:none');
          $("#card-serv").attr('style', 'display:none');
           $('.gserv-row').attr('style', 'display:none');
           $('.wserv-row').attr('style', 'display:none');
             $('.price-row').attr('style','display:block');
            $('.del-met').attr('style', 'display:block');
           
           //check uncheck
          $("#buy-now").prop("checked", false);
          $("#auction").prop("checked", false);
          $("#exchange").prop("checked", false);
          $("#gserv").prop("checked", false);
          $("#wserv").prop("checked", false);
          
           //check uncheck end
           $("#price").prop("required", false);
           $('.negotiation-part').attr('style', 'display: none' );
          //  $('.post-condition').attr('style', 'display: none' );
           $('.price-col').attr('style', 'display: none');
          // $("#price").prop("required", false);
           $('.payment-method').attr('style', 'display: none'); 
            $("#card-serv").attr('style', 'display:none');
            
           
           //required
            $("#quantity").prop("required", true);
         


        } else {

        //   $('.rent-op').attr('style', 'display:none');
          $('.sell-op').attr('style', 'display:none');
           $('.don-op').attr('style', 'display:none');
           $('.neg').attr('style', 'display: block' );
            $('.price-col').attr('style', 'display: block');
            //$("#brc").prop("required", false);//change true
           
        }

      })
    });
  </script>


<!-- NON NEG NO -->


<script>
// Select your input element.
var num = document.getElementById('quantity');

// Listen for input event on numInput.
num.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
   
}

    
</script>

<!-- Negative -->
<script>
    $(document).ready(function(e) {
        var price = document.getElementById('price');

        // Listen for input event on numInput.
        price.onkeydown = function(e) {
            if(!((e.keyCode > 95 && e.keyCode < 106)
              || (e.keyCode > 47 && e.keyCode < 58) 
              || e.keyCode == 8)) {
                return false;
            }
        }
    });
</script>


<!-- NEW IMAGE PORT -->

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
  
 $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="gallery-im" >')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});



</script>


<script>
    $(document).ready(function(){
        
            $("#price").prop("required", false);//change tr
            
            
         $( "#post-ad-form" ).submit(function( event ) {
             
             
             if (($("input[name*='del']:checked").length)<=0) {
                 swal("Error!", "You must check at least 1 Delivery Method!", "error");
                 
                 return false;
    }
    
         if (($("input[name*='pay']:checked").length)<=0) {
             swal("Error!", "You must check at least 1 Payment Method", "error");
                 
                 
                 return false;
    }
    
   
   
    
    
             
             //  alert("test");
             
        if (($("#post-met-1").is(':checked'))||($("#post-met-3").is(':checked')) || ($("#rent").is(':checked')) || ($("#serv").is(':checked')) ){
          //alert("hh");
           // return false;
            if ($("#post-met-1").is(":checked")) {
                
                
               // $(".auc-box").attr('style', 'display:none;');
                $("#price").prop("required", true);
               // alert("boom");
                if($('#buy-now').is(':checked')|| ($('#auction').is(':checked')) || ($('#exchange').is(':checked')) ){
                    
                  //alert("k");
                   
                 
                   
                    $( "#post-ad-form" ).submit();
                   // alert('hoise');
                   
                
                  
                   
                }
                else {
                    required: true;
                    swal("Error!", "Sell type required", "error");
                    
                    return false; 
                }
            }
             
             if($("#post-met-3").is(':checked')) {
               // alert("don-1 dhorse");
              $("#price").prop("required", false);
               if($('#donation').is(':checked') || ($('#giveaway').is(':checked')) ){
                     //alert('donat hoise');
                     $("#price").prop("required", false);
                     
                     $( "#post-ad-form" ).submit();
                  
                   
                     //$("#price").val("0");
                  //   alert($("#price").val());
                }
                else {
                   // alert('donate hoyei gelo');
                   required: true;
                    $("#price").prop("required", false);//change tr
                     swal("Error!", "Donation type required", "error");
                   
                   
                   return false;
                }
            }
            
            if($('#serv').is(':checked')) {
               
                if($("#gserv").is(':checked') || ($("#wserv").is(':checked'))) {
                     $("#price").prop("required", false);
                      $("#negotiable").prop("required", false);
                        if($("#serv-pick").is(':checked') || $("#serv-ship").is(':checked')) {
                             $( "#post-ad-form" ).submit();
                        }
                        
                        else{
                            required:true;
                            swal("Error!", "Select one delivery method", "error");
                          
                        }
                      
                }
                else {
                   
                   required: true;
                    $("#price").prop("required", false);//change tr
                    swal("Error!", "Select at least one service type", "error"); 
                   
                   
                   return false;
                }
            }
            
            
            else {
              // alert("rent") ;
               $("#price").prop("required", false);
               
                 $( "#post-ad-form" ).submit();
                
            }
        }
        else {

        required: true;
        swal("Error!", "Select at least one post type", "error");
       
       return false;
       
        }
        
        
    });
    
    
    
    });
    
</script>

<script>
      $(document).ready(function(){
          
           $("#negotiable").prop("required", false);
          
          $("input[name=buy-now]:checkbox").change(function () {
              
              
              if ($('#buy-now').is(':checked') ) {
                  
                   $("#price").prop("required", true);
                   $("#negotiable").prop("required", true);
                    
                  if ($('#buy-now').is(':checked') && ($("#auction").is(':checked')) ) {
                      
                       $("#price").prop("required", true);
                       $("#negotiable").prop("required", true);
                  }
                  
                  if ($("#buy-now").is(":checked") && ($("#exchange").is(":checked"))){
                       $("#price").prop("required", true);
                       $("#negotiable").prop("required", true);
                  }
                  
            }
         
            else {
                if($("#exchange").is(":checked")){
                    
                    $("#price").prop("required", true);
                    $(".price-col").attr('style', 'display: block'); 
                    $(".negotiation-part").attr('style', 'display: block'); 
                    
                    
                }
                else {
                    $("#price").prop("required", false);
                     $("#negotiable").prop("required", false);
                }
            }
          })
      } )
  </script>
  
  <script>
      $(document).ready(function(){
          
           $("#negotiable").prop("required", false);
           
          $("input[name=exchange]:checkbox").change(function () {
              
                //$("#brc").prop("required", true);
              
              if ($('#exchange').is(':checked') ) {
                  
                   $("#price").prop("required", true);
                    $("#negotiable").prop("required", false);
                    
                  if ($('#exchange').is(':checked') && ($("#auction").is(':checked')) ) {
                      
                       $("#price").prop("required", true);
                        $("#negotiable").prop("required", false);
                  }
                  
                  if ($("#buy-now").is(":checked") || ($("#exchange").is(":checked"))){
                       $("#price").prop("required", true);
                  }
                  
            }
         
            else {
                if($("#buy-now").is(":checked")){
                     $("#price").prop("required", true);
                     $(".price-col").attr('style', 'display:block'); 
                     $(".negotiation-part").attr('style', 'display: block'); 
                }
                else {
                    $("#price").prop("required", false);
                }
            }
          })
          
      })
     
  </script>

<!-- AUC BOX -->

  <script>
       $(document).ready(function() {
          // alert("jh");
           $(".auc-box").attr("style", "display: none;");
            
                $("input[id=auction]:checkbox").change(function () {
                  
                        if($("#auction").is(":checked")){
                            
                           
                            $(".auc-box").attr("style", "display:block;") ;
                            $(".price-col").attr("style", "display:none;"); 
                          
                          if($("#buy-now").is(":checked") || $("#exchange").is(":checked")) {
                              
                                 $(".auc-box").attr("style", "display:block;") ;
                                $(".price-col").attr("style", "display:block;"); 
                                
                          }
                          
                          else {
                          
                                 
                          
                          }
                          
                         
                          
                        }
                        
                        else {
                            $(".auc-box").attr("style", "display:none;") ;
                        }
                    
                })
           
       });
      
  </script>      
  
  <!--abandoned script
   <script>
    $(document).ready(function () {
         $('#card-serv').attr('style', 'display:none');
          $('.gserv-row').attr('style', 'display:none;');

      $("input[id=serv]:radio").change(function () {

        if ($('#serv').is(':checked')) {
            //$(".neg").attr('style', 'display: block;');
         // $('.rent-op').attr('style', 'display:block');
          $('#card-serv').attr('style', 'display:block');
           $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
           $(".rent-box").attr('style', 'display:none;');
            $(".auc-box").attr('style', 'display:none;');
            
              $("input[id=gserv]:radio").change(function () {
                if($('#gserv').is(':checked')){
                    $('.gserv-row').attr('style', 'display:block;');
                }
                else{
                    $('.gserv-row').attr('style', 'display:none;');
                }
              });
              
        //check uncheck
        $("#buy-now").prop("checked", false);
          $("#auction").prop("checked", false);
          $("#donation").prop("checked", false);
          $("#giveaway").prop("checked", false);
          $("#exchange").prop("checked", false);
          

        } else {
             $('#card-serv').attr('style', 'display:none');
          $('.sell-op').attr('style', 'display:none');
          $('.don-op').attr('style', 'display:none');
       //   $('.rent-op').attr('style', 'display:none');
        }

      })
    });
  </script> 
  -->
  
  <!-- NEW POST BLOCK SCRIPT -->
  <script>
      (function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
   
    /*Function Calls*/  
    verificationForm ();
    phoneNoselect ();
    nice_Select ();
})(jQuery);
  </script>
       




</body>

</html>