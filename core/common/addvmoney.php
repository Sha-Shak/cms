<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/vmoneyList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];
      $vmoneytype= $_REQUEST['vmt'];
      $offeramount= $_REQUEST['offeramount'];
      $chargetype= $_REQUEST['ct'];
      $chargeamount= $_REQUEST['chargeamount'];
      $ispercent= $_REQUEST['ispercent']; if($ispercent == '') $ispercent = 0;
      $description= $_REQUEST['description'];
      $effectfrom= $_REQUEST['effectfrom'];
      $effectto= $_REQUEST['effectto'];
      
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
        $qry="insert into virtualmoney(`title`, `vmoneytype`, `offeramount`, `chargetype`, `chargeamount`, `ispercent`, `efectfrom`, `effectto`, `description`, `makedt`, `makeby`) values('".$title."',".$vmoneytype.",".$offeramount.",".$chargetype.",".$chargeamount.",".$ispercent.", STR_TO_DATE('".$effectfrom."', '%d/%m/%Y'), STR_TO_DATE('".$effectto."', '%d/%m/%Y'), '".$description."', sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid = $_REQUEST['atid'];
      $title= $_REQUEST['title'];
      $vmoneytype= $_REQUEST['vmt'];
      $offeramount= $_REQUEST['offeramount'];
      $chargetype= $_REQUEST['ct'];
      $chargeamount= $_REQUEST['chargeamount'];
      $ispercent= $_REQUEST['ispercent']; if($ispercent != 1) $ispercent = 0;
      $description= $_REQUEST['description'];
      $effectfrom= $_REQUEST['effectfrom'];
      $effectto= $_REQUEST['effectto'];
      
      
            //$qry="update commissionsetup set `board`=".$board.", `description`='".$description."', `chargetype`=".$chargetype.", `collectiontype`=".$collectiontype.", `chargeamount`=".$chargeamount.", `effectivedt`=STR_TO_DATE('".$effectivedt."', '%d/%m/%Y') where `id`=".$aid."";
            $qry="UPDATE `virtualmoney` SET `title`='".$title."',`vmoneytype`=".$vmoneytype.",`offeramount`=".$offeramount.",`chargetype`=".$chargetype.",`chargeamount`=".$chargeamount.",`ispercent`=".$ispercent.",`efectfrom`=STR_TO_DATE('".$effectfrom."', '%d/%m/%Y'),`effectto`=STR_TO_DATE('".$effectto."', '%d/%m/%Y'),`description`='".$description."' where `id`=".$aid."";
            //echo $qry; die;
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/vmoneyList.php?pg=1&mod=5");
                //echo $qry;
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/vmoneyList.php?pg=1&mod=5");
          //echo $qry;die;
    }
    
    $conn->close();
}
?>