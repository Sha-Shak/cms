<?php
require "conn.php";
session_start();

if ( isset( $_POST['change'] ) ) {
   $u= $_REQUEST['txtnm'];
   $a= $_REQUEST['txtcd'];
   $na= $_REQUEST['txtncd'];
   $reset= $_REQUEST['chkforget'];
   
   $qry="select id,email from hr where resourse_id='".$u."' and hidden_char='".$a."' and active_st=1";
   //echo $qry;die;
    $result = $conn->query($qry); 
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $uemail=$row["email"];
            $uid=$row["id"];
        }
     $qry1="update hr set hidden_char='".$na."' where id=".$uid." and active_st=1";
     //echo $qry1;die;
      if ($conn->query($qry1) == TRUE) 
      {
         header("Location: ".$hostpath."/boardList.php/mod=5");
        //echo "New record created successfully";
      }
      else
      {
           header("Location: ".$hostpath."/hr.php?res=3");
      }
     //echo "Error: " . $qry . "<br>" . $conn->error;

    }
       
   
}
else
{
     if ( isset( $_POST['submit'] ) ) {
       $u= $_REQUEST['txtnm'];
       $a= $_REQUEST['txtcd'];
    }
    else
    {
        $a="no";
    }
    
    $qry="select id from hr where resourse_id='".$u."' and hidden_char='".$a."' and active_st=1";
    //echo $qry;die;
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    $result = $conn->query($qry); 
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $uid=$row["id"];
        }
      $_SESSION["user"] = $uid;  
     // echo $uid;die;
      //header("Location: ".$hostpath."/dashboard_cms.php");
      header("Location: ".$hostpath."/boardList.php?mod=5");
        //echo $uid;
    }
    else
    {
         header("Location: ".$hostpath."/hr.php?res=3");
       // echo "0 results";
    }
}



//$conn->query($qry);
$conn->close();
?>