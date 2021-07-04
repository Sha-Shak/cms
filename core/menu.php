<?php
require "common/conn.php";
session_start();
$id=$_SESSION["user"];
$mod= $_GET['mod'];
if($id=='')
{ header("Location: ".$hostpath."/hr.php");
}
else
{
?>
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
    
          <li <?=($currSection == 'dashboard')?'class="active"':''?>> <a href="dashboard_cms.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a></li>
    <?php
    $id=$_SESSION["user"];
   // echo $id;
   $qry="SELECT m.`id`,m.`menuNm`,m.`icon_class`,m.`currSection`,a.menuid,a.menu_priv,m.`urllist`  FROM `mainMenu` m,hrAuth a  WHERE a.menuid=m.`id` and ifnull(m.isreport,0)<>1 and a.hrid=".$id."  and m.modl=".$mod." order by m.menu_sl"; 
   
   // $qry="SELECT m.`id`,m.`menuNm`,m.`icon_class`,m.`currSection`,a.menuid,a.menu_priv  FROM `mainMenu` m,hrAuth a  WHERE a.menuid=m.`id`  and a.hrid=".$id." order by m.menu_sl"; 
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
                $uid=$row["id"];$menuNm=$row["menuNm"]; 
                $currSection1=$row["currSection"];
                $menuid=$row["menuid"];
                $menu_priv=$row["menu_priv"];
				$icon_class=$row["icon_class"];
                $urlm=$row["urllist"]."&mod=".$mod;
                //$slnm=$row["slnm"];
              //  if($mnsl==1) { $url1=$row["url1"];
            //, h.menu_sl ,h.nm slnm//,hrMenu h//and h.`mainMenu`=m.`id`
                
                
    ?>
            <li  <?=($currSection == $currSection1)?'class="active"':''?>> <a href="<?php echo $urlm;?>"><span class="fa-stack fa-lg pull-left"><i class="fa <?=$icon_class?> fa-stack-1x "></i></span><?php echo $menuNm; ?><i class="arrow fa fa-angle-down"></i></a></li> 
<?php            
            }
        }
    }        
    
    ?>
            <li <?=($currSection == $currSection1 )?'':''?>> <a href="dashboard_blank.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa fa-bar-chart fa-stack-1x "></i></span> Report  <i class="arrow fa fa-angle-down"></i></a>
                <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
       <?php
    $id=$_SESSION["user"];
   // echo $id;
   $qry="SELECT m.`id`,m.`menuNm`,m.`icon_class`,m.`currSection`,a.menuid,a.menu_priv,m.`urllist`  FROM `mainMenu` m,hrAuth a  WHERE a.menuid=m.`id` and m.isreport=1 and a.hrid=".$id."  and m.modl=".$mod." order by m.menu_sl"; 
   
   // $qry="SELECT m.`id`,m.`menuNm`,m.`icon_class`,m.`currSection`,a.menuid,a.menu_priv  FROM `mainMenu` m,hrAuth a  WHERE a.menuid=m.`id`  and a.hrid=".$id." order by m.menu_sl"; 
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
                $uid=$row["id"];$menuNm=$row["menuNm"]; 
                $currSection1=$row["currSection"];
                $menuid=$row["menuid"];
                $menu_priv=$row["menu_priv"];
				$icon_class=$row["icon_class"];
                $urlm=$row["urllist"]."&mod=".$mod;
                //$slnm=$row["slnm"];
              //  if($mnsl==1) { $url1=$row["url1"];
            //, h.menu_sl ,h.nm slnm//,hrMenu h//and h.`mainMenu`=m.`id`
                
                
    ?>
            <li  <?=($currSection == $currSection1)?'class="active"':''?>> <a href="<?php echo $urlm;?>"><span class="fa-stack fa-lg pull-left"><i class="fa <?=$icon_class?> fa-stack-1x "></i></span><?php echo $menuNm; ?><i class="arrow fa fa-angle-down"></i></a></li> 
<?php            
            }
        }
    }        
    
    ?>          
                </ul>    
            </li>           
          
        </ul>
<?php }?>