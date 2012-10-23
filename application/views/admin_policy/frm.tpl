<form action="{$site.base_url}admin_policy/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Policy</td>
    <td align="right">
		<input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_policy/search'" />
        <input type="reset" name="btn_reset" class="button_1" value="{$lang.lbl_btn_reset}" />
		<input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}">
		<input type="submit" name="btn_save_add" class="button_1" value="{$lang.lbl_btn_save_add}" />	</td>
  </tr>
</table>
<br />
{$mr.str_msg}
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr> 
  <tr>
    <td>Name: (*) </td>
  </tr>
  <tr>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.policy_name}" size="111" />
       <input name="hd_id" type="hidden" id="hd_id" value="{$mr.policy_id}" /></td>
  </tr>
    <tr>
    <td>Description: (*) </td>
  </tr>
  <tr>
    <td><textarea name="txt_desc" id="txt_desc" style="width:700px;height:400px" >{$mr.policy_desc}</textarea></td>
  </tr>
  <tr>
    <td>{$lang.lbl_order}:</td>
  </tr>
  <tr>
    <td><input name="txt_order" type="text" id="txt_order" value="{$mr.policy_order}" size="10"></td>
  </tr>
  <tr>
    <td>{$lang.lbl_status}:</td>
  </tr>
  <tr>
    <td><select name="sel_status" id="sel_status">
	  <option value="0"   >{$lang.lbl_blocked}</option>	
      <option value="1" {if $mr.policy_active == 1} selected {/if}>{$lang.lbl_active}</option>
      
    </select>    </td>
  </tr>

	<tr>
	  <td>&nbsp;</td>
    </tr>
</table>
 </form>
 
{literal}
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}uploads/fckeditor/fckeditor.js"></script>
<script language="javascript" >
	var oFCKeditor = new FCKeditor('txt_desc');
	oFCKeditor.BasePath	= '{/literal}{$site.base_url}{literal}uploads/fckeditor/' ;
	oFCKeditor.ReplaceTextarea() ;
</script>
{/literal}