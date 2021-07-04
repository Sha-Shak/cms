// JavaScript Document



function messageAlert(alertmsg){
		
		$('.alertmsg').html('<div class="alert alert-success" id="messageAlert" role="alert" style="display:none;" >'+alertmsg+'</div>');
		$('#messageAlert').slideDown().delay(2000).fadeOut().fadeIn().delay(4000).slideUp();
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
