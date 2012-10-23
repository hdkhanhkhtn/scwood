<form action="{$site.base_url}admin_policydt/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td >Policy detail</td>
    <td align="right">
    <input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_policydt/search'">	
    <input type="reset" name="btn_reset" class="button_1" value="{$lang.lbl_btn_reset}" />
    <input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}">
    <input type="submit" name="btn_save_add" class="button_1" value="{$lang.lbl_btn_save_add}" />
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
      <td>Title: (*) </td>
    </tr>
    <tr>
      <td><input name="txt_title" type="text" id="txt_title" value="{$mr.policydt_title}" size="111" />
      <input name="hd_id" type="hidden" id="hd_id" value="{$mr.policydt_id}" /></td>
    </tr>
    <tr>
    <td>Content: (*) </td>
  </tr>
  <tr>
    <td><textarea name="txt_body" id="txt_body" style="width:700px;height:400px" >{$mr.policydt_body}</textarea></td>
  </tr>
   
  <tr>
    <td>{$lang.lbl_order}:</td>
  </tr>
  <tr>
    <td><input name="txt_order" type="text" id="txt_order" value="{$mr.policydt_order}" size="10"></td>
  </tr>
  <tr>
    <td>{$lang.lbl_status}:</td>
  </tr>
  <tr>
    <td><select name="sel_status" id="sel_status">
	  <option value="0"   >{$lang.lbl_blocked}</option>	
      <option value="1" {if $mr.policydt_active == 1} selected {/if}>{$lang.lbl_active}</option>
      
    </select>    </td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>
</table>
 </form>
 
   {literal}
<script src="{/literal}{$site.base_url}{literal}application/libraries/js/nice_editor/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor({fullPanel : true}).panelInstance('txt_body');
});
</script>{/literal}