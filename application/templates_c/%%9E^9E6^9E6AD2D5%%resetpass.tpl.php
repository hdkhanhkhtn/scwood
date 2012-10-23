<?php /* Smarty version 2.6.18, created on 2012-10-22 16:20:48
         compiled from login/resetpass.tpl */ ?>
<form  action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
login/forgetpass_sm/" name="frm_input" method="post" onsubmit="return validate_form(this)">
<table  class="content" style="height:255px;" align="center" cellpadding="0" border="0" cellspacing="0" >
    <tr>
    	<td>
        <table width="100%" border="0" align="center"  cellpadding="5" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
			  		<tr>
			 	  		<td height="25">&nbsp;</td>
			  		</tr>
					<tr>
			 	  		<td height="25" align="center" class="text"><div style="text-align:justify;">Not a problem! Just enter your email address and we'll send a new password.
</div></td>
			  		</tr>
					<tr>
						<td height="30" align="left">Email address:
                  			<input name="txt_email" type="text" id="txt_email" size="40" >   (e.g. name@domain.com)                		</td>
					</tr>
					<tr>
			 	  		<td  align="center"><p>
			 	  		  <input name="submit2" type="submit" value="Submit" class="btn" />
			 	  		  &nbsp;
			 	  		  <input type="button" name="btn_back"  class="btn" value="Back" onclick="location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
home'">
			 	  		  <br />
		 	  		  </p></td>
			  		</tr>
					<tr>
			 	  		<td height="25" >&nbsp;</td>
			  		</tr>
				</table>
        </td>
   </tr>
</table>
</form>
<?php if ($this->_tpl_vars['mr']['error_frm']): ?>
<?php echo '
	<script language="javascript" type="text/javascript">
    	alert(\'The email has not been registered. Pleasae try again.\');
    </script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['mr']['send_email']): ?>
<?php echo '
	<script language="javascript" type="text/javascript">
    	alert(\'New password has been sent to your email.\');
		document.location.href = "'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
home<?php echo '";
    </script>
'; ?>

<?php endif; ?>
<?php echo '
<script language="javascript" type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/validation.js"></script>

<script language="javascript" type="text/javascript">
	function validate_form(thisform)
	{
		with (thisform)
		{
			if (validate_required(txt_email,"Email address must be filled out!")==false)
	  		{txt_email.focus();return false;}
			
			if  (validate_email(txt_email,"Your email is wrong !")==false)
			{txt_email.focus();return false;}
			
		}
	}

</script>


'; ?>


