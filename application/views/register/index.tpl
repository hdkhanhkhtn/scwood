<table width="720" align="center" border="0" cellspacing="0" cellpadding="3" class="content"  >
<form method="post" action="{$site.base_url}register/submit" >
	<tr><td height="35"></td></tr>
  <tr>
    <td></td>
    <td colspan="3" align="left"><font class="text_error">{$mr.frm_error}{$mr.mail_frm}</font></td>
    </tr>
 
  <tr>
    <td align="right"></td>
    <td colspan="3" align="left" ><div id="Msg_username" class="text_error"></div>	</td>
  </tr>
  <tr>
    <td width="200" align="right">{$lang.lbl_username}: </td>
    <td colspan="3" align="left" ><input name="txt_username" type="text" id="txt_username" style="width:200px;border: 1px solid #FF771D; " value="{$mr.cus_username}">	
      *&nbsp;
      <input type="button" onclick="xajax_chkUsername(txt_username.value);" value="Check availability!" />
        </td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td colspan="3" align="left">The user name cannot be duplicate.<br />Make your user name with simple & easy to remember ID to use again.
    </td>
  </tr>
  <tr>
    <td align="right">Company:</td>
   	  <td colspan="3" align="left"><input name="txt_company" type="text" id="txt_company" style="border: 1px solid #FF771D; width:200px;" value="{$mr.cus_comp_name}"></td>
   	</tr>
    <tr>
      <td align="right">Email:</td>
      <td colspan="3" align="left"><input name="txt_email" type="text" id="txt_email" value="{$mr.cus_email}"  style="width:200px;border: 1px solid #FF771D;" /></td>
    </tr>
    <tr>
      <td align="right">Address:</td>
      <td colspan="3" align="left"><input name="txt_address" type="text" id="txt_address" value="{$mr.cus_address}"  size="40" maxlength="50" style="width:200px;border: 1px solid #FF771D;"/></td>
    </tr>
    <tr>
      <td align="right">City / State / Zip:</td>
      <td colspan="3" align="left"><input name="txt_city" type="text" id="txt_city" value="{$mr.cus_city}"  size="20" maxlength="20" style="width:8em;border: 1px solid #FF771D;" />
        <input name="txt_state" type="text" id="txt_state"  value="{$mr.cus_state}" size="4" style="width:8em;border: 1px solid #FF771D;" />
        <input name="txt_zip" type="text" id="txt_zip" value="{$mr.cus_zipcode}" size="4" maxlength="20" style="width:8em;border: 1px solid #FF771D;"/></td>
    </tr>
    
    <tr>
    	<td align="right">Phone:</td>
   	  <td align="left"><input name="txt_phone" type="text" id="txt_phone" value="{$mr.cus_phone}" size="10" maxlength="20" style="width:200px;border: 1px solid #FF771D;" ></td>
    	<td align="right">Fax:</td>
    	<td align="left"><input name="txt_fax" type="text" id="txt_fax" value="{$mr.cus_fax}"  size="10" maxlength="20" style="width:200px;border: 1px solid #FF771D;" ></td>
    </tr>
    <tr>
    	<td align="right"> License:</td>
   	  <td align="left"><input name="txt_license" type="text" id="txt_license" value="{$mr.cus_license}" size="20" maxlength="20" style="width:200px;border: 1px solid #FF771D;"></td>
    	<td align="right">Pemit:</td>
    	<td align="left"><input name="txt_pemit" type="text" id="txt_pemit" value="{$mr.cus_pemit}"  style="width:200px;border: 1px solid #FF771D;"></td>
    </tr>
    <tr>
    	<td align="right">Name:</td>
   	  <td colspan="3" align="left"><input name="txt_name" type="text" id="txt_name" value="{$mr.cus_name}"  size="20" maxlength="20" style="width:200px;border: 1px solid #FF771D;"></td>
   	</tr>
    <tr>
    	<td align="right">Note:</td>
   	  <td colspan="3" align="left"><textarea cols="50" rows="5" id="txt_note" name="txt_note" style="border: 1px solid #FF771D;">{$mr.cus_note}</textarea> </td>
  </tr>
    <tr>
      <td align="left"></td>
      <td colspan="3" align="left">
      <div style="overflow:auto; width:500px; height:150px;; border:1px #FF771D solid; padding:3px" >
          {section name=i loop=$lst_policy}
          
          <strong>{$lst_policy[i].policy_name}</strong>
          <p>{$lst_policy[i].policy_desc}</p>
          {/section}
          
        </div>      </td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td colspan="3" align="left">
       <input name="chk_accept" type="checkbox" id="chk_accept" onclick="checkaccept(this.checked);" style="border: 1px solid #FF771D;"/>
     I accept</td>
    </tr>
    <tr>
    <td colspan="4" align="center"><input name="btn_submit" type="submit"  class="btn_register" id="btn_submit" value="" >
      <input type="reset" name="Submit2" class="btn_reset" value=""></td>
    </tr>
</form> 
</table>


<div id="loading_message" class="loading" >Loading ...</div>
{$xajax_js}
{literal}
<script type="text/javascript">
  xajax.callback.global.onRequest = function() {xajax.$('loading_message').style.display = 'block';}
  xajax.callback.global.beforeResponseProcessing = function() {xajax.$('loading_message').style.display='none';}



function checkaccept(ischeck)
	{
		if(ischeck == true)
		{
			document.getElementById('btn_submit').disabled = false;  		
		}
		else{
			document.getElementById('chk_accept').checked = ischeck;  
			document.getElementById('btn_submit').disabled = true;  
		}
	} 
	
	//set check agreen check box
	checkaccept(document.getElementById('chk_accept').checked); 
	
</script>
{/literal}





