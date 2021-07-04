<?php
require "conn.php";

if ( isset( $_POST['cancel'] ) ) {
      header("Location: ".$hostpath."/hc.php?res=01&msg='New Entry'&id=''&mod=5");
}
else
{
    if ( isset( $_POST['add'] ) ) {
       // $make_yr=date('Y');
      //  $getpo="SELECT concat(YEAR(CURDATE()),(max(substring(poid,5))+1)) po FROM `po`";
        $code= $_REQUEST['cd']; 
        
        
        $fnm = str_replace("'"," ",$_POST['fnm']); 
        $lnm = str_replace("'"," ",$_POST['lnm']);               if($lnm==''){$lnm='NULL';}
        $dob = $_POST['dob'];               if($dob==''){$dob='NULL';}
        $cmbdsg = $_POST['cmbdsg'];         if($cmbdsg==''){$cmbdsg='NULL';}
        $cmbmartial = $_POST['cmbmartial']; if($cmbmartial==''){$cmbmartial='NULL';}
        $nid = str_replace("'"," ",$_POST['nid']);               if($nid==''){$nid='NULL';}
        $tin = str_replace("'"," ",$_POST['tin']);               if($tin==''){$tin='NULL';}
        $cmbbg = $_POST['cmbbg'];           if($cmbbg==''){$cmbbg='NULL';}
        $pp = str_replace("'"," ",$_POST['pp']);                 if($pp==''){$pp='NULL';}
        $drvid = str_replace("'"," ",$_POST['drvid']);           if($drvid==''){$drvid='NULL';}
        $preaddr = str_replace("'"," ",$_POST['preaddr']);       if($preaddr==''){$preaddr='NULL';}
        $area= str_replace("'"," ",$_POST['area']);              if($area==''){$area='NULL';}
        $zip = str_replace("'"," ",$_POST['zip']);               if($zip==''){$zip='NULL';}
        $district = $_POST['district'];     if($district==''){$district='NULL';}
        $country = $_POST['country'];       if($country==''){$country='NULL';}
        
        $off_cont = str_replace("'"," ",$_POST['off_cont']);     if($off_cont==''){$off_cont='NULL';}
        $ext = str_replace("'"," ",$_POST['ext']);               if($ext==''){$ext='NULL';}
        $per_cont = str_replace("'"," ",$_POST['per_cont']);     if($per_cont==''){$per_cont='NULL';}
        $alt_cont = str_replace("'"," ",$_POST['alt_cont']);     if($alt_cont==''){$alt_cont='NULL';}
        $ofc_email = str_replace("'"," ",$_POST['ofc_email']);   if($ofc_email==''){$ofc_email='NULL';}
        $per_email = str_replace("'"," ",$_POST['per_email']);   if($per_email==''){$per_email='NULL';}
        $alt_email = str_replace("'"," ",$_POST['alt_email']);   if($alt_email==''){$alt_email='NULL';}
        $poc1 = str_replace("'"," ",$_POST['poc1']);             if($poc1==''){$poc1='NULL';}
        $poc1_rel = str_replace("'"," ",$_POST['poc1_rel']);     if($poc1_rel==''){$poc1_rel='NULL';}
        $poc1_cont = str_replace("'"," ",$_POST['poc1_cont']);   if($poc1_cont==''){$poc1_cont='NULL';}
        $poc1_addr = str_replace("'"," ",$_POST['poc1_addr']);   if($poc1_addr==''){$poc1_addr='NULL';}
        $poc2 = str_replace("'"," ",$_POST['poc2']);             if($poc2==''){$poc2='NULL';}
        $poc2_rel = str_replace("'"," ",$_POST['poc2_rel']);     if($poc2_rel==''){$poc2_rel='NULL';}
        $poc2_cont = str_replace("'"," ",$_POST['poc2_cont']);   if($poc2_cont==''){$poc2_cont='NULL';}
        $poc2_addr = str_replace("'"," ",$_POST['poc2_addr']);
           if($poc2_addr==''){$poc2_addr='NULL';}
        $poc3 = str_replace("'"," ",$_POST['poc3']);             if($poc3==''){$poc3='NULL';}
        $poc3_rel = str_replace("'"," ",$_POST['poc3_rel']);     if($poc3_rel==''){$poc3_rel='NULL';}
        $poc3_cont = str_replace("'"," ",$_POST['poc3_cont']);   if($poc3_cont==''){$poc3_cont='NULL';}
        $poc3_addr = str_replace("'"," ",$_POST['poc3_addr']);   if($poc3_addr==''){$poc3_addr='NULL';}
        $hrid = $_POST['$usr'];
      
      
        $totalup = count($_FILES['attachment1']['name']);
        $att1=$code;
        $tmpFilePath = $_FILES['attachment1']['tmp_name'];
        if ($tmpFilePath != ""){ $newFilePath = "upload/hc/" .$code.".jpg";
                 $didUpload = move_uploaded_file($tmpFilePath, $newFilePath); }
        /*
        for( $j=0 ; $j < $totalup ; $j++ ) {
             $tmpFilePath = $_FILES['attachment1']['tmp_name'][$j];
             if ($tmpFilePath != ""){ $newFilePath = "upload/item/" .$code. $_FILES['attachment1']['name'][$j];
                 $didUpload = move_uploaded_file($tmpFilePath, $newFilePath);
                 $att1=$att1.",".$_FILES['attachment1']['name'][$j];
             }
        }
        */
    
       // $hrid= '1';
        $make_date=date('Y-m-d H:i:s');
        $op_date =date('Y-m-d');
        
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $passw =substr(str_shuffle($chars),0,8);
      
        $qry="insert into employee(`employeecode`, `firstname`, `lastname`, `dob`, `gender`, `maritialstatus`, `nid`, `tin`, `bloodgroup`, `pp`, `drivinglicense`, `presentaddress`, `area`, `district`, `postal`, `country`, `office_contact`, `ext_contact`, `pers_contact`, `alt_contact`, `office_email`, `pers_email`, `alt_email`, `emergency_poc1`, `poc1_relation`, `poc1_contact`, `poc1_address`, `emergency_poc2`, `poc2_relation`, `poc2_contact`, `poc2_address`, `emergency_poc3`, `poc3_relation`, `poc3_contact`, `poc3_address`, `photo`,  `opdate`, `makeby`, `makedt`) 
        values('".$code."','".$fnm."','".$lnm."',STR_TO_DATE('".$dob."', '%d/%m/%Y'),'".$cmbdsg."','".$cmbmartial."','".$nid."','".$tin."','".$cmbbg."','".$pp."','".$drvid."','".$preaddr."','".$area."',".$district.",'".$zip."',".$country.",'".$off_cont."','".$ext."','".$per_cont."','".$alt_cont."','".$ofc_email."','".$per_email."','".$alt_email."','".$poc1."','".$poc1_rel."','".$poc1_cont."','".$poc1_addr."','".$poc2."','".$poc2_rel."','".$poc2_cont."','".$poc2_addr."','".$poc3."','".$poc3_rel."','".$poc3_cont."','".$poc3_addr."','".$code."','".$op_date."','".$hrid."','".$make_date."')" ;
        $err="Employee created successfully";
        
                        if($ofc_email=='NULL'){$empEmail='huq.sami@hotmail.com';} else{ $empEmail=$ofc_email;}
                        if($per_cont==''){$cell='01687810552';} else{ $cell=$per_cont;}
                        $usrqry="insert into hr(`emp_id`, `resourse_id`, `hidden_char`, `hrName`, `user_tp`, `email`, `cellNo`, `active_st`, `make_dt`)
                        values( '".$code."','".$code."','".$passw."','".$fnm."',1,'".$empEmail."','".$cell."','1','".$make_date."')";
                        //echo $itqry;die;
                         if ($conn->query($usrqry) == TRUE) 
                         { $err="User added successfully"; 
                         $emlmsg="Dear ".$fnm.",
A user has been created for you in CashMyStash with bellow credentials.

User: ".$code." 
Password:  ".$passw."

You can log in using bellow link:
'http://bithut.com.bd/core/hr.php'

Thanks,
CMS Admin";
                         mail($empEmail,"User Info For CMS BitFlow ",$emlmsg);
                         }
        
 // echo $qry; die;
    }
    if ( isset( $_POST['update'] ) ) {
        $aid= $_REQUEST['acid'];
        $code= $_REQUEST['cd'];
         $fnm = str_replace("'"," ",$_POST['fnm']); 
        $lnm = str_replace("'"," ",$_POST['lnm']);               if($lnm==''){$lnm='NULL';}
        $dob = $_POST['dob'];               if($dob==''){$dob='NULL';}
        $cmbdsg = $_POST['cmbdsg'];         if($cmbdsg==''){$cmbdsg='NULL';}
        $cmbmartial = $_POST['cmbmartial']; if($cmbmartial==''){$cmbmartial='NULL';}
        $nid = str_replace("'"," ",$_POST['nid']);               if($nid==''){$nid='NULL';}
        $tin = str_replace("'"," ",$_POST['tin']);               if($tin==''){$tin='NULL';}
        $cmbbg = $_POST['cmbbg'];           if($cmbbg==''){$cmbbg='NULL';}
        $pp = str_replace("'"," ",$_POST['pp']);                 if($pp==''){$pp='NULL';}
        $drvid = str_replace("'"," ",$_POST['drvid']);           if($drvid==''){$drvid='NULL';}
        $preaddr = str_replace("'"," ",$_POST['preaddr']);       if($preaddr==''){$preaddr='NULL';}
        $area= str_replace("'"," ",$_POST['area']);              if($area==''){$area='NULL';}
        $zip = str_replace("'"," ",$_POST['zip']);               if($zip==''){$zip='NULL';}
        $district = $_POST['district'];     if($district==''){$district='NULL';}
        $country = $_POST['country'];       if($country==''){$country='NULL';}
        
        $off_cont = str_replace("'"," ",$_POST['off_cont']);     if($off_cont==''){$off_cont='NULL';}
        $ext = str_replace("'"," ",$_POST['ext']);               if($ext==''){$ext='NULL';}
        $per_cont = str_replace("'"," ",$_POST['per_cont']);     if($per_cont==''){$per_cont='NULL';}
        $alt_cont = str_replace("'"," ",$_POST['alt_cont']);     if($alt_cont==''){$alt_cont='NULL';}
        $ofc_email = str_replace("'"," ",$_POST['ofc_email']);   if($ofc_email==''){$ofc_email='NULL';}
        $per_email = str_replace("'"," ",$_POST['per_email']);   if($per_email==''){$per_email='NULL';}
        $alt_email = str_replace("'"," ",$_POST['alt_email']);   if($alt_email==''){$alt_email='NULL';}
        $poc1 = str_replace("'"," ",$_POST['poc1']);             if($poc1==''){$poc1='NULL';}
        $poc1_rel = str_replace("'"," ",$_POST['poc1_rel']);     if($poc1_rel==''){$poc1_rel='NULL';}
        $poc1_cont = str_replace("'"," ",$_POST['poc1_cont']);   if($poc1_cont==''){$poc1_cont='NULL';}
        $poc1_addr = str_replace("'"," ",$_POST['poc1_addr']);   if($poc1_addr==''){$poc1_addr='NULL';}
        $poc2 = str_replace("'"," ",$_POST['poc2']);             if($poc2==''){$poc2='NULL';}
        $poc2_rel = str_replace("'"," ",$_POST['poc2_rel']);     if($poc2_rel==''){$poc2_rel='NULL';}
        $poc2_cont = str_replace("'"," ",$_POST['poc2_cont']);   if($poc2_cont==''){$poc2_cont='NULL';}
        $poc2_addr = str_replace("'"," ",$_POST['poc2_addr']);   if($poc2_addr==''){$poc2_addr='NULL';}
        $poc3 = str_replace("'"," ",$_POST['poc3']);             if($poc3==''){$poc3='NULL';}
        $poc3_rel = str_replace("'"," ",$_POST['poc3_rel']);     if($poc3_rel==''){$poc3_rel='NULL';}
        $poc3_cont = str_replace("'"," ",$_POST['poc3_cont']);   if($poc3_cont==''){$poc3_cont='NULL';}
        $poc3_addr = str_replace("'"," ",$_POST['poc3_addr']);   if($poc3_addr==''){$poc3_addr='NULL';}
        
        $qry="update employee set `firstname`='".$fnm."',`lastname`='".$lnm."',`dob`=STR_TO_DATE('".$dob."', '%d/%m/%Y'),`gender`='".$cmbdsg."'
        ,`maritialstatus`='".$cmbmartial."',`nid`='".$nid."',`tin`='".$tin."',`bloodgroup`='".$cmbbg."',`pp`='".$pp."',`drivinglicense`='".$drvid."'
        ,`presentaddress`='".$preaddr."',`area`='".$area."',`district`=".$district.",`postal`='".$zip."',`country`=".$country." 
        , `office_contact`='".$off_cont."', `ext_contact`='".$ext."', `pers_contact`='".$per_cont."', `alt_contact`='".$alt_cont."', `office_email`='".$ofc_email."'
        , `pers_email`='".$per_email."', `alt_email`='".$alt_email."', `emergency_poc1`='".$poc1."', `poc1_relation`='".$poc1_rel."'
        , `poc1_contact`='".$poc1_cont."', `poc1_address`='".$poc1_addr."', `emergency_poc2`='".$poc2."', `poc2_relation`='".$poc2_rel."'
        , `poc2_contact`='".$poc2_cont."', `poc2_address`='".$poc2_addr."', `emergency_poc3`='".$poc3."', `poc3_relation`='".$poc3_rel."'
        , `poc3_contact`='".$poc3_cont."', `poc3_address`='".$poc3_addr."', `photo`='".$code."'   where `id`=".$aid."";
        $err="Employee updated successfully";
       // echo $qry;die;
        
        $totalup = count($_FILES['attachment1']['name']);
        $att1=$code;
        $tmpFilePath = $_FILES['attachment1']['tmp_name'];
        if ($tmpFilePath != ""){ $newFilePath = "upload/hc/" .$code.".jpg";
                 $didUpload = move_uploaded_file($tmpFilePath, $newFilePath); }
        
       // echo $qry;die;
    }
   
    if ($conn->connect_error) {
       echo "Connection failed: " . $conn->connect_error;
    }
    
    if ($conn->query($qry) == TRUE) {
                header("Location: ".$hostpath."/hcList.php?res=1&msg=".$err."&id=".$aid."&mod=5");
    } else {
         $err="Error: " . $qry . "<br>" . $conn->error;
          header("Location: ".$hostpath."/hc.php?res=2&msg=".$err."&id=''&mod=5");
    }
    
    $conn->close();
}
?>