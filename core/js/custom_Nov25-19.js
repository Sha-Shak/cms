// JavaScript Document



function messageCmbAlert(alertmsg){
		//alert(alertmsg);
		$('.alertmsg').html('<div class="alert alert-success" id="messageAlert" role="alert" style="display:none;" >'+alertmsg+'</div>');
		$('#messageAlert').fadeIn().delay(2000).delay(1000).fadeOut();
}


function messageAlert(alertmsg){
		//alert(alertmsg);
		$('.alertmsg').html('<div class="alert alert-success" id="messageAlert" role="alert" style="display:none;" >'+alertmsg+'</div>');
		$('#messageAlert').slideDown().delay(2000).fadeOut().fadeIn().delay(1000).slideUp();

}

$('#menu .active .current').append('<i class="fa fa-angle-right"></i>');


$(document).ready(function() {
/* off-canvas sidebar toggle */
$('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
    $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
});

$(".alert").each( function() {
   // alert("Your book is overdue.");
});


    $("#showMessage").click(function(){
		messageAlert('messageAlert(\'Message is by id\'); is called within the #showMessage click event in custom.js file.  will be desolve in 5 sec');
	});






  var hash = window.location.hash.replace('#', '');

  if (hash && $('.' + hash).length) {
    var point = $('.' + hash).offset().top - 40;

    if (window.Zepto) {
      window.scrollTo(0, point);
    } else {
      $(window).scrollTop($('.' + hash).offset().top - 40);
    };
  };

 



  $('.top').click(function(event) {
    var target = $(this).data('to'),
      target_offset = $('.' + target).offset().top;

    event.preventDefault();
    window.location.hash = target;

    if (window.Zepto) {
      window.scrollTo(0, target_offset - 40);
    } else {
      $('html, body').stop().animate({scrollTop: target_offset - 40}, 600);
    };
  });
  
  
  
/* input file type code */

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
//$('input').iCheck('check'); 
//$('input').iCheck('uncheck');

		//$(".checkAll").change(function () {
		//	$("input:checkbox").prop('checked', $(this).prop("checked"));
		//});
	//$('input').iCheck('check');	
});




$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".add-more-field-wrapper"); //Fields wrapper
    var add_button      = $(".btn-add"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-lg-6 col-md-6 col-sm-12 add-more-field"> <label>&nbsp;</label><div class="input-group"> <input type="text" class="form-control" name="addableinput[]"><div class="input-group-addon btn-remove"> <span class="glyphicon glyphicon-minus"></span></div></div></div>');
        }
    });

    $(wrapper).on("click",".btn-remove", function(e){ //user click on remove text
        e.preventDefault();
		$(this).parent().parent().remove(); 
		//$(this).parent().parent().attr('style','border:1px solid #000');
		
		x--;
		
    })
});


function sumPrice(){

	$(".toClone").each(function(){
		$(this).find(".unitPrice").change(function() {
			
		//$(this).parent().parent().parent().parent().parent().attr("style","background:red");

			if($(this).val()){
				//var qtn	= parseInt($(this).parent().parent().parent().find(".quantity").val());
				
				var qtn	= $(this).parent().parent().parent().find(".quantity").val();

				//.unitPrice of MRC
				if(isNaN(qtn)){
					//alert($(this).parent().parent().parent().parent().find(".quantity").val());
					//$(this).parent().parent().parent().parent().parent().attr('style','background:red;');
					//alert($(this).parent().parent().parent().parent().parent().find(".quantity").val());
					qtn = $(this).parent().parent().parent().parent().parent().find(".quantity").val()
					//clear OTC
					$(this).parent().parent().parent().parent().parent().find(".unitPrice:first").val("");
				}else{
					$(this).parent().parent().parent().parent().parent().find(".unitPrice:last").val("");
				}
				var up	= $(this).val();
				var utp	= qtn*up;
				utp = utp.toFixed(4); 
				$(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val(utp);
				
				//alert(qtn);
			}
			//$(this).parent().parent().find(".quantity").val("rak");
	 });  
	});

}



sumPrice();





function sumPriceV2(){

	$(".toClone").each(function(){
		$(this).find(".unitprice_otc").change(function() {
			
			var qtn_otc	= $(this).parent().parent().parent().find(".quantity_otc").val();

			var up_otc	= $(this).val();
			var utp_otc	= qtn_otc*up_otc;
			utp_otc = utp_otc.toFixed(4); 			
			$(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val(utp_otc);

	});
	
	
		$(this).find(".unitprice_mrc").change(function() {
			
			var qtn_mrc	= $(this).parent().parent().parent().find(".quantity_mrc").val();

			var up_mrc	= $(this).val();
			var utp_mrc	= qtn_mrc*up_mrc;
			utp_mrc = utp_mrc.toFixed(4);
			
			
			//check curent unitTotalAmount
			var uta = $(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val();
			
			if(isNaN(uta)){
				$(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val(utp_mrc);
			}else{
					
					uta_both = +uta + +utp_mrc;
					uta_both = uta_both.toFixed(4);
					
					$(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val(uta_both);
				
				}

	});	
	
}); 


/*	$(".toClone").each(function(){
		$(this).find(".unitPrice").change(function() {
			


			if($(this).val()){
				//var qtn	= parseInt($(this).parent().parent().parent().find(".quantity").val());
				
				var qtn	= $(this).parent().parent().parent().find(".quantity").val();

				//.unitPrice of MRC
				if(isNaN(qtn)){
					//alert($(this).parent().parent().parent().parent().find(".quantity").val());
					//$(this).parent().parent().parent().parent().parent().attr('style','background:red;');
					//alert($(this).parent().parent().parent().parent().parent().find(".quantity").val());
					qtn = $(this).parent().parent().parent().parent().parent().find(".quantity").val()
					//clear OTC
					$(this).parent().parent().parent().parent().parent().find(".unitPrice:first").val("");
				}else{
					$(this).parent().parent().parent().parent().parent().find(".unitPrice:last").val("");
				}
				var up	= $(this).val();
				var utp	= qtn*up;
				utp = utp.toFixed(4); 
				$(this).parent().parent().parent().parent().parent().find(".unitTotalAmount").val(utp);
				
				//alert(qtn);
			}
			//$(this).parent().parent().find(".quantity").val("rak");
	 });  
	});*/
	

}



sumPriceV2();









$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".color-block"); //Fields wrapper
    var add_button      = $(".link-add-po"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; 	
		//$(wrapper).
		$( ".po-product-wrapper .toClone:last-child").clone().appendTo(wrapper);
    
    $( ".po-product-wrapper .toClone:last-child input").val("");
  

		if(x==2){
			$( ".po-product-wrapper .toClone:last-child").append('<div class="remove-icon"><a href="#" class="remove-po" title="Remove Item"><span class="glyphicon glyphicon-remove"></span></a></div>');
			
		}
		sumPrice();
		sumPriceV2();
        }
    });

    $(wrapper).on("click",".remove-po", function(e){ //user click on remove text
        e.preventDefault();
		$(this).parent().parent().remove(); 
		//$(this).parent().parent().parent().attr('style','border:1px solid #000');
		
		x--;
		
    })
});


$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".color-block"); //Fields wrapper
    var add_button      = $(".link-add-po-2"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; 	
		//$(wrapper).
		$( ".po-product-wrapper .toClone:last-child").clone().appendTo(wrapper);
    
    $( ".po-product-wrapper .toClone:last-child input").val("");
	$( ".po-product-wrapper .toClone:last-child .datalist").attr("placeholder","Select Item");
	
	
  

	//alert($('.toClone').length);
		if($('.toClone').length > 1){
			$( ".po-product-wrapper .toClone:last-child").append('<div class="remove-icon"><a href="#" class="remove-po" title="Remove Item"><span class="glyphicon glyphicon-remove"></span></a></div>');
			
		}
		sumPrice();
		sumPriceV2();
        }
    });

    $(wrapper).on("click",".remove-po", function(e){ //user click on remove text
        e.preventDefault();
		$(this).parent().parent().remove(); 
		//$(this).parent().parent().parent().attr('style','border:1px solid #000');
		
		x--;
		
    })
});

/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input[type="text"]'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
			return false;
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
			return false;
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});









$(document).on("change", ".unitPrice, .unitPriceV2", function() {
	//alert(222);
    var sum = 0;
    $(".unitTotalAmount").each(function(){
       // sum += +parseInt($(this).val());
		sum += +$(this).val();
        //sendValme(sum);
       // alert(sum);
	   sum1=sum.toFixed(4);
         $("#grandTotal").val(sum1);
  });
});





/**/
$(document).ready(function(e) {

	if ($(window).width() > 960) { 
		var lefColtWidth = $(".section-comtype").height();
		//alert(lefColtWidth);
		historyWrapperHeight = lefColtWidth-105;
		$("#history-wrapper").height(historyWrapperHeight);
	}
});
	
	
	
	
		(function($){
			$(window).load(function(){
	
				$('#history-wrapper').mCustomScrollbar({  theme:"default",});

				$('.history-filter-wrapper').mCustomScrollbar({  
						axis:"x", 
						theme:"default",
						scrollAmount: 500,
				});

		});
	})(jQuery);
	
	
	$(document).ready(function(e) {
		event.preventDefault();
        $(".nav-tabs li a").click(function(){
				$(this).tab('show');
				
				var thisID = $(this).html();
				var targetID = "#"+thisID;
				//alert(targetID);
				$(".tab-content .tab-pane").removeClass('active');
				$(".tab-content .tab-pane").removeClass('in');
				$(targetID).addClass('in');
				$(targetID).addClass('active');
		})
		
		
		
		
		
		
		
/*$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

	$(this).tab('show');
});		
	*/	
		
});


$( document ).ready(function() {
    var heights = $("#sidebar-wrapper").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);
	maxHeight = maxHeight-80;

   //$("#page-content-wrapper").height(maxHeight);
   $("#page-content-wrapper").attr('style','min-height:'+maxHeight+'px;');
});

