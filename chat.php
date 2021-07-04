<?php


$postid = $_REQUEST['postid'];


if(isset($_REQUEST['myid']) && isset($_REQUEST['fid']) && isset($_REQUEST['postid'])) {
	$myid = $_REQUEST['myid'];
	$fid = $_REQUEST['fid'];
	$postid = $_REQUEST['postid'];
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat</title>
<link rel="stylesheet" type="text/css" href="plugins/chat/js/chatstyle.css">
</head>

<body>
	
	
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="plugins/chat/js/moment.js"></script>
<script src="plugins/chat/js/livestamp.min.js"></script>
My id: 	<?=$myid?><br>
Post id: <?=$postid?><br>
Chatting with: <?=$fid?>

<div class="container" id="frame">
      <div class="chat" id="chat" sty le="border: 1px solid #000; height: 250px; width: 500px; overflow: hidden; overflow-y: scroll;">
        <div class="stream" id="cstream" style="display: block; height: auto" >
		&nbsp;
      	</div>
      </div>
      <div class="msg">
          <form method="post" id="msenger" action="">
            <textarea name="msg" id="msg-min"></textarea>
            <input type="hidden" name="mid" value="<?php echo $myid;?>">
			  <input type="hidden" name="fid" value="<?php echo $fid;?>">
			  <input type="hidden" name="postid" value="<?php echo $postid;?>">

            <input type="submit" value="Send" id="sb-mt">
          </form>
      </div>
      <div id="dataHelper" last-id=""></div>
  </div>
<script type="text/javascript">
$(document).keyup(function(e){
	if(e.keyCode == 13){
		if($('#msenger textarea').val().trim() == ""){
			$('#msenger textarea').val('');
		}else{
			$('#msenger textarea').attr('readonly', 'readonly');
			$('#sb-mt').attr('disabled', 'disabled');	// Disable submit button
			sendMsg();
		}		
	}
});	

$(document).ready(function() {
    $('#msg-min').focus();
	$('#msenger').submit(function(e){
		$('#msenger textarea').attr('readonly', 'readonly');
		$('#sb-mt').attr('disabled', 'disabled');	// Disable submit button
		sendMsg();
		e.preventDefault();	
	});
});

function sendMsg(){
	//alert('dddd');
	
	$.ajax({
		type: 'post',
		url: 'chat_server.php?rq=new',
		data: $('#msenger').serialize(),
		dataType: 'json',
		success: function(rsp){
				$('#msenger textarea').removeAttr('readonly');
				$('#sb-mt').removeAttr('disabled');	// Enable submit button
				if(parseInt(rsp.status) == 0){
					alert(rsp.msg);
				}else if(parseInt(rsp.status) == 1){
					$('#msenger textarea').val('');
					$('#msenger textarea').focus();
					//$design = '<div>'+rsp.msg+'<span class="time-'+rsp.lid+'"></span></div>';
					$design = '<div class="float-fix">'+
									'<div class="m-rply">'+
										'<div class="msg-bg">'+
											'<div class="msgA">'+
												rsp.msg+
												'<div class="">'+
													'<div class="msg-time time-'+rsp.lid+'"></div>'+
													'<div class="myrply-i"></div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
					$('#cstream').append($design);

					$('.time-'+rsp.lid).livestamp();
					$('#dataHelper').attr('last-id', rsp.lid);
					//$('#chat').scrollTop($('#cstream').height());
					$("#chat").animate({ scrollTop: $('#cstream').height() }, "fast");
					
				}
			}
		});
}
	
function checkStatus(){
	
	$fid = '<?php echo $fid; ?>';
	$mid = '<?php echo $myid; ?>';
	$postid = '<?php echo $postid; ?>';
	
	$.ajax({
		type: 'post',
		url: 'chat_server.php?rq=msg',
		data: {fid: $fid, mid: $mid, postid: $postid, lid: $('#dataHelper').attr('last-id')},
		dataType: 'json',
		cache: false,
		
		success: function(rsp){
				if(parseInt(rsp.status) == 0){
					return false;
				}else if(parseInt(rsp.status) == 1){
					getMsg();
				}
			}
		});	
}

// Check for latest message
 setInterval(function(){checkStatus();}, 1000);

function getMsg(){
	$mid = '<?php echo $myid; ?>';
	$fid = '<?php echo $fid; ?>';
	$postid = '<?php echo $postid; ?>';
	
	///consol.log('kkkkkk');
	
	$.ajax({
		type: 'post',
		url: 'chat_server.php?rq=NewMsg',
		
		data:  {fid: $fid, mid: $mid,postid:$postid},
		dataType: 'json',
		success: function(rsp){
				if(parseInt(rsp.status) == 0){
					//alert(rsp.msg);
				}else if(parseInt(rsp.status) == 1){
					$design = '<div class="float-fix">'+
									'<div class="f-rply">'+
										'<div class="msg-bg">'+
											'<div class="msgA">'+
												rsp.msg+
												'<div class="">'+
													'<div class="msg-time time-'+rsp.lid+'"></div>'+
													'<div class="myrply-f"></div>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
					$('#cstream').append($design);
					$('#chat').scrollTop ($('#cstream').height());
					$('.time-'+rsp.lid).livestamp();
					$('#dataHelper').attr('last-id', rsp.lid);
					$('#chat').scrollTop($('#cstream').height());
				}
			}
	});
}
	
$(document).ready(function(){
	getHistory();
});	
	
function getHistory(){
	$mid = '<?php echo $myid; ?>';
	$fid = '<?php echo $fid; ?>';
	$postid = '<?php echo $postid; ?>';
	$query = 'rq=getHistory&mid='+$mid+'&fid='+$fid+'&postid='+$postid;
	$.getJSON("chat_server.php?"+$query, function(data){
		
	//$.getJSON("chat_server.php?rq=getHistory&mid="+$mid+"fid"+$fid+"postid="+$postid, function(data){
		var mdesign = '';
		
		$.each(data, function(key, value){
			/*
			chdata +='<tr>';
			chdata +='<td>'+ value.id +'</td>';
			chdata +='<td>'+ value.msg +'</td>';
			chdata +='</tr>';
			*/
			whosbox = (value.from_id == $mid)?'m-rply':'f-rply';
			
					mdesign += '<div class="float-fix">';
					mdesign += 	'<div class="'+whosbox+'">';
					mdesign += 		'<div class="msg-bg">';
					mdesign += 			'<div class="msgA">';
					mdesign += 				''+value.msg+'';
					mdesign += 				'<div class="">';
					mdesign += 					'<div class="msg-time"><span data-livestamp="'+value.time+'">'+value.time+'</span></div>';
					mdesign += 					'<div class="myrply-f"></div>';
					mdesign += 				'</div>';
					mdesign += 			'</div>';
					mdesign += 		'</div>';
					mdesign += 	'</div>';
					mdesign += '</div>';
					
					
					
			
			
		});
		
		$('#cstream').append(mdesign);
		//$('#chat').scrollTop ($('#cstream').height());
		$("#chat").animate({ scrollTop: $('#chat').height() }, "fast");
	});
	
	
	///consol.log('kkkkkk');
	
	
}	
</script>	

<script>
	
	setTimeout(function(){
		//alert($('#cstream').height());	
	},1000);
	
	
//	$("#cstream").animate({ scrollTop: $('#chat').height() }, "fast");
		
</script>
	
	
</body>
</html>
