<?php
require "conn.php";
session_start();
$usr=$_SESSION["user"];

if ( isset( $_POST['cancel'] ) ) {
      //header("Location: ".$hostpath."/catagoryList.php?&mod=1");
      header("Location: ".$hostpath."/catagoryList.php?pg=1&mod=5");
}
else
{
    
    
    if ( isset( $_POST['add'] ) ) {
     
      //$aid='0';
      $title=$_REQUEST['title'];if($title==''){$title='NULL';}
      $parent= $_REQUEST['ct']; if($parent==''){$parent=0;}
      $ischild=$_REQUEST['ischild'];if($ischild==''){$ischild=0;}
      $description=$_REQUEST['description'];
      $hrid = $usr; 
      $makedt = date("Y-n-j H:i:s");
      
      $code=date(dmYHis).str_replace(' ','',substr($title,0,8));
      $photo=$code.".jpg";
      $totalup = count($_FILES['attachment1']['name']);
      $tmpFilePath = $_FILES['attachment1']['tmp_name'];
      if($tmpFilePath!='')
        {
        $original = imagecreatefromjpeg($tmpFilePath);
        $imageSize = getImageSize($tmpFilePath);
        $imageWidth = $imageSize[0];
        $imageHeight = $imageSize[1];
        $resized = imagecreatetruecolor(800, 994);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 800, 994, $imageWidth, $imageHeight);
        imagejpeg($resized, "../../core/images/upload/category/".$photo);
        }
        
      $icon=$code."ico.jpg";
      $totalup2 = count($_FILES['attachment2']['name']);
      $tmpFilePath2 = $_FILES['attachment2']['tmp_name'];
      if($tmpFilePath2!='')
        {
        $original2 = imagecreatefromjpeg($tmpFilePath2);
        $imageSize2 = getImageSize($tmpFilePath2);
        $imageWidth2 = $imageSize2[0];
        $imageHeight2 = $imageSize2[1];
        $resized2 = imagecreatetruecolor(800, 994);
        imagecopyresampled($resized2, $original2, 0, 0, 0, 0, 800, 994, $imageWidth2, $imageHeight2);
        imagejpeg($resized2, "../../core/images/icons/category/".$icon);
        }
      
    $qry="insert into catagory( `title`,`parentno`, `ischildonly`, `descr` ,`photo`, `iconeimage`, `makeby`, `makedt`) 
        values('".$title."',".$parent.",'".$ischild."', '".$description."','".$photo."','".$icon."', ".$hrid.", '".$makedt."')";
        
        $err="A catagory created successfully";
       // echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $code = $_POST['cd'];
      $hrid = $_POST['usrid']; 
      $lvl=$_REQUEST['tp'];
      $cmbpar= $_REQUEST['cmbpar']; if($cmbpar==''){$cmbpar='0';}
      $title= str_replace("'","''",$_REQUEST['cat']); if($title==''){$title='NULL';}
      $photo=$code.".jpg";
      $totalup = count($_FILES['attachment1']['name']);
      $tmpFilePath = $_FILES['attachment1']['tmp_name'];
      if($tmpFilePath!='')
        {
        $original = imagecreatefromjpeg($tmpFilePath);
        $imageSize = getImageSize($tmpFilePath);
        $imageWidth = $imageSize[0];
        $imageHeight = $imageSize[1];
        $resized = imagecreatetruecolor(800, 994);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 800, 994, $imageWidth, $imageHeight);
        //imagejpeg($resized, "../../assets/images/slider/".$code);
        imagejpeg($resized, "../../core/images/icons/catagory/".$photo);
        }
        //if ($tmpFilePath != ""){ $newFilePath = "../../assets/images/categories/".$photo;
         // $didUpload = move_uploaded_file($tmpFilePath, $newFilePath); }
        
        $qry="call psp_addcatagory(".$aid.",'".$code."','".$title."',".$cmbpar.",'".$photo."',".$hrid.")";
       // echo $qry;die;
        
        
    }
   
   $ur="/catagoryList.php?&mod=1";
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                      
                header("Location: ".$hostpath."/catagoryList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/catagoryList.php?pg=1&mod=5");
          //echo $qry; die;
    }
    
    $conn->close();
}
?>