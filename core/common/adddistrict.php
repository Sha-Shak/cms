<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/districtList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];
      $shnm= $_REQUEST['shnm'];
      $country= $_REQUEST['cmbcur'];
      $state= $_REQUEST['cmb'];
      
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
        $qry="insert into district( `title`, `shnm`, `country`, `state` ,`makedt`, `makeby`) 
        values('".$title."','".$shnm."',".$country.",".$state.",sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $title= $_REQUEST['title'];
      $shnm= $_REQUEST['shnm'];
      $country= $_REQUEST['cmbcur'];
      $state= $_REQUEST['cmb'];
      
      
            $qry="update district set `title`='".$title."', `shnm`='".$shnm."', `country`=".$country.", `state`=".$state." where `id`=".$aid."";
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/districtList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/districtList.php?pg=1&mod=5");
    }
    
    $conn->close();
}
?>