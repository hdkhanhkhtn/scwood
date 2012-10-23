
{literal}
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}themes/jquery/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}themes/jquery/jquery-ui-sliderAccess.js"></script>
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}themes/jquery/jquery.cookie.js"></script>
<script language="javascript" type="text/javascript" charset="UTF-8">	
    var _show_list = false;
	document.getElementById("sc_file_code").focus();
    $(function(){
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
        $("#sc_treat1_date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
        $("#sc_date_ack").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
        $("#frm").validate({
			//onfocusout: false,
			//onkeyup: false,
            rules: { 
                 "sc_file_code": {
                    required: true
                 }
            },
            messages: {
                "sc_file_code": "Required"
			},
			showErrors: function(errorMap, errorList) {
				//$("label.error").hide;
				$.each(errorMap, function(key, value) {
					
					$('#'+key).css('border','1px solid #F00');
					//$('#'+key).before("<span style='color:red;font-size: 15px;margin-left: 5px;margin-top: 4px;position: absolute;'>"+value+"</span>");
				});
				
			},
			submitHandler: function(form){
				sm_frm(form,"{/literal}{$site.base_url}{literal}customer/save",'_self',3);
			}
        });
	
    });
    function sm_frm(frm,action,target,str){
		if (str ==1)
		  {	
			if (document.getElementById('txt_check_print').value=="print")
				alert("The report will print out no inspector's sign on your report.\n If you want print out inspector's authorized signed report, enter inspector's password.");
		  }
		if (str == 2)
		  {
			  if (document.getElementById('txt_check_email').value=="email")
				 alert("The e-mailed report has without inspector's signature if you did not enter inspector's password");
			 
		  }
		  
		  frm.target=target;
		  frm.action = action;
		  
		  frm.submit();
	}
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? 'yes' : 'no';

	  var paramz = 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=yes,scrollbars='+sbt+',width='+w+',height='+h+'';
	  var oSubWin = window.open( "", "SubWin", paramz );

	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}

	function show_pass(checked)
	{
		if (checked==false) //enable password
		{
			document.frm.txt_pass.disabled = true;
			document.frm.btn_check.disabled = true;
		}
		else
		{
			document.frm.txt_pass.disabled = false;
			document.frm.btn_check.disabled = false;	
		}
	}	
    </script>
{/literal}
{$xajax_js}
{literal}
    <script type="text/javascript">
      xajax.callback.global.onRequest = function() {
          //xajax.$('loading_message').style.display = 'block';
          xajax.$('Msg_username').innerHTML = "Loading... ";
          }
      xajax.callback.global.beforeResponseProcessing = function() {
          //xajax.$('loading_message').style.display='none';
     }  
    </script>
{/literal}