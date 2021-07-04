

//comment following line if sidebar needed visible by default;

$("#wrapper").toggleClass("toggled-2");

$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
 $("#menu-toggle-2").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled-2");
       // $('#menu ul').hide();
		//$("#menu > li.active > ul").slideDown('normal');
    });


	

     function initMenu() {
		 
	
		 
      $('#menu ul').hide();
      //$('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
	  $("#menu > li.active > ul").slideDown('normal');
      
	  $('#menu > li > a').click(
        function() {
			

		 //$(".arrow").removeClass("fa-angle-up");
		  //$(".arrow").addClass("fa-angle-down");		  
			
			
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {

			
			
			$('#menu > li > ul:visible').slideUp('normal');

			$(this).find(".arrow").removeClass("fa-angle-up");
			$(this).find(".arrow").addClass("fa-angle-down");

			
            return false;
            }
			
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu > li > ul:visible').slideUp('normal');
            checkElement.slideDown('normal');

			$(this).find(".arrow").removeClass("fa-angle-down");
			$(this).find(".arrow").addClass("fa-angle-up");

			
			
			


			

            return false;
            }
			

          });
		 
		 
		 
		 
		 
		 


      $('#menu > ul > li > ul').hide();
      $('#menu > ul > li > ul').children('.current').parent().show();
      		 
	  $("#menu > li.active > ul > li.active > ul").slideDown('normal');
		 
	  $("#menu  li.active a .arrow").removeClass("fa-angle-down");
	  $("#menu  li.active a .arrow").addClass("fa-angle-up");

		 
	  $('#menu > li > ul > li > a').click(
        function() {
		
			
          var checkElement2 = $(this).next();
          if((checkElement2.is('ul')) && (checkElement2.is(':visible'))) {

			
			
			$('#menu > li> ul > li > ul:visible').slideUp('normal');

			$(this).find(".arrow").removeClass("fa-angle-up");
			$(this).find(".arrow").addClass("fa-angle-down");

			
            return false;
            }
			
          if((checkElement2.is('ul')) && (!checkElement2.is(':visible'))) {
            $('#menu > ul > li > ul:visible').slideUp('normal');
            checkElement2.slideDown('normal');

			$(this).find(".arrow").removeClass("fa-angle-down");
			$(this).find(".arrow").addClass("fa-angle-up");

			
			
			


			

            return false;
            }
			

          });		 
		 
		 
		 
		 
		 
		 
		 
		 
		  
      }
    $(document).ready(function() {initMenu();});
	
	

	
	
	$(".sidebar-nav li a").hover(function(){
   	 $(this).find(".fa-stack-1x").css("color", "#ffffff");
    }, function(){
    $(this).find(".fa-stack-1x").css("color", "#999999");
	
	$(".sidebar-nav").find("li.active  > a > span > .fa-stack-1x").css("color", "#ffffff");
});

$(".sidebar-nav li.active").find(".fa-stack-1x").css("color", "#ffffff");
$(".sidebar-nav ul > li > a > span > .fa-stack-1x").css("color", "#999999");


