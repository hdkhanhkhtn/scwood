<form action="{$site.base_url}admin_inspector/save" method="post" name="frm" enctype="multipart/form-data">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
    <tr >
    	<td >INSPECTOR</td>
    	<td align="right">
    		<input type="button" name="btn_back"  value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_inspector/search'" class="button_1">
    		<input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}"  class="button_1"/>
    		<input type="submit" name="btn_submit"  value="{$lang.lbl_btn_save}" class="button_1" />
    	</td>
    </tr>
</table>
{$mr.str_msg}
<table width="100%" align="center" border="0" cellspacing="0">
	<tr>
		<td height="10" ><span style="color:#ff0000;font-family:Tahoma, Geneva, sans-serif;font-size:12px;">{$mr.frm_error}</span></td>
	</tr>
</table>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="8" class="tbl_frm" >
    <tr>
    	<td width="30%" align="left" valign="top" >Inspector name (*)</td>
    	<td>
        	<input type="text" name="txt_name" id="txt_name" value="{$mr.name}"  {if $mr.id}readonly="readonly"{/if} /><input type="hidden" name="inspector_id" id="inspector_id" value="{$mr.id}" /><input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.image}" />
        </td>
    </tr>
    <tr>
    	<td >Password (*)</td>
        <td ><input type="password" name="txt_pass" id="txt_pass" value="" /> {if $mr.id}Set new password{/if}</td>
    </tr>
    <tr>
    	<td >License No.</td>
        <td ><input type="text" name="txt_license" id="txt_license" value="{$mr.license}" /> </td>
    </tr>
    <tr>
    	<td >Signature</td>
        <td>{if $mr.image}<img src="{$site.base_url}uploads/inspector/{$mr.image}" width="150" height="40" >          <input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" >
          Delete file.<br>{/if}      
  <input name="attack_1" type="file" id="attack_1"   /> </td>
    </tr>
    <tr>
      <td >Note</td>
      <td><input type="text" name="txt_note" id="txt_note" value="{$mr.note}" /></td>
    </tr>
    <tr>
      <td >Status</td>
      <td><select name="sel_active">
      		<option value="1" {if $mr.active=='1'}selected{/if}>Active</option>
            <option value="0" {if $mr.active=='0'}selected{/if}>In-Active</option>
      	  </select>
      </td>
    </tr>
</table>
</form>