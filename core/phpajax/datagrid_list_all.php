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
    if($action=="area")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( d.name like '%".$searchValue."%' or a.name like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, d.name dn, a.name  FROM areas a, districts d WHERE a.district_id=d.id   ";
        
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
           $seturl="areas.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=areas&ret=areaList&mod=5&id=".$row['id'];
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
            		"name"=>$row['name'],
            		"dn"=>$row['dn'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    else if($action=="cat")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (c1.`title` like '%".$searchValue."%' or c2.title  like '%".$searchValue."%' ) ";
        }
        ## Total number of records without filtering   #c.`id`,
        
                $strwithoutsearchquery="SELECT c1.`id`, c1.`title`,c2.title `parentid`,c1.level,c1.image FROM catagory c1
left join catagory c2 on c1.parentid=c2.id where 1=1 ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        
         $empQuery=$strwithoutsearchquery.$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        $sl=0;
        while ($row = mysqli_fetch_assoc($empRecords)) 
        {      
                $seturl="catagory.php?res=4&msg='Update Data'&id=".$row['id']."&mod=1";
                $setdelurl="common/delobj.php?obj=catagory&ret=catagoryList&mod=1&id=".$row['id'];
                 $photo="../../assets/images/categories/".$row["image"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="../../dev/assets/images/categories/".$row["image"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		}
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
            		"title"=>$row['title'],
            		"parentid"=>$row['parentid'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    else if($action=="prod")
    {
        $searchQuery = " ";
        
        if($searchValue != '')
        {
        	$searchQuery = " and (p.productcode like '%".$searchValue."%' or p.name  like '%".$searchValue."%' or c.name  like '%".$searchValue."%' 
        	or p.cost  like '%".$searchValue."%'  or p.mrp  like '%".$searchValue."%'  or p.discount  like '%".$searchValue."%' 
        	or p.vat  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT p.id,p.productcode,p.name,c.name catg,p.cost,p.mrp,p.discount,p.vat,p.image FROM product p left join itemtype c on p.catagory=c.id where 1=1 ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        
         $empQuery=$strwithoutsearchquery.$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        $sl=0;
        while ($row = mysqli_fetch_assoc($empRecords)) 
        {       
                $seturl="product.php?res=4&msg='Update Data'&id=".$row['id']."&mod=1";
                $setdelurl="common/delobj.php?obj=product&ret=productList&mod=1&id=".$row['id'];
                $photo="../../dev/assets/images/product/70_75/".$row['image'];
               // $alrt="onClick=\'javascript:return confirm('are you sure you want to delete this?');\'"
                $alrt="=onclick='javascript::return confirm(are you sure you want to delete this)'";
            $sl=$sl+1;    
            $data[] = array(
                	"id"=>$sl,
                    "image"=>'<img src='.$photo.' width="50" height="50">',
            		"code"=>$row['productcode'],
            		"name"=>$row['name'],
            		"catg"=>$row['catg'],
            		"cost"=>number_format($row['cost'],2),
            		"mrp"=>number_format($row['mrp'],2),
            		"discount"=>number_format($row['discount'],2),
            		"vat"=>number_format($row['vat'],2),
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    else if($action=="stock")
    {
        $searchQuery = " ";
        
        if($searchValue != '')
        {
        	$searchQuery = " and (p.productcode like '%".$searchValue."%' or p.name like '%".$searchValue."%' or t.name  like '%".$searchValue."%' or s.freeqty  like '%".$searchValue."%' 
        	or s.bookqty  like '%".$searchValue."%'  or s.costprice  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT s.id,p.id pid,p.productcode,p.image, s.product,p.name prod,t.name typ, s.freeqty, s.bookqty, s.costprice FROM stock s , product p,itemtype t 
          where s.product=p.id and p.catagory=t.id and 1=1 ";
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        $strwithsearchquery=$strwithoutsearchquery.$searchQuery;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        
         $empQuery=$strwithoutsearchquery.$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        $sl=0;
        while ($row = mysqli_fetch_assoc($empRecords)) 
        {       
                $seturl="product.php?res=4&msg='Update Data'&id=".$row['pid']."&mod=1";
               // $setdelurl="common/delobj.php?obj=product&ret=productList&mod=1&id=".$row['id'];
                $photo="../../dev/assets/images/product/70_75/".$row['image'];
               // $alrt="onClick=\'javascript:return confirm('are you sure you want to delete this?');\'"
                //$alrt="=onclick='javascript::return confirm(are you sure you want to delete this)'";
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
                    "image"=>'<img src='.$photo.' width="50" height="50">',
                    "productcode"=>$row['productcode'],
            		"prod"=>$row['prod'],
            		"typ"=>$row['typ'],
            		"freeqty"=>number_format($row['freeqty'],0),
            		"bookqty"=>number_format($row['bookqty'],0),
            		"costprice"=>number_format($row['costprice'],2)
            	);
        } 
    }
    else if($action=="hc") 
    {
        $searchQuery = " ";
        if($searchValue != ''){
        	$searchQuery = " and (`employeecode` like '%".$searchValue."%' or 
                 concat(`firstname`, `lastname`)  like '%".$searchValue."%' or dob like '%".$searchValue."%' or office_contact like '%".$searchValue."%' or
                office_email like '%".$searchValue."%' or nid like '%".$searchValue."%' or bloodgroup like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="select `id`, `employeecode`, concat(`firstname`,' ', `lastname`) `name`, `dob`,`nid`,`office_contact`,`office_email`,`bloodgroup`, `photo` FROM `employee` where st=1 ";
        
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
           $seturl="hc.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=employee&ret=hcList&mod=5&id=".$row['id'];
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
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs"  href="'. $setdelurl.'">Delete</a>'
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