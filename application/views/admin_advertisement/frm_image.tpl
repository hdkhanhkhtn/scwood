<form action="{$site.base_url}admin_advertisement/image_sm" method="post" enctype="multipart/form-data" >
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr>
    <td class="text_tt">Advertisement</td>
		<td align="right">
		<input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onClick="javascript:location.href='{$site.base_url}admin_advertisement/search'">
	    <input type="reset" name="btn_reset" class="button_1" value="{$lang.lbl_btn_reset}" />
      <input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}"></td>
  </tr>
</table>
<br />
{$mr.str_msg}
{include file='admin_advertisement/tab.tpl'}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr> 
  <tr>
    <td>Images: (*) </td>
  </tr>
  {if $mr.adv_image}
  <tr>
    <td>
		<img src="{$site.base_url}uploads/adv/{$mr.adv_image}" width="150" >
		<input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" >
		Delete file.    </td>
  </tr>
	{/if}
  <tr>
    <td><input name="attach_1" type="file" id="attach_1"  size="50" />
       <input name="hd_id" type="hidden" id="hd_id" value="{$mr.adv_id}" />
       <input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.adv_image}" /></td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>
</table>
 </form>