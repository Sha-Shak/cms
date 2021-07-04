<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/boostList.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
     
      $title= '';
      $boosttypeid= $_REQUEST['cmbcur'];
      $param= $_REQUEST['param'];
      $paramvalue= $_REQUEST['paramvalue'];
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
        $qry="insert into boost( `title`, `typeid`, `param`, `paramvalue` ,`description`, `effectivedt`, `makedt`, `makeby`) 
        values('".$title."',".$boosttypeid.",'".$param."',".$paramvalue.",'".$description."', STR_TO_DATE('".$effectivedt."', '%d/%m/%Y'), sysdate(), ".$hrid.")" ;
        $err="A attribute created successfully";
           //echo $qry;die;
    }
    if ( isset( $_POST['update'] ) ) {
      $aid= $_REQUEST['atid'];
      $title= '';
      $boosttypeid= $_REQUEST['cmbcur'];
      $param= $_REQUEST['param'];
      $paramvalue= $_REQUEST['paramvalue'];
      $description= $_REQUEST['description'];
      $effectivedt= $_REQUEST['effectivedt'];
      
      
            $qry="update boost set `title`='".$title."', `typeid`=".$boosttypeid.", `param`='".$param."', `paramvalue`=".$paramvalue.", `description`='".$description."', `effectivedt`=STR_TO_DATE('".$effectivedt."', '%d/%m/%Y') where `id`=".$aid."";
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/boostList.php?pg=1&mod=5");
                //echo $qry;
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/boostList.php?pg=1&mod=5");
          //echo $qry;
    }
    
    $conn->close();
}
?>