<form action="{$site.base_url}admin_customer/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
    <tr >
    	<td >CUSTOMER</td>
    	<td align="right">
    		<input type="button" name="btn_back"  value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_customer/search'" class="button_1">
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
    	<td width="30%" align="left" valign="top">ID</td>
    	<td>
        	{if $mr.cus_id}{$mr.cus_username}<input type="hidden" name="hd_id" id="hd_id" value="{$mr.cus_id}"> <input name="hd_username" type="hidden" id="hd_username" value="{$mr.cus_username}" />{else}
    		<input name="txt_username" type="text" id="txt_username" />
    		{/if}
    	</td>
    	<td align="left">Password</td>
    	<td><input name="txt_pass" type="text" id="txt_pass" style="width:8em;"> 
    		{if $mr.cus_id}Set new password{else} {/if}</td>
    </tr>
    <tr>
    	<td align="left">Company</td>
    	<td><input name="txt_company" type="text" id="txt_company" style="width:200px;" value="{$mr.cus_comp_name}"></td>
    	<td align="left">Address</td>
    	<td><input name="txt_address" type="text" id="txt_address" value="{$mr.cus_address}"  size="50" maxlength="50"></td>
    </tr>
    <tr>
    	<td align="left">City </td>
    	<td><input name="txt_city" type="text" id="txt_city" value="{$mr.cus_city}"  size="20" maxlength="20" style="width:200px;"></td>
    	<td align="left">State</td>
    	<td><input name="txt_state" type="text" id="txt_state" value="{$mr.cus_state}" style="width:200px;"></td>
    </tr>
    <tr>
    	<td align="left">Zip</td>
    	<td><input name="txt_zip" type="text" id="txt_zip" value="{$mr.cus_zipcode}" size="20" maxlength="20" style="width:200px;"></td>
    	<td align="left">Email</td>
    	<td><input name="txt_email" type="text" id="txt_email" value="{$mr.cus_email}"  style="width:200px;"></td>
    </tr>
    <tr>
    	<td align="left">Phone</td>
    	<td><input name="txt_phone" type="text" id="txt_phone" value="{$mr.cus_phone}" size="20" maxlength="20" style="width:200px;"></td>
    	<td align="left">Fax</td>
    	<td><input name="txt_fax" type="text" id="txt_fax" value="{$mr.cus_fax}"  size="20" maxlength="20" style="width:200px;"></td>
    </tr>
    <tr>
    	<td align="left"> License</td>
    	<td><input name="txt_license" type="text" id="txt_license" value="{$mr.cus_license}" size="20" maxlength="20" style="width:200px;"></td>
    	<td align="left">Pemit</td>
    	<td><input name="txt_pemit" type="text" id="txt_pemit" value="{$mr.cus_pemit}"  style="width:200px;"></td>
    </tr>
    <tr>
    	<td align="left">Name</td>
    	<td><input name="txt_name" type="text" id="txt_name" value="{$mr.cus_name}"  size="20" maxlength="20" style="width:200px;"></td>
    	<td align="left">Date</td>
    	<td><input name="txt_date" type="text" id="txt_date" value="{$mr.cus_date}"  size="20" maxlength="20" style="width:200px;"></td>
    </tr>
    <tr>
    	<td align="left">Note</td>
    	<td colspan="3"><textarea cols="50" rows="5" id="txt_note" name="txt_note">{$mr.cus_note}</textarea> </td>
    </tr>
    <tr>
    	<td colspan="4" align="center"></td>
    </tr>
    
</table>
</form>