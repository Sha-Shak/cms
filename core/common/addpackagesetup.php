<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/packagesetupList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $packagesetup= $_REQUEST['bt'];
      $description= $_REQUEST['description'];
      $country= $_REQUEST['ct'];
      $limits= $_REQUEST['limit'];
      $chargetype= $_REQUEST['ctt'];
      $collectiontype= $_REQUEST['cott'];
      $chargeamount= $_REQUEST['chargeamount'];
      $effectivedt= $_REQUEST['effectivedt'];
      
      
      $hrid = $_POST['usrid']; 
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
        $qry="insert into pakagesetup( `pakagesetup`, `description`, `countryid`, `limits`, `chargetype`, `collectiontype`, `chargeamount`, `effectivedt`, `makedt`, `makeby`) 
        values(".$packagesetup.",'".$description."',".$country.",".$limits.",".$chargetype.",".$collectiontype.",".$chargeamount.",STR_TO_DATE('".$effectivedt."', '%d/%m/%Y'),sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $packagesetup= $_REQUEST['bt'];
      $description= $_REQUEST['description'];
      $country= $_REQUEST['ct'];
      $limits= $_REQUEST['limit'];
      $chargetype= $_REQUEST['ctt'];
      $collectiontype= $_REQUEST['cott'];
      $chargeamount= $_REQUEST['chargeamount'];
      $effectivedt= $_REQUEST['effectivedt'];
      
            $qry="UPDATE `pakagesetup` SET `pakagesetup`=".$packagesetup.",`description`='".$description."', `countryid`=".$country.",`limits`=".$limits.",`chargetype`=".$chargetype.",`collectiontype`=".$collectiontype.",`chargeamount`=".$chargeamount.",`effectivedt`=STR_TO_DATE('".$effectivedt."', '%d/%m/%Y') WHERE `id`=".$aid."";
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/packagesetupList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/stateList.php?pg=1&mod=5");
    }
    
    $conn->close();
}
?>