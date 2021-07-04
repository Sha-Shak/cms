<?php
require "common/conn.php";
session_start();
$usr=$_SESSION["user"];
if($usr=='')
{ header("Location: ".$hostpath."/hr.php"); 
}
else
{
    $res= $_GET['res'];
    $msg= $_GET['msg'];
    $aid= $_GET['id'];

   

    if ($res==4)
    {
        $qry="SELECT `id`, `hrid`, `menuid`, `menu_priv` FROM `hrAuth` where id= ".$aid; 
       // echo $qry; die;
        if ($conn->connect_error)
        {
            echo "Connection failed: " . $conn->connect_error;
        }
        else
        {
            $result = $conn->query($qry); 
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()) 
                    { 
                       $uid=$row["id"];$hrid=$row["hrid"];
                        $menuid=$row["menuid"]; $menu_priv=$row["menu_priv"];  
                    }
            }
        }
    $mode=2;//update mode
    //echo "<script type='text/javascript'>alert('".$dt."')</script>";
    
    }
    else
    {
        $uid='';$hrid='0'; $menuid='0'; $menu_priv='0'; 
    $mode=1;//Insert mode
                     
    }

    /* common codes need to place every page. Just change the section name according to section
    these 2 variables required to detecting current section and current page to use in menu.
    */
    $currSection = 'ch_pass';
    $currPage = basename($_SERVER['PHP_SELF']);
    
    /*if ( isset( $_POST['submit'] ) ) {
           header("Location: ".$hostpath."/common/addpriv.php");
    }*/
    $mnhrid = $_POST['cmbempnm'];
    if($mnhrid==''){$mnhrid=$hrid;}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  include_once('common_header.php');?>

<body class="form">
<?php  include_once('common_top_body.php');?>

<div id="wrapper"> 
  <!-- Sidebar -->
    <div id="sidebar-wrapper" class="mCustomScrollbar">
        <div class="section">
            <i class="fa fa-group  icon"></i>
            <span>Data Process</span>
        </div>
        <?php  include_once('menu.php');?>
	    <div style="height:54px;">
	    </div> 
    </div>
    <!-- END #sidebar-wrapper --> 
  <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid pagetop">
            <div class="row">
                <div class="col-lg-12">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <!--h1 class="page-title">Customers</a></h1-->
                    <p>
                    <!-- START PLACING YOUR CONTENT HERE -->
                        <form method="post" action="common/resend_char.php"  id="form1">     
                            <div class="panel panel-info">
                                <div class="panel-heading"><h1>Change Password</h1></div>
                                <div class="panel-body">
                                    <span class="alertmsg"></span>
                                    <br>
      	                            <p>(Field Marked * are required) </p>
                                    <div class="row">
                                       <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="cd">User Code*</label>
                                                <input type="text" class="form-control" id="cd" name="cd"  required>
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="cp">Current Password*</label>
                                                <input type="password" class="form-control" id="cp" name="cp"  required>
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="np">New Password*</label>
                                                <input type="password" class="form-control" id="np" name="np"  required>
                                            </div>        
                                        </div>
                                         <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="cnp">Confirm Password*</label>
                                                <input type="password" class="form-control" id="cnp" name="cnp"  required>
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                              <label for="email"> </label>
                                            <div class="form-group">
                                                <input class="btn btn-lg btn-default" type="submit" name="add" value="Change"  id="add" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                        
                        <!-- START PLACING YOUR CONTENT HERE -->          
                    </p> 
                </div>
            </div>    
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php    include_once('common_footer.php');?>
<?php

    if ($res==1){
        echo "<script type='text/javascript'>messageAlert('".$msg."')</script>"; 
    }

    if ($res==2){
        echo "<script type='text/javascript'>messageAlert('".$msg."')</script>"; 
    }
?>
</body>
</html>
<?php }?>