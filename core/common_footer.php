
<!-- #page-footer -->
<div class="container-fluid">
  <div class="page_footer">
    <div class="row">
      <div class="col-xs-2"><a class="" href="http://www.bithut.biz/" target="_blank" bo><img src="images/logo_bithut_sm.png" height="30" border="0"></a></div>
      <div class="col-xs-10  copyright">Copyright © <a class="" href="http://www.bithut.biz/" target="_blank">Bithut Ltd.</a></div>
    </div>
  </div>
</div>        
<!-- /#page-footer -->



<!-- Modal -->
<div class="modal cmb-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <iframe  id="iframeModal"   frameborder="0" allowtransparency="true" scrolling="no"></iframe>  
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div-->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/sidebar_menu.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="js/ie10-viewport-bug-workaround.js"></script> 
<!-- Bootstrap core JavaScript
    ================================================== -->



<!-- Date Time Picker  ==================================== -->
<script src="js/plugins/datetimepicker/js/moment-with-locales.js"></script>
<script src="js/plugins/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script language="javascript">
$(document).ready(function(){
   	


         $('.datepicker_history_filter').datetimepicker({
					//inline:true,
					//sideBySide: true,
					format: "DD/MM/YYYY",
					//format: 'LT',
					//keepOpen:true,
                 icons: {
                 time: "fa fa-clock-o",
                 date: "fa fa-calendar",
                 up: "fa fa-angle-up",
                 down: "fa fa-angle-down"
                }
            });
			
         $('.datepicker_comtype').datetimepicker({
					//inline:true,
					//sideBySide: true,
					format: "DD/MM/YYYY LT",
					//format: 'LT',
					//keepOpen:true,
                 icons: {
                 time: "fa fa-clock-o",
                 date: "fa fa-calendar",
                 up: "fa fa-angle-up",
                 down: "fa fa-angle-down"
                }
            });	
			
         $('.datepicker').datetimepicker({
					//inline:true,
					//sideBySide: true,
					format: "DD/MM/YYYY",
					//format: 'LT',
					//keepOpen:true,
                 icons: {
                 time: "fa fa-clock-o",
                 date: "fa fa-calendar",
                 up: "fa fa-angle-up",
                 down: "fa fa-angle-down"
                }
            });	
			
         $('.datetimepicker').datetimepicker({
					//inline:true,
					//sideBySide: true,
					format: "DD/MM/YYYY LT",
					//format: 'LT',
					//keepOpen:true,
                 icons: {
                 time: "fa fa-clock-o",
                 date: "fa fa-calendar",
                 up: "fa fa-angle-up",
                 down: "fa fa-angle-down"
                }
            });								
      



 });  
</script>
<!-- end Date Picker  ==================================== -->

<!-- scrollbar  ==================================== -->
<script src="js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> 
<!-- end scrollbar  ==================================== -->


<!-- iCheck code for Checkbox and radio button -->
<!--<script src="js/plugins/icheck/icheck.js"></script>
<script language="javascript">
$(document).ready(function(){
  $('input').iCheck({
  checkboxClass: 'icheckbox_square-blue',
  radioClass: 'iradio_square-blue',
  increaseArea: '20%'
});
});
</script> -->
<!-- end iCheck code for Checkbox and radio button -->

<script src="js/plugins/nested_chkboxes/nested_chkboxes.js"></script> 
<script src="js/plugins/nested_chkboxes/rocket-loader.min.js"></script>

<script src="js/custom.js"></script>

<script>
  function CloseModal(frameElement) {
     if (frameElement) {
        var dialog = $(frameElement).closest(".modal");
        if (dialog.length > 0) {
            dialog.modal("hide");
        }
     }
}

  function GetNewCmdItem(id,value,cmbname){
	  //alert(value+" "+id+" "+cmbname);
		$('select[name='+cmbname+']').append('<option value="'+id+'" selected="selected">'+value+'</option>');	  
	}
	
//for image preview by mamun
 var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  var loadImage = function(event,displayloc) {
    var output = document.getElementById(displayloc);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
	
</script>
