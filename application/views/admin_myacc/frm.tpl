<form action="{$site.base_url}admin_myaccount/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">My Account</td>
    <td align="right">
    <input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1"/>
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1">
	</td>
  </tr>
</table>
<br />
{$mr.str_msg}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >
<tr>
	<td><strong>Login Information </strong></td>
</tr>
<tr>
	<td>User name: {$mr.user_username}</td>
</tr>
<tr>
	<td>Password: ****** 
    </td>
</tr>
<tr>
	<td><input type="button" class="button_1" onclick="javascript:location.href='{$site.base_url}admin_myaccount/setnewpass'" value="Set new password" />
    </td>
</tr>

<tr>
	<td class="error">{$mr.frm_error}&nbsp;</td>
</tr> 
<tr>
	<td><strong>Detail Information</strong> </td>
</tr>
  <tr>
    <td>Full name: (*) </td>
  </tr>
  
  <tr>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.user_name}" size="50"></td>
  </tr>
  <tr>
    <td>Email address :</td>
  </tr>
  <tr>
    <td><input name="txt_email" type="text" id="txt_email" value="{$mr.user_email}" size="50"></td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>

</table>
 </form>
