<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/nareasList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= $_REQUEST['title'];
      $longtitude= $_REQUEST['longtitude'];
      $latitude= $_REQUEST['latitude'];
      $country= $_REQUEST['cmbcur'];
      $state= $_REQUEST['cmb'];
      $district= $_REQUEST['cmd'];
      
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
        $qry="insert into area( `title`, `countryid`, `state` ,`district`,`latitude`,`longtitude`,`makedt`, `makeby`) 
        values('".$title."',".$country.",".$state.",".$district.",'".$latitude."','".$longtitude."',sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $title= $_REQUEST['title'];
      $latitude= $_REQUEST['latitude'];
      $longtitude= $_REQUEST['longtitude'];
      $country= $_REQUEST['cmbcur'];
      $state= $_REQUEST['cmb'];
      $district= $_REQUEST['cmd'];
      
      
            $qry="update area set `title`='".$title."', `latitude`='".$latitude."', `longtitude`='".$longtitude."', `countryid`=".$country.", `state`=".$state.",`district`=".$district."  where `id`=".$aid."";
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/nareasList.php?pg=1&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/nareasList.php?pg=1&mod=5");
    }
    
    $conn->close();
}
?>