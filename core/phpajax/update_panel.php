<?php

$act= $_GET['action'];

extract($_REQUEST);

require_once("../common/conn.php");

if ($act=='brand' )
{
//	print_r($_REQUEST);
//	exit();
//echo $act;die;

    //$sql = 'update  `brand` set `brandid`='.$brand.',st='.$st.' WHERE position='.$pos;
    $sql = "call psp_brandpanel(".$brandName.",".$pos.",'".$brandStatus."')";
    //print_r($sql);
	//exit();
    if ($conn->query($sql) == TRUE) {
          echo "Panel  updated successfully"; 
        //	echo $act;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();

}
else if ($act=='cat' )
{

//print_r($_REQUEST);
//exit();
 $sql = "call psp_catpanel(".$brandName.",".$pos.",'".$brandStatus."')";
    //print_r($sql);
  // exit();
    if ($conn->query($sql) == TRUE) {
          echo "Panel  updated successfully"; 
        //	echo $act;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
}
else
{
    

}
	
?>