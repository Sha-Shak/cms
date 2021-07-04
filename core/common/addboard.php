<?php
require "conn.php";

session_start();
$usr=$_SESSION["user"];

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/boardList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];  if($title==''){$title='NULL';}
      $description= $_REQUEST['description']; if($description==''){$description='NULL';}
      //$photo= $_REQUEST['photo'];
      $iconimage= $_REQUEST['iconimage']; if($iconimage==''){$iconimage='NULL';}
      $makedt = date("Y-n-j H:i:s");
      $makeby= $usr;
      
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
        imagejpeg($resized, "../../core/images/upload/board/".$photo);
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
        imagejpeg($resized2, "../../core/images/icons/board/".$icon);
        }
        /*
        $linearray = split(',', $atrv);
        foreach ($linearray as $key => $child) 
        {
            $qryv="insert into attributevalue( `attribute`, `attributevalue`,`makeby`, `makedt`) 
            values('".$code."','".$child."',".$hrid.",sysdate())" ;
            if ($conn->query($qryv) == TRUE) { echo "ok";}
        }
*/
        $qry="insert into postingboard( `title`, `description` ,`photo`, `iconimage`, `makeby`, `makedt`) 
        values('".$title."','".$description."','".$photo."','".$icon."', ".$makeby.", '".$makedt."')" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $title= $_REQUEST['title']; 
      $description= $_REQUEST['description'];
      $photo= $_REQUEST['photo'];
      $iconimage= $_REQUEST['iconimage'];
      
       if($photo=='')
       {
       $code=date(dmYHis).str_replace(' ','',substr($title,0,8));
       $photo=$code.".jpg";
       }
      //$photo=$code.".jpg";
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
        imagejpeg($resized, "../../core/images/upload/board/".$photo);
        }
        
    
      if($iconimage=='')
       {
       $code=date(dmYHis).str_replace(' ','',substr($title,0,8));
       $iconimage=$code."ico.jpg";
       }    
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
        imagejpeg($resized2, "../../core/images/icons/board/".$iconimage);
        }      
      
        $qry="update postingboard set `title`='".$title."',`description`='".$description."', `photo`='".$photo."',`iconimage`='".$iconimage."' where `id`=".$aid."";
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }

    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/boardList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/boardList.php?pg=1&mod=5");
    }
    
    $conn->close();
}
?>