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
        $qry="SELECT `id`, `pakagesetup`, `description`, `countryid`, `limits`, `chargetype`, `collectiontype`, `chargeamount`, `ispercent`, `effectivedt` FROM `pakagesetup` WHERE id= ".$atid; 
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
                        $aid=$row["id"];$packagesetup=$row["pakagesetup"];$description=$row["description"];$countryid=$row["countryid"];$limit=$row["limits"]; $chargetype= $row["chargetype"]; $collectiontype= $row["collectiontype"]; ; $chargeamount= $row["chargeamount"];
                        $effectivedt= $row["effectivedt"];
                        $effectivedt= substr($effectivedt, 0, 10);
                        $effectivedt= str_replace('-', '/', $effectivedt);
                        $y= substr($effectivedt, 0, 4);
                        $m=substr($effectivedt, 5, 7);
                        $d=substr($effectivedt, 8, 10);
                        $m=substr($m, 0, 2);
                        
                        $effectivedt= '';
                        $effectivedt.= $d;
                        $effectivedt.= "/";
                        $effectivedt.= $m;
                        $effectivedt.= "/";
                        $effectivedt.= $y;
                        
                    }
            }
        }
    $mode=2;//update mode
    //echo "<script type='text/javascript'>alert('".$dt."')</script>";
    
    }
    else
    {
        $aid='';$packagesetup='';$description=''; $countryid=''; $limit=''; $chargetype=''; $collectiontype=''; $chargeamount=''; $effectivedt='';
        $mode=1;//Insert mode
                    
    }

    /* common codes need to place every page. Just change the section name according to section
    these 2 variables required to detecting current section and current page to use in menu.
    */
    $currSection = 'packagesetup';
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
            <span>Package </span>
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
                        <form method="post" action="common/addpackagesetup.php"  id="form1" enctype="multipart/form-data"> <!--onsubmit="javascript:return WebForm_OnSubmit();" -->
                            <div class="panel panel-info">
      			                <div class="panel-heading"><h1>Package Information</h1></div>
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
                                            <label for="email">Package Title</label>
                                            <div class="form-group styled-select">
                                            <select name="bt" id="bt" class="form-control">
                                            <option value="">Select Title</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `boosttype` where st=0 order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $btid= $rowcur["id"]; $btnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $btid; ?>" <?php if ($packagesetup == $btid) { echo "selected"; } ?>><?php echo $btnm; ?></option>
    <?php  }} ?>
                                            </select>
                                            </div>
                                        </div>        
                                    </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">description</label>
                                                <input type="text" class="form-control" id="desciprion" name="description" value="<?php echo $description;?>">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Country</label>
                                            <div class="form-group styled-select">
                                            <select name="ct" id="ct" class="form-control">
                                            <option value="">Select country</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `country` where st=0 order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $cid= $rowcur["id"]; $cnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $cid; ?>" <?php if ($countryid == $cid) { echo "selected"; } ?>><?php echo $cnm; ?></option>
    <?php  }} ?>
                                            </select>
                                            </div>
                                        </div>        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Limit</label>
                                                <input type="text" class="form-control" id="limit" name="limit" value="<?php echo $limit;?>">
                                            </div>        
                                        </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Charge Type</label>
                                            <div class="form-group styled-select">
                                            <select name="ctt" id="ctt" class="form-control">
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
                                            <label for="email">Collection Type</label>
                                            <div class="form-group styled-select">
                                            <select name="cott" id="cott" class="form-control">
                                            <option value="">Select Charge Type</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `collectiontype` where st=0 order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $cotid= $rowcur["id"]; $cotnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $cotid; ?>" <?php if ($collectiontype == $cotid) { echo "selected"; } ?>><?php echo $cotnm; ?></option>
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
                                            <label for="dob">Effective Date*</label>
                                            <div class="input-group">
                                                
                                                <input type="text" class="form-control datepicker" id="effectivedt" name="effectivedt" value="<?php echo $effectivedt;?>" required>
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>
                                            </div>        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 
                            <!-- /#end of panel -->      
                            <div class="button-bar">
                                <?php if($mode==2) { ?>
    	                        <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="update" value="Update Data"  id="update" > <!-- onclick="javascript:messageAlert('Event is fired from the page and messaged is pased via parameter. will be desolve in 5 sec')" -->
                                <?php } else {?>
                                <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="add" value="Add Data"  id="add" >
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