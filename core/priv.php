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

    if ($res==1)
    {
        //echo "<script type='text/javascript'>alert('".$msg."')</script>"; 
    }
    if ($res==2)
    {
        //echo "<script type='text/javascript'>alert('".$msg."')</script>"; 
    }

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
    $currSection = 'priv';
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
            <span>User Privillage</span>
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
                        <form method="post" action="priv.php?mod=5"  id="form1">     
                            <div class="panel panel-info">
                                <div class="panel-heading"><h1>User Privillage</h1></div>
                                <div class="panel-body">
                                    <span class="alertmsg"></span>
                                    <br>
      	                            <p>(Field Marked * are required) </p>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden"  name="id" id="id" value="<?php echo $uid;?>"> 
                                                <label for="email">Employee Name </label>
                                                <div class="form-group styled-select">
                                                <select name="cmbempnm" id="cmbempnm" class="form-control" >
    <?php 
    $qry1="SELECT `id`,concat(`resourse_id`,'-',`hrName`) hrName FROM `hr` ";$result1 = $conn->query($qry1); if ($result1->num_rows > 0)
    {while($row1 = $result1->fetch_assoc()) 
          {   $tid= $row1["id"];  $nm=$row1["hrName"]; 
    ?>          
                                                    <option value="<? echo $tid; ?>" <? if ($mnhrid == $tid) { echo "selected"; } ?>><? echo $nm; ?></option>
    <?php 
          }
    }      
    ?>   
                                                </select>
                                                </div>
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                              <label for="email"> </label>
                                            <div class="form-group">
                                                <input class="btn btn-lg btn-default" type="submit" name="find" value="Get"  id="find" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                        <form method="post" action="common/addpriv.php"  id="form1">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="row">
                                         <input type="hidden"  name="usrid" id="usrid" value="<?php echo $mnhrid;?>"> 
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                               
                                                <label for="email">Menu </label>
                                               
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                               
                                                <label for="email">Privillage  </label>
                                               
                                            </div>        
                                        </div>
                                    </div>
<?php  $qrymenu="select a.id athid,m.menuNm,m.id,a.menu_priv from mainMenu m  left join hrAuth a  on a.menuid=m.id and a.hrid=".$mnhrid;
//echo $qrymenu;die;
$resultmnu = $conn->query($qrymenu); if ($resultmnu->num_rows > 0)
    {while($rowmnu = $resultmnu->fetch_assoc()) 
          {   $tid= $rowmnu["id"];  $nm=$rowmnu["menuNm"]; $priv=$rowmnu["menu_priv"]; $atid=$rowmnu["athid"];   ?>                                    
                                    <div class="row">
                                        <input type="hidden"  name="menuid[]" id="menuid" value="<?php echo $tid;?>">
                                        <input type="hidden"  name="auth[]" id="auth" value="<?php echo $atid;?>">
                                      	<div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                 <input type="text" class="form-control" id="mn" name="mn" value="<?php echo $nm;?>" disabled>
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group styled-select">
                                                <select name="cmbpriv[]" id="cmbpriv" class="form-control">
                                                    <option value="0">Select Privillage</option>
                                                    <option value="1" <? if ($priv == '1') { echo "selected"; } ?>>Login</option>
                                                    <option value="2" <? if ($priv == '2') { echo "selected"; } ?>>Only View</option>
                                                    <option value="3"<? if ($priv == '3') { echo "selected"; } ?>>Upto Create</option>
                                                    <option value="4"<? if ($priv == '4') { echo "selected"; } ?>>Upto Update</option>
                                                    <option value="5"<? if ($priv == '5') { echo "selected"; } ?>>Upto Delete</option>
                                                </select>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>
<?php }} ?>                                    
                                </div>
                            </div> 
                            <!-- /#end of panel -->      
                            <div class="button-bar">
                                <?php if($mode==2) { ?>
                                <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="update" value="Add User" id="update" disabled>
                                <?php } else {?>
                                <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="submit" value="Set Privilage" id="list" >
                                <?php } ?>           
                                <input class="btn btn-lg btn-default" type="submit" name="cancel" value="Cancel"  id="cancel" >
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
</body>
</html>
<?php }?>