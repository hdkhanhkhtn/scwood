<?php /* Smarty version 2.6.18, created on 2012-10-19 08:52:00
         compiled from login/part_login.tpl */ ?>
<form  action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
login/sm/" method="post">
<table width="250" border="0" cellpadding="0" cellspacing="5">
	<?php if ($this->_tpl_vars['mr']['error_frm']): ?>
	  <tr >
		<td  colspan="3" align="center" ><span style="color:#F00;"><?php echo $this->_tpl_vars['mr']['error_frm']; ?>
</span></td>
	  </tr>
  <?php endif; ?>
  <tr>
	<td  height="30" ><span style="color:#666;font-family:Tahoma, Geneva, sans-serif;font-size:13px;font-weight:bold;">User name</span></td>
	<td height="30" colspan="2"><label>
	  <input name="txt_username" s type="text" id="txt_username" style="width:8em;border: 1px solid #FF771D;"/>
	</label></td>
  </tr>
  <tr>
	<td height="30" ><span style="color:#666;font-family:Tahoma, Geneva, sans-serif;font-size:13px;font-weight:bold;">Password</span></td>
	<td height="30" colspan="2"><input name="txt_pass" type="password" id="txt_pass" style="width:8em;border: 1px solid #FF771D;" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="" class="btn_login" /> <input type="reset" class="btn_reset" value=""/></td>
  </tr>    
  <tr>
  	<td colspan="3" align="center">
    	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
login/forgetpass" style="color:#FF771D;font-family:Tahoma, Geneva, sans-serif;font-size:13px;font-weight:normal;" >Forgot password ?</a>
    </td>
  </tr>
  <tr>
  	<td colspan="3" align="center">
    	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
register" style="color:#FF771D;font-family:Tahoma, Geneva, sans-serif;font-size:13px;font-weight:normal;" >Create a new account ?</a>
    </td>
  </tr>
</table>
</form>