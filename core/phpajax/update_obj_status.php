<?php

$act= $_GET['action'];

extract($_REQUEST);

require_once("../common/conn.php");
if ($act=='changeboosttpstatus' )
{
//echo $act;die;
    $sql = 'UPDATE boosttype SET st='.$statusid.' WHERE id='.$dataid;
    
    if ($conn->query($sql) == TRUE) {
        //echo $sql;
        echo "Data status updated successfully"; 
        //	echo $act;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();

}
else if ($act=='changedealstage' )
{

    $sql = 'UPDATE deal SET stage='.$stageid.' WHERE id='.$dataid;
   // echo $sql;
    if ($conn->query($sql) == TRUE) {
        //echo $sql;
        $sql1='update rpt_sales_deal set stage=(select name from `dealtype`  where id='.$stageid.') where deal_id='.$dataid;
        if ($conn->query($sql1) == TRUE) {  echo "Deal stage updated successfully"; }
    	
    //	echo $act;
    } else {
        //echo "Error updating record: " . $conn->error;
        echo $sql;
    }
    
    $conn->close();

}
else
{
    

}
	
?>