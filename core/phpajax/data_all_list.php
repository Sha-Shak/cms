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
   
    if($action=="paytype")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or descr like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `descr`  FROM paytype where st=1 " ;
        
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
           $seturl="paytypemode.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=paytype&ret=paymodeList&mod=5&id=".$row['id'];
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
                    //"id"=>$empQuery,
            		"title"=>$row['title'],
            		"description"=>$row['descr'],
            		
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="pay")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or descr like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `descr` FROM paymode where st=1";
        
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
           $seturl="paymode.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=paymode&ret=payList&mod=5&id=".$row['id'];
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
            		"description"=>$row['descr'],
            		
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
     else if($action=="board")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or description like '%".$searchValue."%' or photo like '%".$searchValue."%' or iconimage like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`, `photo`, `iconimage` FROM postingboard where st=0";
        
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
           $seturl="board.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=postingboard&ret=boardList&mod=5&id=".$row['id'];
            $photo="../../core/images/upload/board/".$row["photo"];
             $icon="../../core/images/icons/board/".$row["iconimage"];
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
            		"description"=>$row['description'],
            		"photo"=>'<img src='.$photo.' width="50" height="50">',
            		"iconimage"=>'<img src='.$icon.' width="50" height="50">',
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="country")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or shnm like '%".$searchValue."%' or currencycode like '%".$searchValue."%' or currencynm like '%".$searchValue."%' or curencyshnm like '%".$searchValue."%' or description like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `shnm`, `currencycode`, `currencynm`, `curencyshnm`, `description`  FROM country where st=0 " ;
        
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
           $setdelurl="common/delobj.php?obj=country&ret=countryList&mod=5&id=".$row['id'];
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
                    //"id"=>$empQuery,
            		"title"=>$row['title'],
            		"shnm"=>$row['shnm'],
            		"currencycode"=>$row['currencycode'],
            		"currencynm"=>$row['currencynm'],
            		"curencycode"=>$row['curencyshnm'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="state")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( d.title like '%".$searchValue."%' or a.title like '%".$searchValue."%' or a.shnm like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, d.title dn, a.title ab, a.shnm  FROM state a, country d WHERE (a.country=d.id and a.st = 0)";
        
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
           $seturl="state.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=state&ret=stateList&mod=5&id=".$row['id'];
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
            		"title"=>$row['ab'],
            		"shnm"=>$row['shnm'],
            		"dn"=>$row['dn'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="district")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( d.title like '%".$searchValue."%' or a.title like '%".$searchValue."%' or a.shnm like '%".$searchValue."%' or s.title like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, d.title dn, a.title ab, a.shnm, s.title st  FROM district a, country d, state s WHERE (a.country=d.id and s.id= a.state and a.st= 0)";
        
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
           $seturl="district.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=district&ret=districtList&mod=5&id=".$row['id'];
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
            		"title"=>$row['ab'],
            		"shnm"=>$row['shnm'],
            		"dn"=>$row['dn'],
            		"st"=>$row['st'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="areas")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( a.title like '%".$searchValue."%' or c.title like '%".$searchValue."%' or s.title like '%".$searchValue."%' or d.title like '%".$searchValue."%' or a.latitude like '%".$searchValue."%' or a.longtitude like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, a.title ab, c.title cn, s.title sn, d.title dn, a.latitude, a.longtitude FROM area a, country c, state s, district d WHERE (a.countryid=c.id and s.id= a.state and a.district=d.id and a.st= 0)";
        
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
           $seturl="nareas.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=area&ret=nareasList&mod=5&id=".$row['id'];
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
            		"title"=>$row['ab'],
            		"latitude"=>$row['latitude'],
            		"longtitude"=>$row['longtitude'],
            		"cn"=>$row['cn'],
            		"sn"=>$row['sn'],
            		"dn"=>$row['dn'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="chargetype")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or  description like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`  FROM chargetype where st= 0 " ;
        
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
           $seturl="chargetype.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=chargetype&ret=chargetypeList&mod=5&id=".$row['id'];
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
                    //"id"=>$empQuery,
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="collectiontype")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or  description like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`  FROM collectiontype where st=0 " ;
        
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
           $seturl="collectiontype.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=collectiontype&ret=collectiontypeList&mod=5&id=".$row['id'];
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
                    //"id"=>$empQuery,
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="boosttype")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (`title` like '%".$searchValue."%' or description  like '%".$searchValue."%' ) ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`, `icon` from boosttype where st=0 ";
        
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
                $seturl="boosttype.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=boosttype&ret=boosttypeList&mod=5&id=".$row['id'];
                 $photo="../../core/images/icons/boosttype/".$row["icon"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="../../core/images/icons/boosttype/".$row["icon"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		}
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    else if($action=="boost")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (a.`title` like '%".$searchValue."%' or b.`title`  like '%".$searchValue."%' or a.`description` like '%".$searchValue."%' or a.`param`  like '%".$searchValue."%' or a.`paramvalue`  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, a.`title` bn, b.`title` btn, a.`param`,a.`paramvalue`, a.`description`,a.`effectivedt` from boost a, boosttype b where a.typeid=b.id and a.st=1";
        
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
                $seturl="boost.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=boost&ret=boostList&mod=5&id=".$row['id'];
                $effectivedt= $row['effectivedt'];
                $effectivedt= substr($effectivedt, 0, 10);
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
            		"boosttype"=>$row['btn'],
            		"param"=>$row['param'],
            		"paramvalue"=>$row['paramvalue'],
            		"description"=>$row['description'],
            		"effectivedt"=>$effectivedt,
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="package")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (`title` like '%".$searchValue."%' or description  like '%".$searchValue."%' ) ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`, `icon` from package where st=0 ";
        
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
                $seturl="package.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=package&ret=packageList&mod=5&id=".$row['id'];
                 $photo="../../core/images/icons/package/".$row["icon"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="../../core/images/icons/package/".$row["icon"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		}
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="packagesetup")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (p.`title` like '%".$searchValue."%' or a.`description`  like '%".$searchValue."%' or b.`title` like '%".$searchValue."%' or c.`title` like '%".$searchValue."%' or a.`limits`  like '%".$searchValue."%' or d.`title`  like '%".$searchValue."%' or a.`chargeamount`  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, p.`title` bn, a.`description`, b.`title` cn, a.`limits`, c.`title` chn, d.`title` cln,a.`chargeamount`, a.`effectivedt` from pakagesetup a, country b, chargetype c, collectiontype d, package p where a.pakagesetup= p.id and a.countryid=b.id and a.chargetype= c.id and a.collectiontype= d.id and a.st=1";
        
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
                $seturl="packagesetup.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=pakagesetup&ret=packagesetupList&mod=5&id=".$row['id'];
                $effectivedt= $row['effectivedt'];
                $effectivedt= substr($effectivedt, 0, 10);
              
                $sl=$sl+1;  
                $data[] = array(
                    "id"=>$sl,
            		"packagesetup"=>$row['bn'],
            		"description"=>$row['description'],
            		"country"=>$row['cn'],
            		"limits"=>$row['limits'],
            		"chargetype"=>$row['chn'],
            		"collectiontype"=>$row['cln'],
            		"chargeamount"=>$row['chargeamount'],
            		"effectivedt"=>$effectivedt,
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="commission")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (b.`title` like '%".$searchValue."%' or c.`title`  like '%".$searchValue."%' or a.`description` like '%".$searchValue."%' or d.`title`  like '%".$searchValue."%' or a.`chargeamount`  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, b.`title` bn, a.`description`, c.`title` cn, d.`title` dn, a.`chargeamount`, a.`effectivedt` from commissionsetup a, postingboard b, chargetype c, collectiontype d where a.board=b.id and a.chargetype = c.id and a.collectiontype = d.id and a.st=1";
        
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
                $seturl="commissionsetup.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=commissionsetup&ret=commissionsetupList&mod=5&id=".$row['id'];
                $effectivedt= $row['effectivedt'];
                $effectivedt= substr($effectivedt, 0, 10);
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
            		"board"=>$row['bn'],
            		"description"=>$row['description'],
            		"chargetype"=>$row['cn'],
            		"collectiontype"=>$row['dn'],
            		"chargeamount"=>$row['chargeamount'],
            		"effectivedt"=>$effectivedt,
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="vmoneytype")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( title like '%".$searchValue."%' or description like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT `id`, `title`, `description`  FROM virtualmoneyType where st=0 " ;
        
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
           $seturl="vmoneytype.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=virtualmoneyType&ret=vmoneytypeList&mod=5&id=".$row['id'];
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
                    //"id"=>$empQuery,
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="vmoney")
    {
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (a.`title` like '%".$searchValue."%' or a.`offeramount` like '%".$searchValue."%' or b.`title` like '%".$searchValue."%' or c.`title`  like '%".$searchValue."%' or a.`description` like '%".$searchValue."%' or a.`chargeamount`  like '%".$searchValue."%') ";
        }
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT a.`id`, a.`title` an, b.`title` bn, a.`offeramount`, c.`title` cn, a.`chargeamount`, a.`efectfrom`, a.`effectto`, a.`description` from virtualmoney a, virtualmoneyType b, chargetype c where a.vmoneytype=b.id and a.chargetype = c.id and a.st=1";
        
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
                $seturl="vmoney.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
                $setdelurl="common/delobj.php?obj=virtualmoney&ret=vmoneyList&mod=5&id=".$row['id'];
                $effectfrom= $row['efectfrom'];
                $effectfrom= substr($effectfrom, 0, 10);
                
                $effectto= $row['effectto'];
                $effectto= substr($effectto, 0, 10);
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
            		"title"=>$row['an'],
            		"description"=>$row['description'],
            		"vmoneytype"=>$row['bn'],
            		"offeramount"=>$row['offeramount'],
            		"chargetype"=>$row['cn'],
            		"chargeamount"=>$row['chargeamount'],
            		"effectfrom"=>$effectfrom,
            		"effectto"=>$effectto,
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
    else if($action=="category")
    {
        
        if($searchValue != ''){
        	$searchQuery = " and ( i1.title like '%".$searchValue."%' or i.descr like '%".$searchValue."%' or i.`title` like '%".$searchValue."%') ";
        }
        
        ## Total number of records without filtering   #c.`id`,
        
        $strwithoutsearchquery="SELECT  i.`id`,i1.title parn, i.`title`, i.`descr`, i.`photo`, i.`iconeimage` FROM catagory i left join catagory i1 on i.parentno=i1.id where i.st=0";
        
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
           $seturl="catagory.php?res=4&msg='Update Data'&id=".$row['id']."&mod=5";
           $setdelurl="common/delobj.php?obj=catagory&ret=catagoryList&mod=5&id=".$row['id'];
            $photo="../../core/images/upload/category/".$row["photo"];
             $icon="../../core/images/icons/category/".$row["iconeimage"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            /* if (file_exists($photo)) {
        		$photo="../../dev/assets/images/brand_logos/".$row["image"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		} */
        		
        		
        		$sl=$sl+1;
            $data[] = array(
                    "id"=>$sl,
                    "parn"=>$row['parn'],
            		"title"=>$row['title'],
            		"description"=>$row['descr'],
            		"photo"=>'<img src='.$photo.' width="50" height="50">',
            		"icon"=>'<img src='.$icon.' width="50" height="50">',
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
            	);
        } 
    }
    
     else if($action=="boosttpst")
    {
        
        //generation status combo
	$statusStr = 'SELECT `id`, `title` FROM `objstatus` ';
	//echo $statusStr;
	
	
		$statusResult = $conn->query($statusStr);
		if ($statusResult->num_rows > 0){
			while($statusRow = $statusResult->fetch_assoc()){
				$thisClass = str_replace(" ","_",$statusRow['title']);
				$statusCombo .= '<li class="col-xs-6"><a href="javascript:void(0)" data-statusid="'.$statusRow['id'].'" class="'.strtolower($thisClass).'">'.$statusRow['title'].'</a></li>';
				
			 }
		}
  //end generation status combo		

        
        
        
        
        $searchQuery = " ";
        if($searchValue != '')
        {
        	$searchQuery = " and (b.title like '%".$searchValue."%' or b.description like '%".$searchValue."%') ";
        } 
        ## Total number of records without filtering   #c.`id`,
        $base_qry="SELECT b.`id`, b.`title`, b.`description`, b.`icon`,s.title st from boosttype b left join objstatus s on b.st=s.id where 1=1  ";
        $strwithoutsearchquery=$base_qry;
        
        $sel = mysqli_query($con,$strwithoutsearchquery);
        $totalRecords = $sel->num_rows;
        
        ## Total number of records with filtering # c.`id`,
        
        $strwithsearchquery=$base_qry.$searchQuery ;
         
        $sel = mysqli_query($con,$strwithsearchquery);
        $totalRecordwithFilter = $sel->num_rows;
        
        ##.`id`,
        
         $empQuery=$base_qry.$searchQuery."  order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();
        
        while ($row = mysqli_fetch_assoc($empRecords)) 
        {
            //$seturl="deal.php?res=4&msg='Update Data'&id=".$row['id']."&mod=2";
            // $conthisturl="contactDetail.php?id=".$row['lid']."&mod=2";
            // $conthisturl1="contactDetail_org.php?id=".$row['orid']."&mod=2";
             $photo="../../core/images/icons/boosttype/".$row["icon"];
            //$conthisturl="contactDetail.php?id=".$row['id']."&mod=2";
            if (file_exists($photo)) {
        		$photo="../../core/images/icons/boosttype/".$row["icon"]."?nocache=".time();
        		}else{
        			$photo="images/blankuserimage.png";
        		}
              
              $sl=$sl+1;  
            $data[] = array(
                    "id"=>$sl,
                    "photo"=>'<img src='.$photo.' width="50" height="50">',
            		"title"=>$row['title'],
            		"description"=>$row['description'],
            		"status"=>'<td>
					
										
                                      <div class="">
                                        <a class="bit-btn dropdown-toggle" id="menu2" type="button" data-toggle="dropdown" data-id="'.$row['id'].'">
                                            <span>
                                                '.$row["st"].'
                                                <span class="caret"></span>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-mega">
                                            <ul class="row">
                                              '.$statusCombo.'
                                            </ul>                                    
                                        </div>
                                      </div>                                         
                                    <input type="hidden" class="status '.strtolower(str_replace(" ","_",$row["st"])).' dropdown">    
                                    </td>',	
            		"edit"=>'<a class="btn btn-info btn-xs"  href="'. $seturl.'">Edit</a>',
            		"del"=>'<a class="btn btn-info btn-xs" onclick="javascript:confirmationDelete($(this));return false;"  href="'. $setdelurl.'" >Delete</a>'
                
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