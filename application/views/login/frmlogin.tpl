<table width="50%" class="text_frm" align="center" >
<form action="{$site.base_url}login/sm" method="post" >
  <tr>
    <td></td>
    <td><font class="text_error">{$mr.error_frm}</font></td>
  </tr>
  <tr>
    <td class="text_nomal"  >User name </td>
    <td width="80%"><input name="txt_username" type="text" id="txt_username" style="width:120px;" />
      &nbsp;</td>
  </tr>
  <tr>
    <td class="text_nomal"   >Password </td>
    <td><input name="txt_pass" type="password" id="txt_pass" style="width:120px;" /></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td><input name="submit2" type="submit" value="{$lang.lbl_btn_login}" class="btn_1 btn" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="{$site.base_url}login/forgetpass" class="lnk_nomal"><font class="text_nomal">{$lang.lbl_forget_pass}</font></a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td><a href="{$site.base_url}register/">{$lang.lbl_create_acc}</a></td>
  </tr>
</form>  
</table>

{literal}

<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
<script language="javascript">set_default_focus('txt_username');</script>

{/literal}


