<form action="{$site.base_url}admin_user/save" method="post">

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">User</td>
    <td align="right">
    <input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_user/search'">
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
    <td >{$lang.lbl_name}: (*) </td>
  </tr>
  <tr>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.user_name}" size="50"> 
    <input name="hd_id" type="hidden" id="hd_id" value="{$mr.user_id}" /></td>
  </tr>
    <tr >
    <td>{$lang.lbl_username} : (*) </td>
  </tr>
  <tr>
    <td><input name="txt_username" type="text" id="txt_username" value="{$mr.user_username}" size="50"></td>
  </tr>
 <tr>
    <td >{$lang.lbl_pass}: (*) </td>
  </tr>
  <tr>
    <td><input name="txt_pass" type="text" id="txt_pass">{if $mr.user_id} Set new password{/if}</td>
  </tr>
  <tr>
    <td >{$lang.lbl_email} :</td>
  </tr>
  <tr>
    <td><input name="txt_email" type="text" id="txt_email" value="{$mr.user_email}" size="50"></td>
  </tr>

  <tr>
    <td >{$lang.lbl_rule}:</td>
  </tr>
  <tr>
    <td ><select name="sel_role" id="sel_role">
      <option value="1">Admin</option>
    </select></td>
  </tr>
  <tr>
    <td >{$lang.lbl_status}:</td>
  </tr>
  <tr>
    <td><select name="sel_status" id="sel_status" >
		<option value="0"   >{$lang.lbl_blocked}</option>	
      <option value="1" {if $mr.faqs_active == 1} selected {/if}>{$lang.lbl_active}</option>
    </select>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>

</table>
 </form>
