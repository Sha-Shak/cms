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
        $qry="SELECT `id`, `title`, `description`, `photo`, `iconimage` FROM `postingboard` WHERE id= ".$atid; 
       //echo $qry; die;
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
                        $aid=$row["id"];$title=$row["title"];$description=$row["description"];$photo=$row["photo"];$iconimage=$row["iconimage"]; $makedt= date("Y-n-j H:i:s");
                        $photoloc="../../core/images/upload/board/".$row["photo"];$iconloc="../../core/images/icons/board/".$row["iconimage"];
                    }
            }
        }
    $mode=2;//update mode
    //echo "<script type='text/javascript'>alert('".$dt."')</script>";
    
    }
    else
    {
        $aid='';$title='';$description=''; $photo=''; $iconimage='';
        $mode=1;//Insert mode
                    
    }

    /* common codes need to place every page. Just change the section name according to section
    these 2 variables required to detecting current section and current page to use in menu.
    */
    $currSection = 'board';
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
            <span>Post </span>
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
                        <form method="post" action="common/addboard.php"  id="form1" enctype="multipart/form-data"> <!--onsubmit="javascript:return WebForm_OnSubmit();" -->
                            <div class="panel panel-info">
      			                <div class="panel-heading"><h1>Post Information</h1></div>
				                <div class="panel-body">
                                    <span class="alertmsg"></span> 
                                    
                                    <!-- <br> <p>(Field Marked * are required) </p> -->
                                    
                                    <div class="row">
      		                            <div class="col-sm-12">
	                                      <!--  <h4></h4>
	                                        <hr class="form-hr"> -->
	                                        
		                                    <input type="hidden"  name="atid" id="atid" value="<?php echo $aid;?>"> 
		                                    <input type="hidden"  name="usrid" id="usrid" value="<?php echo $title;?>">
		                                     <input type="hidden"  name="photo" id="photo" value="<?php echo $photo;?>">
		                                     <input type="hidden"  name="iconimage" id="iconimage" value="<?php echo $iconimage;?>">
		                                     
	                                    </div>      
            	                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Board Title.</label>
                                                <input type="text" class="form-control" id="brand" name="title" value="<?php echo $title;?>">
                                            </div>        
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Description. </label>
                                                <input type="text" class="form-control" id="brand" name="description" value="<?php echo $description;?>">
                                            </div>        
                                        </div>
                                      <!--  <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Photo. </label>
                                                <input type="text" class="form-control" id="photo" name="photo" value="<?php echo $photo;?>">
                                            </div>        
                                        </div> -->
                                         <div class="col-lg-3 col-md-6 col-sm-6">
                                            <strong>Photo</strong>
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary btn-file btn-file">
                                                        <i class="fa fa-upload"></i> <input type="file" name="attachment1" id="attachment1" style="display: none;" onchange="loadFile(event)">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <span class="help-block form-text text-muted">
                                                Try selecting one  files and watch the feedback
                                            </span>
                                        </div>
                                         <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="input-group">
                                              <img id="output"  width="100" height="100" alt="" src="<?php echo $photoloc;?>">
                                            </div>
                                        </div> 
                                         
                                         <div class="col-lg-3 col-md-6 col-sm-6">
                                            <strong>Icon</strong>
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary btn-file btn-file">
                                                        <i class="fa fa-upload"></i> <input type="file" name="attachment2" id="attachment2" style="display: none;" onchange="loadImage(event,'output1')">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <span class="help-block form-text text-muted">
                                                Try selecting one  files and watch the feedback
                                            </span>
                                        </div>
                                         <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="input-group">
                                              <img id="output1"  width="100"  height="100" alt="" src="<?php echo $iconloc;?>">
                                            </div>
                                        </div> 
                                        <!--<div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="ref">Icon Image. </label>
                                                <input type="text" class="form-control" id="brand" name="iconimage" value="<?php echo $iconimage;?>">
                                            </div>        
                                        </div> -->
                                        
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