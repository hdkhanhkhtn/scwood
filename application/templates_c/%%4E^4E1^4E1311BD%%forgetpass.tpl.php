<?php /* Smarty version 2.6.18, created on 2012-10-21 07:42:51
         compiled from admin_login/forgetpass.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/top.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<p>&nbsp;</p>
<table width="700" height="300" border="1" align="center" cellpadding="5" cellspacing="0" style="border-color:#999999; border-style:solid; border-width:1px"  >

  <tr >
    <td style="border:none;"  valign="bottom" ><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/icon_login.png" width="70"  /></td>
  </tr>
  <tr style="font-family:Arial; font-size:12px;font-weight:bold;color:#075993;background-color:#D5D5D5; " >
  	<td style="border:none; border-color:#999999; border-top-style:solid; border-bottom-style:solid;border-width:1px ">Administration Login</td>
  </tr>
  <tr>
    <td valign="bottom" style="border:none">
    	
      <table width="100%" border="0" cellpadding="5" class="text_1"  >
        <form  action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_login/forgetpass_sm/" method="post">
          <tr>
            <td valign="bottom">
                
                <table width="100%" border="0" cellpadding="5" class="tbl_frm_login"  >
            
              <tr>
                <td align="right"  >&nbsp;</td>
                <td class="error"><?php echo $this->_tpl_vars['mr']['error_frm']; ?>
&nbsp;</td>
              </tr>
        
              <tr>
                <td width="30%" align="right"  >Your email: </td>
                <td width="74%"><input name="txt_email" type="text" id="txt_email" size="50" >
                  &nbsp;</td>
              </tr>
        
              <tr>
                <td align="right" >&nbsp;</td>
                <td><input name="submit2" type="submit" value="Get new password" class="button_1" >
                    <input type="button" class="button_1" onclick="javascript:location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
/admin'" value="Login" /></td>
              </tr>
              <tr height="45">
                <td  >&nbsp;</td>
                <td  valign="top" >&nbsp;</td>
              </tr>
            </table>
            
            
            </td>
          </tr>
        </form>
    </table>
    
        
    </td>
  </tr>
  
  <tr style="color:#898989;font-family:Arial;font-size:11px;">
  <td height="25" align="center" style="border:none; border-top:dashed; border-color:#666666; border-width:1px;">
  Copyright &copy;2008 TechKnowledge, Tikay Corporation. All rights reserved.</td>
  </tr>
</form>
</table>


<?php echo '

<script language="javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/form.js"></script>
<script language="javascript">set_default_focus(\'txt_email\');</script>

'; ?>
