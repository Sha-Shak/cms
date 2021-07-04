<?php
require "conn.php";

session_start();
$usr=$_SESSION["user"];

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/countryList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];
      $shnm= $_REQUEST['shnm'];
      $currencycode= $_REQUEST['currencycode'];
      $currencynm= $_REQUEST['currencynm'];
      $currencyshnm= $_REQUEST['currencyshnm'];
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
        $qry="insert into country( `title`, `shnm` ,`currencycode`, `currencynm`, `curencyshnm`, `description`, `makedt`, `makeby`) 
        values('".$title."','".$shnm."','".$currencycode."','".$currencynm."', '".$currencyshnm."', '".$description."', '".$makedt."', ".$makeby.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid = $_REQUEST['atid'];
      $title= $_REQUEST['title'];
      $shnm= $_REQUEST['shnm'];
      $currencycode= $_REQUEST['currencycode'];
      $currencynm= $_REQUEST['currencynm'];
      $currencyshnm= $_REQUEST['currencyshnm'];
      $description= $_REQUEST['description'];
      
      
        $qry="update country set `title`='".$title."',`shnm`='".$shnm."', `currencycode`='".$currencycode."',`currencynm`='".$currencynm."', `curencyshnm`='".$currencyshnm."',`description`='".$description."'  where `id`=".$aid."";
    
        //echo $qry;
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }

    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/countryList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/countryList.php?pg=1&mod=5");
    }
    
    $conn->close();
    
}
?>