<?php
require "common/conn.php";
session_start();
$usr=$_SESSION["user"];
$mod= $_GET['mod'];
if($usr==''){ 
	header("Location: ".$hostpath."/hr.php");
}else{

}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  include_once('common_header.php');?>
<body class="dashboard">

<?php  include_once('common_top_body.php');?>

<div id="wrapper"> 
  <!-- Sidebar -->

  <div id="sidebar-wrapper" class="mCustomScrollbar">
  
  <div class="section">
  	<i class="fa fa-group  icon"></i>
    <span>Cash My Stash </span>
  </div>
  <?php
    include_once('menu.php');
	
?>
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
          <p>
          <!-- START PLACING YOUR CONTENT HERE -->

          <!-- START PLACING YOUR CONTENT HERE -->          
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

<?php include_once('common_footer.php');?>
  <!-- END FLOT CHART--> 
</body></html>
