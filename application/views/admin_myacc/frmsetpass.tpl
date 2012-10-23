
<form action="{$site.base_url}admin_myaccount/sm_setpass" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Set new password</td>
    <td align="right">
    
    <input type="button" class="button_1" onclick="javascript:location.href='{$site.base_url}admin_myaccount'" value="{$lang.lbl_btn_back}" />
    <input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1"/>
     <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1">
    </td>
  </tr>
</table>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" > 
    <tr>
        <td class="error">{$mr.frm_error}&nbsp;</td>
    </tr> 
  <tr>
    <td>Old password : (*) </td>
  </tr>
  
  <tr>
    <td><input name="txt_pass" type="password" id="txt_pass" size="50"></td>
  </tr>
  <tr>
    <td>New password  : (*)</td>
  </tr>
  <tr>
    <td><input name="txt_newpass" type="password" id="txt_newpass" size="50"></td>
  </tr>
    <tr>
    <td>Confirm new password  : (*)</td>
  </tr>
  <tr>
    <td><input name="txt_cfnewpass" type="password" id="txt_cfnewpass" size="50"></td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>
</table>
</form>
