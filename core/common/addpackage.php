<?php
require "conn.php";
if ( isset( $_POST['cancel'] ) ) {
      //header("Location: ".$hostpath."/catagoryList.php?&mod=1");
      header("Location: ".$hostpath."/packageList.php?pg=1&mod=5");
}
else
{
    
    
    if ( isset( $_POST['add'] ) ) {
     
      $aid='0';
      $cmbpar= $_REQUEST['cmbpar']; if($cmbpar==''){$cmbpar='0';}
      $title= str_replace("'","''",$_REQUEST['cat']); if($title==''){$title='NULL';}
      $lvl=$_REQUEST['tp'];
      
      $hrid = $_POST['usrid'];
      $description= $_REQUEST['description'];
      $makedt = date("Y-n-j H:i:s");
      $code=date(dmYHis).str_replace(' ','',substr($title,0,8));
      $photo=$code.".jpg";
      $totalup = count($_FILES['attachment1']['name']);
      $tmpFilePath = $_FILES['attachment1']['tmp_name'];
      
        $original = imagecreatefromjpeg($tmpFilePath);
        $imageSize = getImageSize($tmpFilePath);
        $imageWidth = $imageSize[0];
        $imageHeight = $imageSize[1];
        $resized = imagecreatetruecolor(800, 994);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 800, 994, $imageWidth, $imageHeight);
        imagejpeg($resized, "../../core/images/icons/package/".$photo);
        //if ($tmpFilePath != ""){ $newFilePath = "../../assets/images/categories/".$photo;
         // $didUpload = move_uploaded_file($tmpFilePath, $newFilePath); }
      
    //$qry="call psp_addcatagory(".$aid.",'".$code."','".$title."',".$cmbpar.",'".$photo."',".$hrid.")";
    $qry= "insert into package( `title`, `description`, `icon`, `makeby`, `makedt`) 
        values('".$title."','".$description."','".$photo."', ".$hrid.", '".$makedt."')";
        
        $err="A catagory created successfully";
       // echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $description= $_REQUEST['description'];
      $hrid = $_POST['usrid']; 
      $lvl=$_REQUEST['tp'];
      $cmbpar= $_REQUEST['cmbpar']; if($cmbpar==''){$cmbpar='0';}
      $title= str_replace("'","''",$_REQUEST['cat']); if($title==''){$title='NULL';}
      $code = date(dmYHis).str_replace(' ','',substr($title,0,8));
      $photo=$code.".jpg";
      $totalup = count($_FILES['attachment1']['name']);
      $tmpFilePath = $_FILES['attachment1']['tmp_name'];
      //if($tmpFilePath!='')
        //{
        $original = imagecreatefromjpeg($tmpFilePath);
        $imageSize = getImageSize($tmpFilePath);
        $imageWidth = $imageSize[0];
        $imageHeight = $imageSize[1];
        $resized = imagecreatetruecolor(800, 994);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 800, 994, $imageWidth, $imageHeight);
        //imagejpeg($resized, "../../assets/images/slider/".$code);
        imagejpeg($resized, "../../core/images/icons/package/".$photo);
        //}
        //if ($tmpFilePath != ""){ $newFilePath = "../../assets/images/categories/".$photo;
         // $didUpload = move_uploaded_file($tmpFilePath, $newFilePath); }
        
        $qry="update package set `title`='".$title."',`description`='".$description."', `icon`='".$photo."' where `id`=".$aid."";
       // echo $qry;die;
        
        
    }
   
   $ur="/catagoryList.php?&mod=1";
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                      
                header("Location: ".$hostpath."/packageList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/packageList.php?pg=1&mod=5");
    }
    
    $conn->close();
}
?>