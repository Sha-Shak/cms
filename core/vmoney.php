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
    $atid= $_GET['id'];

    if ($res==1)
    {
        echo "<script type='text/javascript'>alert('".$msg."')</script>"; 
    }
    if ($res==2)
    {
        echo "<script type='text/javascript'>alert('".$msg."')</script>"; 
    }

    if ($res==4)
    {
        $qry="SELECT `title`, `vmoneytype`, `offeramount`, `chargetype`, `chargeamount`, `ispercent`, `efectfrom`, `effectto`, `description`, `id` FROM `virtualmoney` WHERE id= ".$atid; 
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
                        $aid=$row["id"];$title=$row["title"];$vmoneytype=$row["vmoneytype"];$offeramount=$row["offeramount"];  $chargetype=$row["chargetype"];$chargeamount=$row["chargeamount"]; $ispercent=$row["ispercent"]; $effectfrom=$row["efectfrom"];$effectto=$row["effectto"];$description=$row["description"];
                        $effectfrom= substr($effectfrom, 0, 10);
                        $effectfrom= str_replace('-', '/', $effectfrom);
                        $y= substr($effectfrom, 0, 4);
                        $m=substr($effectfrom, 5, 7);
                        $d=substr($effectfrom, 8, 10);
                        $m=substr($m, 0, 2);
                        
                        $effectfrom= '';
                        $effectfrom.= $d;
                        $effectfrom.= "/";
                        $effectfrom.= $m;
                        $effectfrom.= "/";
                        $effectfrom.= $y;
                        
    
                        $effectto= substr($effectto, 0, 10);
                        $effectto= str_replace('-', '/', $effectto);
                        $y= substr($effectto, 0, 4);
                        $m=substr($effectto, 5, 7);
                        $d=substr($effectto, 8, 10);
                        $m=substr($m, 0, 2);
                        
                        $effectto= '';
                        $effectto.= $d;
                        $effectto.= "/";
                        $effectto.= $m;
                        $effectto.= "/";
                        $effectto.= $y;
                    }
            }
        }
    $mode=2;//update mode
    //echo "<script type='text/javascript'>alert('".$dt."')</script>";
    
    }
    else
    {
        $aid='';$title='';$vmoneytype=''; $offeramount=''; $chargetype=''; $chargeamount=''; $ispercent=''; $effectfrom=''; $effectto=''; $description=''; 
        $mode=1;//Insert mode
                    
    }

    /* common codes need to place every page. Just change the section name according to section
    these 2 variables required to detecting current section and current page to use in menu.
    */
    $currSection = 'vmoney';
    $currPage = basename($_SERVER['PHP_SELF']);
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
            <span>Virtual Money</span>
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
                    <p>&nbsp;</p> <p>&nbsp;</p>
                    <p>
                        <form method="post" action="common/addvmoney.php"  id="form1" enctype="multipart/form-data"> <!--onsubmit="javascript:return WebForm_OnSubmit();" -->
                            <div class="panel panel-info">
      			                <div class="panel-heading"><h1>SVirtual Money Information</h1></div>
				                <div class="panel-body">
                                    <span class="alertmsg"></span> 
                                    
                                    <!-- <br> <p>(Field Marked * are required) </p> -->
                                    
                                    <div class="row">
      		                            <div class="col-sm-12">
	                                      <!--  <h4></h4>
	                                        <hr class="form-hr"> -->
	                                        
		                                    <input type="hidden"  name="atid" id="atid" value="<?php echo $aid;?>"> 
		                                    <input type="hidden"  name="usrid" id="usrid" value="<?php echo $usr;?>">
		                                     
	                                    </div>      
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Virtual Money Title.</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $title?>">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Virtual Money Type</label>
                                            <div class="form-group styled-select">
                                            <select name="vmt" id="vmt" class="form-control">
                                            <option value="">Select Virtual Money Type</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `virtualmoneyType` where st=0  order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $vmtid= $rowcur["id"]; $vmtnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $vmtid; ?>" <?php if ($vmoneytype == $vmtid) { echo "selected"; } ?>><?php echo $vmtnm; ?></option>
    <?php  }} ?>
                                            </select>
                                            </div>
                                        </div>        
                                    </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Offer Amount</label>
                                                <input type="text" class="form-control" id="offeramount" name="offeramount" value="<?php echo $offeramount;?>">
                                            </div>        
                                        </div>
                                        
                                        
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Charge Type</label>
                                            <div class="form-group styled-select">
                                            <select name="ct" id="ct" class="form-control">
                                            <option value="">Select Charge Type</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `chargetype` where st=0 order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $ctid= $rowcur["id"]; $ctnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $ctid; ?>" <?php if ($chargetype == $ctid) { echo "selected"; } ?>><?php echo $ctnm; ?></option>
    <?php  }} ?>
                                            </select>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Charge Amount</label>
                                                <input type="text" class="form-control" id="chargeamount" name="chargeamount" value="<?php echo $chargeamount;?>">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <label for="dob">Start Date</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control datepicker" id="effectfrom" name="effectfrom" value="<?php echo $effectfrom;?>" required>
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <label for="dob">End Date</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control datepicker" id="effectto" name="effectto" value="<?php echo $effectto;?>" required>
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Description</label>
                                                <input type="text" class="form-control" id="description" name="description" value="<?php echo $description;?>">
                                            </div>        
                                        </div>
                                        
                                        <?php if($ispercent == 0){ ?>
                                            <input type="checkbox" id="ispercent" name="ispercent" value=1>
                                            <label for="ispercent"> Is percent? </label>
                                        <?php } else { ?>
                                            <input type="checkbox" id="ispercent" name="ispercent" value=1 checked>
                                            <label for="ispercent"> Is percent? </label>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div> 
                            <!-- /#end of panel -->      
                            <div class="button-bar">
                                <?php if($mode==2) { ?>
    	                        <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="update" value="Update Virtual Money"  id="update" > <!-- onclick="javascript:messageAlert('Event is fired from the page and messaged is pased via parameter. will be desolve in 5 sec')" -->
                                <?php } else {?>
                                <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="add" value="Add Virtual Money"  id="add" >
                                <?php } ?>  
                                <input class="btn btn-lg btn-default" type="submit" name="cancel" value="Cancel"  id="cancel" >
                            </div>        
                        </form>       
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