<?php

//$obj= $_GET['obj'];
//$returl=$_GET['ret'];
$md=$_GET['mod'];
//echo "yes"; die;
//$msg= $_GET['msg'];
$atid= $_GET['id'];
require_once("../common/conn.php");

        
	$sql = 'delete from paymode WHERE id='.$atid;
   // echo $sql;die;
    if ($conn->query($sql) == TRUE) {
        header("Location: ".$hostpath."/payList.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();

?>