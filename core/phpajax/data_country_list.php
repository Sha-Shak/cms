<?php

require "../common/conn.php";
$con = $conn;

## Read value
$draw = $_POST['draw']; 
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$action= $_GET['action'];

## Search 
    if($action=="attr")
    {
        $searchQuery = " ";
        if($searchValue != ''){
        	$searchQuery = " and (a.name like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $basequery="SELECT a.id,a.name, GROUP_CONCAT(v.`attributevalue` ORDER BY v.attributevalue ASC SEPARATOR ', ') atrv
   from attribute a left join attributevalue v on a.code=v.attribute where 1=1 ";
   
        $strwithoutsearchquery=$basequery." GROUP BY a.id,a.name,v.attribute ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$basequery.$searchQuery." GROUP BY a.id,a.name,v.attribute ";
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;

        ##.`id`,
        
         $empQuery=$strwithsearchquery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        #$searchQuery
        
        $empRecords = mysqli_query($con, $strwithoutsearchquery);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($empRecords)) {
           $seturl="attribute.php?res=4&msg='Update Data'&id=".$row['id']."&mod=1";
           $setdelurl="common/delobj.php?obj=attribute&ret=attributeList&mod=1&id=".$row['id'];
           
            $data[] = array(
            		"name"=>$row['name'],
            		"atv"=>$row['atrv'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
   
     else if($action=="country")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( name like '%".$searchValue."%' or name like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT * FROM cmscountry";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        ##.`id`,
         $empQuery=$strwithsearchquery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        //print_r($empQuery);exit();
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        $sl=0;
        while ($row = mysqli_fetch_assoc($empRecords)) {
           $seturl="country.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delcountry.php?mod=5&id=".$row['id'];
            //$photo="../../assets/images/brand_logos/".$row["image"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            /* if (file_exists($photo)) {
        		$photo="../../dev/assets/images/brand_logos/".$row["image"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		} */
        		
        		
        		$sl=$sl+1;
            $data[] = array(
                    "id"=>$sl,
            		"title"=>$row['title'],
            		"shnm"=>$row['shnm'],
            		"currency"=>$row['cureny'],
            		"dialcode"=>$row['dialcode'],
            		
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
     else if($action=="hc") 
    {
        $searchQuery = " ";
        if($searchValue != ''){
        	$searchQuery = " and (a.`employeecode` like '%".$searchValue."%' or 
                 concat(`firstname`, `lastname`)  like '%".$searchValue."%' or dob like '%".$searchValue."%' or office_contact like '%".$searchValue."%' or
                office_email like '%".$searchValue."%' or nid like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="select `id`, `employeecode`, concat(`firstname`, `lastname`) `name`, `dob`,`nid`,`office_contact`,`office_email`,`bloodgroup`, `photo` FROM `employee` where 1=1 ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;

        ##.`id`,
        
         $empQuery=$strwithoutsearchquery.$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        
        
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($empRecords)) {
           $seturl="hc.php?res=4&msg='Update Data'&id=".$row['id']."&mod=4";
            $photo=$rootpath."/common/upload/hc/".$row["employeecode"].".jpg";
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="common/upload/hc/".$row["employeecode"].".jpg";
        		}else{
        			$photo="images/blankuserimage.png";
        		}
            $data[] = array(
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
                   	"employeecode"=>$row['employeecode'],
            		"name"=>$row['name'],
            		"dob"=>$row['dob'],
            		"office_contact"=>$row['office_contact'],
        			"office_email"=>$row['office_email'],
            		"nid"=>$row['nid'],
        			"bloodgroup"=>$row['bloodgroup'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>'
            	);
        } 
    }
    else if($action=="privl")
    {
        $searchQuery = " ";
        if($searchValue != ''){
        	$searchQuery = " and (concat(e.`firstname`,e.`lastname`) like  '%".$searchValue."%' or a.`id` like '%".$searchValue."%' or h.`resourse_id` like '%".$searchValue."%' or  m.menuNm  like '%".$searchValue."%' ) ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`,h.resourse_id,concat(e.`firstname`,e.`lastname`) nm , m.menuNm,( case `menu_priv`  when 1 then 'Log In'   when 2 then 'Only View' when 3 then 'Upto Create' when 4 then 'Up to Update' when 5 then 'Up to Delete' else 'No Privillage' end) priv 
        FROM `hrAuth` a join `hr` h on a.hrid=h.id  join `mainMenu` m on a.menuid= m.id join employee e on h.emp_id=e.employeecode
       where 1=1 ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        
        ##.`id`,
        
         $empQuery="SELECT a.`id`,h.resourse_id,concat(e.`firstname`,e.`lastname`) nm , m.menuNm,( case `menu_priv`  when 1 then 'Log In'   when 2 then 'Only View' when 3 then 'Upto Create' when 4 then 'Up to Update' when 5 then 'Up to Delete' else 'No Privillage' end) priv 
        FROM `hrAuth` a join `hr` h on a.hrid=h.id  join `mainMenu` m on a.menuid= m.id join employee e on h.emp_id=e.employeecode
       where 1=1 ";
       //.$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        
        //echo $empQuery;exit;
        //exit;
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($empRecords)) {
           $seturl="priv.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
            $photo=$rootpath."/common/upload/hc/".$row["resourse_id"].".jpg";
            $conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="common/upload/hc/".$row["resourse_id"].".jpg";
        		}else{
        			$photo="images/blankuserimage.png";
        		}
            $data[] = array(
                    "id"=>$row['nm'],
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
            		"resourse_id"=>$row['resourse_id'],
            		"menuNm"=>$row['menuNm'],
            		"priv"=>$row['priv'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>'
            	);
        } 
    }
    else
    {
    
    }
        //$data[] = array('dt'=>$empQuery);
        //$seturl="contact.php?res=4&msg='Update Data'&id=".$uid."&mod=2";
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        
        echo json_encode($response);

?>