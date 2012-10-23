<form action="{$site.base_url}admin_customer/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td >{$lang.tt_customer}</td>
    <td align="right">
    <input type="button" name="btn_back"  value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_customer/search'" class="button_1">
    <input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}"  class="button_1"/>
    <input type="submit" name="btn_submit"  value="{$lang.lbl_btn_save}" class="button_1" />
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >
	  <tr>
	    <td class="error">{$mr.frm_error}&nbsp;</td>
    </tr>
	  <tr>
	  	<td align="left">Username: {if $mr.cus_name}{$mr.cus_username}
          <input name="hd_username" type="hidden" id="hd_username" value="{$mr.cus_username}" />{else}
          <input name="txt_username" type="text" id="txt_username" />
          {/if}
          </td>
    </tr>
      <tr>
        <td align="left">Password: </td>
      </tr>
    <tr>
		<td align="left"><input name="txt_pass" type="text" id="txt_pass" />
	    {if $mr.cus_id} Set new password{/if}</td>
	</tr>
	<tr>
      <td align="left">&nbsp;</td>
    </tr>
	  <tr>
		<td align="left"> {$lang.lbl_name}: (*)</td>
	  </tr>
		<tr>
		  <td align="left"><input name="txt_name" type="text" id="txt_name" value="{$mr.cus_name}" size="30" />
            <input name="hd_id" type="hidden" id="hd_id" value="{$mr.cus_id}" /></td>
    </tr>
		<tr>
		  <td align="left">{$lang.lbl_gender}:</td>
    </tr>
		<tr>
		<td align="left"><input type="radio" name="rdo_gender" id="rdo_gender" value="1" {if $mr.cus_sex}checked{/if}  />
{$lang.lbl_male}
  <input type="radio" name="rdo_gender" id="rdo_gender" value="0" {if !$mr.cus_sex}checked{/if} />
{$lang.lbl_female}</td>
	  </tr>
	    <tr>
	      <td align="left">{$lang.lbl_email}: (*) </td>
    </tr>
      <tr>
		<td align="left"><input name="txt_email" type="text" id="txt_email" value="{$mr.cus_email}" size="30" /></td>
	  </tr>
	  
	  <tr>
	    <td align="left">{$lang.lbl_address}:</td>
    </tr>
	  <tr>
		<td align="left"><input name="txt_address" type="text" id="txt_address" value="{$mr.cus_address}" size="50" maxlength="50" /></td>
	  </tr>
	  
	 <tr>
		<td align="left">{$lang.lbl_address} 2:</td>
	  </tr>
	  
	  <tr>
	    <td align="left"><input name="txt_address2" type="text" id="txt_address2" value="{$mr.cus_address2}" size="50" maxlength="50" /></td>
    </tr>
	  <tr>
	    <td align="left">{$lang.lbl_phone}:</td>
    </tr>
	  <tr>
		<td align="left"><input name="txt_phone" id="txt_phone" type="text"  value="{$mr.cus_phone}" /></td>
	  </tr>
	  <tr>
	    <td align="left">&nbsp;</td>
    </tr>
</table>
</form> 	
	
