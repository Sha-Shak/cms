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
        $qry="SELECT `id`, `title`, `parentno`, `ischildonly`, `descr`, `photo`, `iconeimage` FROM `catagory` WHERE id=".$atid; 
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
                        $aid=$row["id"];$title=$row["title"];$parent=$row["parentno"];$child=$row["ischildonly"]; $description='descr';
                          $photoloc="../../core/images/upload/category/".$row["photo"];
                        $iconloc="../../core/images/icons/category/".$row["iconeimage"];
                    }
            }
        }
    $mode=2;//update mode
    //echo "<script type='text/javascript'>alert('".$dt."')</script>";
    
    }
    else
    {
            $aid='';$title=''; $parent=''; $description=''; $child='';$photo='';$iconimage='';
            $mode=1;//Insert mode
                    
    }

    /* common codes need to place every page. Just change the section name according to section
    these 2 variables required to detecting current section and current page to use in menu.
    */
    $currSection = 'cate';
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
            <span>Product Catagory </span>
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
                        <form method="post" action="common/addcatagory.php"  id="form1" enctype="multipart/form-data"> <!--onsubmit="javascript:return WebForm_OnSubmit();" -->
                            <div class="panel panel-info">
      			                <div class="panel-heading"><h1>Category Information</h1></div>
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
                                                <label for="ref">Category Title.</label>
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
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Parent</label>
                                            <div class="form-group styled-select">
                                            <select name="ct" id="ct" class="form-control">
                                            <option value="">Select Parent Node</option>
    <?php  $qrycur="SELECT `id`, `title` FROM `catagory` where st=0 and ischildonly=0  order by title"; $resultcur = $conn->query($qrycur); if ($resultcur->num_rows > 0){while($rowcur = $resultcur->fetch_assoc()) 
          { 
              $ctid= $rowcur["id"]; $ctnm=$rowcur["title"];
    ?>          
                                                <option value="<?php echo $ctid; ?>" <?php if ($parent == $ctid) { echo "selected"; } ?>><?php echo $ctnm; ?></option>
    <?php  }} ?>
                                            </select>
                                            </div>
                                        </div>        
                                    </div>
                                    <?php if($child == 0){ ?>
                                            <input type="checkbox" id="ischild" name="ischild" value=1>
                                            <label for="ischild"> Is Child? </label>
                                        <?php } else { ?>
                                            <input type="checkbox" id="ischild" name="ischild" value=1 checked>
                                            <label for="ischild"> Is Child? </label>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                            </div> 
                            <!-- /#end of panel -->      
                            <div class="button-bar">
                                <?php if($mode==2) { ?>
    	                        <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="update" value="Update Category"  id="update" > <!-- onclick="javascript:messageAlert('Event is fired from the page and messaged is pased via parameter. will be desolve in 5 sec')" -->
                                <?php } else {?>
                                <input  dat a-to="pagetop" class="btn btn-lg btn-default top" type="submit" name="add" value="Add Category"  id="add" >
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

<script>

/*  autofill combo  */

 var dataList=[];
$(".list-itemName").find("option").each(function(){dataList.push($(this).val())})

/*
//print dataList array
 $.each(dataList, function(index, value){
           $(".alertmsg").append(index + ": " + value + '<br>');
});
*/

/* Check wrong category */
var catlavel;	
var flag;
	
//$(".dl-itemName").change(function(){
$(document).on("change", ".dl-itemName", function() {
	
	
	//alert($(this).val());
	var root = $(this).parent().parent().parent().parent();
	root.find(".itemName").attr('style','border:1px solid red!important;');
	
	
	
	
	for(var i in dataList) {
		userinput = $(this).val();
	 	catlavel = dataList[i];
		
		//$(".alertmsg").append(dataList[i]+ '<br>');
		
		if(userinput === catlavel){
			flag = 1;
			
			//root.find(".itemName").val($(this).val());
			//alert($(this).attr("thisval"));
			
				var g = $(this).val();
				var id = $('#itemName option[value="' + g +'"]').attr('data-value');
			  //alert(id);
			root.find(".itemName").val(id);
			break;
		}else{
			flag = 0;
		}
	}
	if(flag == 0){
		$(this).val("");
		}
	
	});
/* end Check wrong category */	
	
/* end autofill combo  */

</script>


</body>
</html>
<?php }?>