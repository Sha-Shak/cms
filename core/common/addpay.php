<?php
require "conn.php";

session_start();
$usr=$_SESSION["user"];

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/payList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];
      $description= $_REQUEST['description'];
      $makedt = date("Y-n-j H:i:s");
      $makeby= $usr;
      
      
      
      $code=date(dmYHis).str_replace(' ','',substr($atr,0,8));
        /*
        $linearray = split(',', $atrv);
        foreach ($linearray as $key => $child) 
        {
            $qryv="insert into attributevalue( `attribute`, `attributevalue`,`makeby`, `makedt`) 
            values('".$code."','".$child."',".$hrid.",sysdate())" ;
            if ($conn->query($qryv) == TRUE) { echo "ok";}
        }
*/
        $qry="insert into paymode( `title`, `descr`, `makeby`, `makedt`) 
        values('".$title."','".$description."', ".$makeby.", '".$makedt."')" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $title= $_REQUEST['title']; 
      $description= $_REQUEST['description'];
      
      
        $qry="update paymode set `title`='".$title."',`descr`='".$description."' where `id`=".$aid."";
    }
    if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/payList.php");
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }

    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/payList.php");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/payList.php");
    }
    
    $conn->close();
}
?>