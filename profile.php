<?php 
require "core/common/conn.php";
session_start();
$atid = $_GET["id"];

$qry1 = "SELECT `id`  FROM `postitem` WHERE cmsuser = ".$atid; 
$result1 = $conn->query($qry1); 
$total_post = $result1->num_rows;
    
    
$qry1 = "SELECT `id`  FROM `Posthist` WHERE cmsuser = ".$atid; 
$result1 = $conn->query($qry1); 
$total_pur = $result1->num_rows;
    
    
$f = false;

if($_SESSION["cms_user"] == $atid){
    $f = true;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile-CashMyStash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bit-style.css">
    <link rel="stylesheet" href="./assets/css/productlist.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bit-style.css" />
    <link rel="icon" href="./img/favicon.png" type="image/gif" sizes="40x16">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css" />
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    
      <style>
.button {
  background-color: #327be9;
  
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
 
  cursor: pointer;
  border-radius: 5px;
  border: 0.1px solid #327be9 
}
#pro-post-boost-btn {
    color: white;
}

.button1 {padding: 5px 12px;}

</style>
    
</head>

<body>
    <?php include "./navbar.php" ?>



    <div class="section-divider"></div>



<?php $qry = "SELECT `Name`, `dob`, `gender`, `Address`, `contactno`, `photo`,`email`, `id`,`status`, state, district FROM `cmsuser` WHERE st = 1 and id = ".$atid;
                               $result = $conn->query($qry); 
                                if ($result->num_rows > 0){ 
                                  while($row = $result->fetch_assoc()){ $district = $row["district"]?>


    <div class="container" style="background-color:white; border-top:0px solid #44546A;">

        <div class="content-base-margin">



            <div class="row" id="pro-ab-field">
                <div class="col-md-3" id="img-box">
                    <img src="./img/profile/<?php echo $row["photo"] ?>" class="img-fluid pro-dp" alt="">
                </div>
                <div class="col-md-6 user-display ">
                    <h4 class="pro-name"><?php echo $row["Name"] ?></h4>
    <?php if($row["state"] != ''){
              $qry1 = "SELECT `ID`, `title` FROM `state` WHERE `ID` = ".$row["state"];
              $result1 = $conn->query($qry1);
              $row1 = $result1->fetch_assoc();
              
              $qry2 = "SELECT `ID`, `title` FROM `district` WHERE `ID` = ".$row["district"];
              $result2 = $conn->query($qry2);
              $row2 = $result2->fetch_assoc();
          ?>
                                   
                    <h6 class="pro-location"><?= $row1["title"] ?>, <?= $row2["title"] ?></h6>
        <?php } ?>

                    <div class="row user-info">
                        <p class="user-info"><i class="fas fa-shopping-bag side-user"> </i><span> <?php echo $total_post ?> Posts </span> </p>
                        <p class="user-info"> <i class="fas fa-shopping-cart side-user"></i><span> <?php echo $total_pur ?> Purchased </span> </p>
                        <!-- <p class="user-info"> <i class="fas fa-camera head-camera"></i><span> 0 Photos </span> </p> -->



                    </div>
                    <div class="pro-des">
                        <p><?= $row["status"] ?></p>
                    </div>
                    

                </div>
        <?php if($f) { ?>
                <div class="col-md-3">
                    

                        <div class=" subs-menu btn btn-primary edit-btn "> <i class="fas fa-pen side-pen "
                                style="color: white;">
                            </i>
                            Edit Profile
                        </div>

                    
                </div>
      <?php } ?>          

            </div>
            <div class=" row section-dividers"></div>

            <div class="row">

                <div class="col-md-3" id="side-menu">
                    <ul class="sub-menu pro-menu">
                        <a myclass="pro-about" href="javascript:void(0)">
                            <li>
                                <span>
                                    <h6> <i class="fas fa-user side-user "> </i> <span>Overview </span> </h6>
                                </span>
                            </li>
                        </a>
                        <a myclass="offers" href="javascript:void(0)">
                            <li>
                                <h6> <i class="fas fa-shopping-bag side-user"></i> <span>Items Posted</span></h6>
                            </li>
                        </a>
                <?php if($f) { ?>
                        <a myclass="pro-purchased" href="javascript:void(0)">
                            <li>
                                <h6> <i class="fas fa-shopping-cart side-user"></i> <span>Items Requested</span></h6>
                            </li>
                        </a>
                         <a myclass="pro-connection" href="javascript:void(0)">
                            <li>
                                <h6> <i class="fas fa-heart pro-heart side-user">
                                    </i> Wishlist</h6>
                            </li>
                        </a>
                        

                        <a myclass="pro-password" href="javascript:void(0)">
                            <li>
                                <h6> <i class="fas fa-key side-user"></i> <span>Change Password</span></h6>
                            </li>
                        </a>
                        
                        <a myclass="pro-connection" href="./login.php">
                            <li>
                                <h6> <i class="fas fa-lock pro-lock side-user">
                                    </i> Log out</h6>
                            </li>
                        </a>
                        
                <?php } ?>

                    </ul>

                </div>



                <div class="col-md-9 pro-content">


                    <span class="pro-about">
                        <h4> About <?php echo $row["Name"];  ?></h4>
                        <hr>
                        <br>
                        <div class="row ">
                            <div class="col-3">
                                <h6 style="color: rgb(14, 145, 233);">Post Details</h6>
                                <hr>
                            
                                <div class="container" id="post-details">
                                    <p class="para">Posts: <?php echo $total_post ?> </p>
                                    <p class="para">Sold: 2 </p>
                                    <p class="para">Unsold: 3 </p>
                                </div>

                            </div>
                            <div class="col-3">
                                <h6 style="color: rgb(14, 145, 233);">Purchased Details</h6>
                                <hr>

                                <div class="container" id="post-details">
                                    <p class="para">Purchases : <?php echo $total_pur ?> </p>
                                    <p class="para">Sold: 2 </p>
                                    <p class="para">Active Post: 3 </p>
                                </div>

                            </div>
                            <div class="col-6">
                                <h6 class="text-center" style="color: rgb(14, 145, 233);">Saved Addres</h6>
                                <hr>
                                <div class="row">

                                    <div class="col-6 pro-add">

                                        <p> <?php echo $row["Address"] ?></p>

                                    </div>

                                   <!-- <div class="col-6 pro-add">

                                        <p> /* <?php echo $row["Address"] ?> */ </p> 

                                    </div>
                                    -->
                                </div>


                            </div>
                        </div>
                    </span>

                    <span class="offers">
                        <div class="container">
                            <h4>Items Posted</h4>
                            <hr>


                        <div style=" min-width: 450px ;  height: 400px; overflow:auto;">
                            <table class="tables price-offer  table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>My Post</th>
                                        <th>Type</th>
                                <?php if($f){ ?>
                                        <th>Response</th>
                                        <th>Details</th>
                                <?php } ?>
                                        <th> Asking Price </th>
                                        <th> Final Price </th>
                                        <th> Post Date </th>
                                <?php if($f) { ?>
                                        <th> Status </th>
                                        <th> Edit</th>
                                        <th> Boost</th>
                                <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>

<?php $qry1 = "SELECT a.`ID` id, a.`title`, c.`title` category, d.`title` subcategory, e.`title` state, f.`title` district, a.`otherboard` otherboard, a.`deliverymode`, a.`paymode`,  g.`title` conditions, a.`qty`, a.`offerprice`, a.`description`, a.`isnagotiable`, a.`postusernm`, a.`postusercontact`,  a.`postuseraddress`, b.photo photo,a.makedt makedt, a.st st FROM `postitem` a, postitemphoto b, catagory c, catagory d, state e, district f, ItemCondition g  WHERE (a.st = 0 or a.st = 1) and b.postid= a.id 
        and b.isfeatured = 1 and c.id = a.category and d.id = a.subcategory and e.id = a.boardtype and f.id = a.zipcode and g.id = a.conditions and a.cmsuser = ".$atid." ORDER BY a.makedt DESC";
                               $result1 = $conn->query($qry1);
                                if ($result1->num_rows > 0){
                                    $count = 1;
                                    
                                  while($row1 = $result1->fetch_assoc()){
                                    $response = 0;
                                    $date = substr($row1["makedt"],0,10);
                            $qry2 = "SELECT `ID` FROM `Posthist` WHERE postid = ".$row1["id"];
                            $result2 = $conn->query($qry2); 
                            $response = $result2->num_rows;
                                    $postitem = '';
                                    $post = explode(",", $row1["otherboard"]);
                                    foreach($post as $value){
                                        $qry2 = "SELECT `id`, `title` FROM `postingboard` WHERE id = ".$value;
                                        $result2 = $conn-> query($qry2);
                                        while ($row2 = mysqli_fetch_assoc($result2)){
                                            $postitem .= $row2["title"];
                                            $postitem .= ", ";
                                            
                }
        } 
    ?>
                                    <tr>
                                        <td class="pro-type-b pro-td"><?php echo $count ?></td>
                                    <?php if($f) { ?>
                                        <td class="pro-td"><a href = "buy_sell.php?id=<?php echo $row1["id"] ?>"> <?php echo $row1["title"] ?> </a></td>
                                    <?php } else { ?>
                                        <td class="pro-td"><a href = "buy_sell.php?id=<?php echo $row1["id"] ?>"><?php echo $row1["title"] ?> </a></td>
                                    <?php } ?>
                                        <td class="pro-type-b pro-td"><?php echo $postitem ?></td>
                                    <?php if($f) { ?>
                                        <td><?php echo $response ?></td>
                                        <td><a href = "post_details.php?id=<?php echo $row1["id"] ?>&msg=<?= $atid ?>&n=<?= $row1["title"]?>"> check responses </a></td>
                                    <?php } ?>
                                        <td><input type="number" name="ask-price" id="ask-price" value="<?php echo $row1["offerprice"] ?>"></td>
                                        <td><input type="number" name="ask-price" id="ask-price" value="$220"></td>
                                        <td class="pro-type-b pro-td"><?php echo $date ?></td>
                                    <?php if($f) { ?>
                                        <td class="pro-status">Processing</td>
                                        <td> <button class="button button1"> <a href="./upitem.php?id=<?= $row1["id"] ?>" id="pro-post-ed-btn" > Edit Post   </button> </td>
                                       <!-- <td class="btn btn-primary "> <a href="./upitem.php?id=<?= $row1["id"] ?>" id="pro-post-ed-btn" > Edit Post </a> </td>
                                        <td class="btn btn-primary "> <a href="./boost.php?pid=<?= $row1["id"] ?>" id="pro-post-ed-btn" >  Boost Post </a> </td> -->
                                        <td> <button class="button button1"> <a href="./boost.php?pid=<?= $row1["id"] ?>" id="pro-post-boost-btn" >Boost Post</button> </td>
                                    <?php } ?>

                                    </tr>
                                    
<?php $count++; }} ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </span>
                    
                    <span class="pro-purchased">
                        <div class="container">
                            <h4>Items Purchased</h4>
                            <hr>


                            <div style=" min-width: 450px ;  height: 400px; overflow:auto;">
                            <table class="tables price-offer  table-hover">
                                <thead>
                                    <tr>

                                        <th>My Post</th>
                                        <th>Type</th>
                                        <th>Post By</th>
                                        <th> Asking Price </th>
                                        <th> Offered Price </th>
                                        <th> Final Price </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>

<?php $qry1 = "SELECT a.`ID`, b.`title`, a.`posttype`, a.`usertype`, a.`contactno` contactno, a.`offerprice`, a.`dealprice`, a.`whyme`, a.`postingdate`, a.`status`, a.`qty`, a.`cmsuser`, c.Name name, a.st st FROM `Posthist` a, `postitem` b, `cmsuser` c WHERE a.postid = b.id and b.cmsuser = c.id AND a.cmsuser = ".$atid." ORDER BY a.makedt DESC";
                               $result1 = $conn->query($qry1); 
                                if ($result1->num_rows > 0){
                                  while($row1 = $result1->fetch_assoc()){ $type= '';
                                  if($row1["posttype"] == 27){
                                      $type = "Buy";
                                  } else if($row1["posttype"] == 28){
                                      $type = "Auction";
                                  } else if($row1["posttype"] == 29){
                                      $type = "Exchange";
                                  } else if($row1["posttype"] == 30){
                                      $type = "Rent";
                                  } else if($row1["posttype"] == 31){
                                      $type = "Donation";
                                  }else if($row1["posttype"] == 32){
                                      $type = "Give away";
                                  }
                                  
                                  $state = "Processing";
                                  
                                  if($row1["st"] == 2){
                                        $state = "Accepted";
                                    }
                                    else if($row1["st"] == 3){
                                        $state = "Rejected";
                                    }
                                    else if($row1["st"] == 4){
                                        $state = "Hold";
                                    }
                                  ?>
                                      
                                    <tr>
                                        <td class="pro-td"><?php echo $row1["title"] ?></td>
                                        <td class="pro-type-b pro-td"><?php echo $type ?></td>
                                        <td><?php echo $row1["name"] ?></td>
                                        <td><input type="number" name="ask-price" id="ask-price" value="<?php echo $row1["offerprice"] ?>"></td>
                                        <td><input type="number" name="ask-price" id="offer-price" value="<?php echo $row1["dealprice"] ?>"></td>
                                        <td><input type="number" name="ask-price" id="final-price" value="$220"></td>
                                        <td class="pro-status"><?php echo $state ?></td>

                                    </tr>
<?php }} ?>
                                </tbody>
                            </table>
                            <div style="overflow-x:auto;">
                        </div>
                        </div>
                        </div>
                    </span>

<form method="post" action="common/uppass.php?id=<?php echo $atid ?>" enctype="multipart/form-data">
                    <span class="pro-password">
                        <div class="pro-pass ">
                            <h4>Change Password</h4>
                            <hr>
                            <div class="col-sm-4 pro-pass-field">
                                <label for="pro-pass">Current Password</label>
                                <input type="password" class="form-control " id="pro-pass" name="pro-pass"
                                    placeholder="Current Password">
                                <br>

                                <label for="pro-n-pass">New Password</label>
                                <input type="password" class="form-control" id="pro-n-pass" name="pro-n-pass"
                                    placeholder="New Password">
                                <br>

                                <label for="pro-c-pass">Confirm New Password</label>
                                <input type="password" class="form-control" id="pro-c-pass" name="pro-c-pass"
                                    placeholder="Confirm New  Password">
                                <br>

                                <input type="submit" class="btn btn-primary btn-block">
                                <br>
                            </div>

                        </div>
                    </span>
</form>

                   <span class="pro-connection">
                        <div class="connection">
                            <h4>Wishlist</h4>
                            <hr>
                            <div class="row">
<?php 
    $qryw = "SELECT b.title title, c.photo photo, b.id id FROM `whishlist` a,`postitem` b, `postitemphoto` c WHERE c.`isfeatured` = 1 and a.`product_id` = b.`id` and c.`postid` = b.`id` and a.user_id = '$atid'";
    $resultw = $conn->query($qryw);
    while($roww = $resultw->fetch_assoc()) {
        $photo="../../core/images/upload/postitem/".$roww["photo"]
?>
                                <div class="col-sm-3">


                                    <div class="card">
                                       <a href = "buy_sell.php?id=<?= $roww["id"] ?>">
                                        <img class="card-img-top img-fluid" src="<?= $photo ?>"
                                            alt="Card image cap">
                                        
                                        <div class="card-body">
                                            <p class="text-center"><?= $roww["title"] ?></p>
                                        </div>
                                      </a>
                                    </div>
                                 </div>
<?php } ?>
                               
                                

                            </div>
                        </div>
                    </span>
                    
                     <span class="pro-edit">

                             <h4>Edit Profile</h4>
                        <hr>
                        <form action = "./common/upprofile.php?id=<?php echo $atid ?>" onSubmit="return confirm('Do you want to submit?') " enctype="multipart/form-data" method = "POST">
                            
                             <div class="edit-img-container">
                               <!--  <img src="./img/profile/<?php echo $row["photo"] ?>" class="pro-dp" alt="pro-img" style="width:50%">

                                <label for="file-upload" class="custom-file-upload pro-edit-button">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input id="file-upload" type="file" name = "img"/> 


                            </div> -->
                            	<div class="col-lg-6 col-md-6 col-sm-12">
                                    				   <h4 class="post-pic-title "> Add Featured Picture * </h4>
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
                            <br> 

                            <input type="text" class="form-control" placeholder="Edit Name" name = "name" value = "<?php echo $row["Name"] ?>"><br>
                            <input type="text" class="form-control" placeholder="Edit Address" name = "address" value = "<?php echo $row["Address"] ?>"> <br>
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group ">
                <select id="country" class="form-control" name = "state" required>
                  <option value="">Select State</option>
                  <?php $qry1 = "SELECT `id`, `title` FROM `state` WHERE country=2 AND st=1";
                    $result1 = $conn->query($qry1); 
                    if ($result1->num_rows > 0){
                         while($row1 = $result1->fetch_assoc()){ ?>
                        <option value="<?php echo $row1["id"] ?>" <?php if ($row["state"] == $row1["id"]) { echo "selected"; } ?>><?php echo $row1["title"]?></option>
                    <?php 
						}
					} 
					?>

                </select>
                



              </div>
              
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
				  
                <select class="form-control" id="district" name = "tt" required>
                  <option value="">Select District</option>
                  <?php $qry2 = "SELECT `id`, `title` FROM `district` WHERE st=1 and state = ".$row["state"];
                    $result2 = $conn->query($qry2); 
                    if ($result2->num_rows > 0)
                    {
                         while($row2 = $result2->fetch_assoc()) { ?>
                        <option value="<?php echo $row2["id"] ?>" <?php if ($row["district"] == $row2["id"]) { echo "selected"; } ?>><?php echo $row2["title"]?></option>
                  
                    <?php }} ?>
                </select>
                
				 



              </div>
              
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-sm-6"><input type="date" class="form-control"
                                        placeholder="Edit Date of Birth" name = "dob" value = "<?php echo $row["dob"] ?>"></div>
                                        <br>

                                <div class="col-sm-6"><input type="tel" class="form-control"
                                        placeholder="Edit Phone no." name = "contactno" value = "<?php echo $row["contactno"] ?>"></div>

                            </div>
                            <br>
                            <input type="mail" class="form-control" placeholder="Edit Email" name = "email" value = "<?php echo $row["email"] ?>"> 
                            <br>
                            <input type="text" class="form-control" placeholder="Edit Status" name = "status" value = "<?php echo $row["status"] ?>"> 
                            <br>
                            <input type="submit" name = "update_profile" class="btn btn-primary btn-block edit-sub-btn">
                            <br>
                            
                        </form>








                    </span>

                </div>

                <!-- col-9-container-end -->
            </div>
            

        </div>





    </div>

<?php }} ?>

  <?php include "./footer.php" ?>
    




   <script>
        $(document).ready(function () {

            $(".pro-content span").attr("style", "display:none");
            $(".pro-content .pro-about").attr("style", "display:block");

            $(".pro-menu a").click(function () {
                $(".pro-content span").attr("style", "display:none");
                var mclass = $(this).attr("myclass");
                //alert(mclass);
                $(".pro-content ." + mclass).attr("style", "display:block");
              
                

            });
            $(".subs-menu ").click(function () {
               // alert("y");
                $(".pro-content span").attr("style", "display:none");
                $(".pro-edit").attr("style", "display:block");


            });

        });
    </script>
    
    
    
    <!--district loader-->
     <script>
    $(document).ready(function () {

    

     
		
		
		//attr('checked', true);
		
		
		
		
		
		//############## district laoder
//call area cmb on district change		
	$('#country').change(function(){
		country = $(this).find("option:selected" ).val();
		load_district(country);
	});	
		
		function load_district(country){
		    //alert(district);
			$.ajax({
				
				url:"phpajax/load_district.php",
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
      var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>




</body>

</html>