<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
    var j = jQuery.noConflict();
    j(function() {
        j("#em_date").datepicker({dateFormat: 'yy-mm-dd'});
        j("#letter_date").datepicker({dateFormat: 'yy-mm-dd'});
        j(".sb_req_project_info option").addClass('form-control');
        j(".sb_req_dept option").addClass('form-control');
        j(".sb_req_req_meth option").addClass('form-control');
        j("#leg_date").datepicker({dateFormat: 'yy-mm-dd'});
        j( "#email_info_fieldset" ).hide();
        j( "#letter_info_fieldset" ).hide();
        j( "#pro_req_method_info" ).change(function() {
            if($(this).val() == 2){
                j( "#email_info_fieldset" ).show();
                j( "#letter_info_fieldset" ).hide();
            }else if($(this).val() == 1){
                j( "#letter_info_fieldset" ).show();
                j( "#email_info_fieldset" ).hide();
            }
            //alert( $(this).val() );
        });
    });

</script>
