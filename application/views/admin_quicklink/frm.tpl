<form action="{$site.base_url}admin_quicklink/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Quick Link</td>
    <td align="right">
    <input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_quicklink/search'">
    <input type="reset" name="btn_reset" class="button_1" value="{$lang.lbl_btn_reset}" />
    <input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}">
	</td>
  </tr>
</table>
<br />
{$mr.str_msg}
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >
	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr>
    
  <tr>
    <td>Name:</td>
  </tr>
  <tr>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.quicklink_name}" size="84" />
       <input name="hd_id" type="hidden" id="hd_id" value="{$mr.quicklink_id}" /></td>
  </tr>
    <tr>
    <td>Link: (*) </td>
  </tr>
  <tr>
    <td><input name="txt_link" type="text" id="txt_link" value="{$mr.quicklink_url}" size="84" /></td>
  </tr>
  <tr>
    <td>{$lang.lbl_order}:</td>
  </tr>
  <tr>
    <td><input name="txt_order" type="text" id="txt_order" value="{$mr.quicklink_order}" size="10"></td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>
</table>
 </form>