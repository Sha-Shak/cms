<?php

$obj= $_GET['obj'];
$returl=$_GET['ret'];
$md=$_GET['mod'];
//echo "yes"; die;
//$msg= $_GET['msg'];
$atid= $_GET['id'];
require_once("../common/conn.php");

if($obj=='product') 
 {
    $sqlchild = "delete from productimage where product=(select productcode from product WHERE id=".$atid.")"; 
   
   if ($conn->query($sqlchild) == TRUE) {echo "object  Deleted successfully";}
 }
 

	//$sql = 'delete from '.$obj.' WHERE id='.$atid;
	
	$sql = 'update  '.$obj.' set st=9 WHERE id='.$atid;
   // echo $sql;die;
    if ($conn->query($sql) == TRUE) {
        header("Location: ".$hostpath."/".$returl.".php?&mod=".$md);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();

?>