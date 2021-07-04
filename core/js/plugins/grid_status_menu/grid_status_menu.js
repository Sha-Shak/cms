$(document).ready(function(e) {
    $(".status .dropdown-menu a").on("click", function(){
		myClass = $(this).attr("class");
		//alert($(this).html());
		
		root = $(this).parent().parent().parent().parent().parent();
		root.removeClass();
		root.addClass("status "+myClass);
		root.find("a span").html($(this).html()+"<span class=\"caret\"></span>");

		id = root.find("a").data("id");
		status_id = $(this).data("statusid");
		//alert('xx'+status_id);
		//call ajax function for posting data
		update_grid_status_menu($(this).html(),id, status_id);
		//$(this).html(root.html())
		//$(this).parent().parent().parent().parent().parent().parent().parent().removeClass();
		//$(this).parent().parent().parent().parent().parent().parent().parent().addClass("status "+myClass);
	});
	
	$(".stage .dropdown-menu a").on("click", function(){
		myClass = $(this).attr("class");
		//alert($(this).html());
		
		root = $(this).parent().parent().parent().parent().parent();
		root.removeClass();
		root.addClass("stage "+myClass);
		root.find("a span").html($(this).html()+"<span class=\"caret\"></span>");

		id = root.find("a").data("id");
		stage_id = $(this).data("stageid");
		//alert('xx'+status_id);
		//call ajax function for posting data
		update_grid_stage_menu($(this).html(),id, stage_id);
		//$(this).html(root.html())
		//$(this).parent().parent().parent().parent().parent().parent().parent().removeClass();
		//$(this).parent().parent().parent().parent().parent().parent().parent().addClass("status "+myClass);
	});
});
	