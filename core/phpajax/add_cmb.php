<?php
require_once("../common/conn.php");
require_once("../rak_framework/insert.php");

session_start();
$usr=$_SESSION["user"];
if($usr==''){ 
	header("Location: ".$hostpath."/hr.php"); 
}else{

extract($_REQUEST);
/*
 add items in mu table with:
name varchar(50)
description varchar(200)
st tinyint(4)
*/
//print_r($_REQUEST);
//exit();
/*
	$name = 'Test 1';
	$description = 'Test Description';
	$st = 5;
*/

if($name){
	
	switch($cmbname){
		case 'cmbdpt':
		$table = 'department';
		break;

		case 'cmbdsg':
		$table = 'designation';
		break;

		case 'cmbcontype':
		$table = 'contacttype';
		break;	
		
			
		case 'district':
		$table = 'district';
		break;			


		case 'country':
		$table = 'country';
		break;	
		
		case 'state':
		$table = 'state';
		break;
		
		case 'cmbindtype':
		$table = 'businessindustry';
		break;
		
		case 'area':
		$table = 'area';
		break;
				
		case 'cmbopttype':
		$table = 'operationstatus';
		break;

		case 'cmbstat':
		$table = 'dealstatus';
		break;
		
		case 'cmblost':
		$table = 'deallostreason';
		break;
		
		case 'itemcat':
		$table = 'itmCat';
		break;


}


	//	echo $table;
	//	exit();
if(checkExistingData($table,'name',$name)){
	
	$query = 'INSERT INTO '.$table.'(`name`)  VALUES("'.$name.'")';
	
	if($conn->query($query) == TRUE){ 
			$msg = "$cmbtitle  added successfully";
			$last_id = mysqli_insert_id($conn);
		}else{
			$msg = "Error" . mysqli_error($conn);
			//$msg = $query;
		}
		
		
		
			## Response
			$response = array(
				"msg" => $msg,
				"success" => 1,
				"value" => $name,
				"id" =>  $last_id,
				"cmbname" =>  $cmbname,
			);
			
				echo json_encode($response);
		
				
	}else{//if(checkExistingData('tbl_applied_companies','trading_code',$_REQUEST['trading_code'])){				
		
		
		$response = array(
			"msg" => $name." already exists",
		);
		echo json_encode($response);
		
	}


				

				
				
	}else{

	$response = array(
    "msg" => "Name is empty",
	);
	echo json_encode($response);
}
	



}
?>