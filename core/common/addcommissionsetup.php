<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/commissionsetupList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $board= $_REQUEST['cmbcur'];
      $chargetype= $_REQUEST['charge'];
      $collectiontype= $_REQUEST['cl'];
      $chargeamount= $_REQUEST['chargeamount'];
      $description= $_REQUEST['description'];
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
        $qry="insert into commissionsetup( `board`, `description`, `chargetype`, `collectiontype` ,`chargeamount`, `effectivedt`, `makedt`, `makeby`) 
        values(".$board.",'".$description."',".$chargetype.",".$collectiontype.",".$chargeamount.", STR_TO_DATE('".$effectivedt."', '%d/%m/%Y'), sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid = $_REQUEST['atid'];
      $board= $_REQUEST['cmbcur'];
      $chargetype= $_REQUEST['charge'];
      $collectiontype= $_REQUEST['cl'];
      $chargeamount= $_REQUEST['chargeamount'];
      $description= $_REQUEST['description'];
      $effectivedt= $_REQUEST['effectivedt'];
      
      
            $qry="update commissionsetup set `board`=".$board.", `description`='".$description."', `chargetype`=".$chargetype.", `collectiontype`=".$collectiontype.", `chargeamount`=".$chargeamount.", `effectivedt`=STR_TO_DATE('".$effectivedt."', '%d/%m/%Y') where `id`=".$aid."";
            //echo $qry; die;
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/commissionsetupList.php?pg=1&mod=5");
                //echo $qry;
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/commissionsetupList.php?pg=1&mod=5");
          //echo $qry;die;
    }
    
    $conn->close();
}
?>