<?php /* Smarty version 2.6.18, created on 2012-10-23 11:34:34
         compiled from mypage/changepass.tpl */ ?>
<table class="content" border="0" cellspacing="0" cellpadding="3" align="center" >
	<form id="form1" name="form1" method="post" action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
mypage/sm_changepass">
    	<tr>
	    <td  align="left" valign="top" height="120" ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
       <tr>
		<td><font class="text_error"><?php echo $this->_tpl_vars['mr']['frm_error']; ?>
</font></td>
	  </tr>
	  <tr>
		<td colspan="2" width="100%" align="center" valign="top">
        	<table width="80%" border="0" cellpadding="5" cellspacing="0" align="center" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" >
            	<tr>
                	<td  align="right"><?php echo $this->_tpl_vars['lang']['lbl_old_pass']; ?>
 </td>
		<td align="left">
		  <input type="password" name="txt_pass" id="txt_pass" style="width:8em;"/>		</td>
	  </tr>
	  <tr>
	    <td align="right" ><?php echo $this->_tpl_vars['lang']['lbl_new_pass']; ?>
 </td>
	    <td align="left"><input type="password" name="txt_newpass" id="txt_newpass" style="width:8em;"/></td>
	    </tr>
	  <tr>
	    <td align="right" ><?php echo $this->_tpl_vars['lang']['lbl_cfnew_pass']; ?>
 </td>
	    <td align="left"><input type="password" name="txt_cfpass" id="txt_cfpass" style="width:8em;" /></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	   
	    		
		<td align="center" colspan="2"><input type="submit" name="Submit" value="Submit" class="btn" >
		<input type="reset" name="reset" value="Reset" class="btn" >
		<input type="button" name="btn_back" value="Back" id="btn_back" onclick="location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
home'" class="btn" /></td>
                </tr>
            </table>
        </td>
	  </tr>
	  </form>
	</table>