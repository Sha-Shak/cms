<?php

session_start();
$usr=$_SESSION["user"];
if($usr=='')
{ header("Location: ".$hostpath."/hr.php"); 
}
else
{
    $invoice= $_GET['invid'];
    $invamt= $_GET['invamount'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Invoice</title>
<link rel="icon" href="../images/favicon.png">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome4.0.7.css" rel="stylesheet">
<link href="../css/fonts.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/style_extended.css" rel="stylesheet">
</head>
<body class="cmb-form">

  

	<form id="cmdForm">

      <div style="heig ht:20px; border:0px solid #000; text-align:center" class="alertmsg">&nbsp;</div>
      <div class="row">
      
     
      
      	<div class="col-xs-12">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-group">
                    <input type="hidden"  name="invoiceid" id="invoiceid" value="<?php echo $invoice;?>"> 
                    <input type="hidden"  name="invamount" id="invamount" value="<?php echo $invamt;?>"> 
		            <input type="hidden"  name="usrid" id="usrid" value="<?php echo $usr;?>">
                    <label for="amt">Amount *</label>
                    <input type="text" class="form-control" id="amt" name="amt"  value="<?php echo $invamt;?>" required>
                </div>        
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="cmbdrcr"> Transaction Mode*</label>
                    <div class="form-group styled-select">
                    <select name="cmbdrcr" id="cmbdrcr" class="form-control" required>
                        <option value="" >Select</option>
                        <option value="W">Debit Wallet</option>
                        <option value="C" >Cash Received</option>
                    </select>
                    </div>
                </div>        
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="rem">Remarks *</label>
                    <input type="text" class="form-control" id="rem" name="rem" >
                </div>        
            </div>
        </div>
        

      	<div class="col-xs-12">
          <div class="form-group">
              <input class="btn btn-lg btn-default cmb-submit" type="button" name="add" value="Save" on click="javascript:saveData();">
              <input class="btn btn-lg btn-default" type="button" name="cancel" value="Close"  id="cancel" onClick="closeModal()">
          </div>        
        </div>                 
   
      </div>
 
  
	</form>





<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="../js/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script> 
<script src="../js/bootstrap.min.js"></script> 

<!-- scrollbar  ==================================== -->
<script src="../js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> 
<!-- end scrollbar  ==================================== -->




<script src="../js/custom.js"></script></body>

<script>
function closeModal(){
	//parent.$('#iframeModal').modal('hide');
//	$('#iframeModal', window.parent.document).find(".cmb-modal").modal('hide');
	window.parent.CloseModal(window.frameElement);
	
	//alert('d');
}

$(".cmb-submit").click(function(){



	var postData = $("#cmdForm").serialize();
	
	//alert(postData);
	
	 $.ajax({
            type: "POST",
            url: "../common/addinvoice.php",

			data:postData,
			beforeSend: function(){
					$(".alertmsg").html("Saving data...");
				},
		 
        }).done(function(data){
            //root.find(".measure-unit").html(data);
			
			//$(".cmd-child").empty();
			//$(".cmd-child").find('option').not(':first').empty();
			//$(".cmd-child").append(data);
			
			//messageAlert(data);
			
			var obj = JSON.parse(data);
			

			messageCmbAlert(obj.msg)
			//messageCmbAlert(data)
			
			//messageAlert(data);
			//messageAlert(obj.id);
			//window.parent.GetNewCmdItem(obj.id,obj.value,obj.cmbname);
			
			//root.find(".measure-unit").attr('style','border:1px solid red!important;');
        });	
		
		
	
});




</script>

</body>
</html>
