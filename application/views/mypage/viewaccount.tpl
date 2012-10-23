<table class="content" height="600"  border="0" cellspacing="0" cellpadding="3" align="center" >
	<form method="post" action="{$site.base_url}mypage/update_account"  enctype="multipart/form-data" >
    	<tr>
        	<td  align="left" valign="top" >{include file= "customer/menu.tpl"}</td>
        </tr>
	  <tr>
		<td colspan="3"></td>
	  </tr>
	  <tr>
		<td colspan="4" align="center" valign="top" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
        	<table border="0" cellpadding="2" cellspacing="0" >
            	<tr>
                	<td colspan="4"><font class="text_error">{$mr.frm_error}</font>
                    </td>
                </tr>
            	<tr>
                	<td align="right">{$lang.lbl_name} : </td>
		<td colspan="3" align="left">{$mr.cus_comp_name}</td>
	  </tr>
		<tr>
		  <td  align="right">License Number : </td>
		<td align="left"><input name="txt_cus_license" type="text" id="txt_cus_license" value="{$mr.cus_license}" maxlength="20" size="20" /></td>
		<td align="right">Restricted Material Permit Number : </td>
		<td align="left"><input name="txt_cus_pemit" type="text" id="txt_cus_pemit" value="{$mr.cus_pemit}" size="20" maxlength="20"" />
		  </td>
      </tr>
	  <tr>
	    <td align="right">Responsible : </td>
		<td colspan="3" align="left"><input name="txt_name" type="text" id="txt_name" value="{$mr.cus_name}" size="30""></td>
	  </tr>
	  <tr>
      	<td colspan="4" align="right">&nbsp;</td>
	  </tr>
	  
	  <tr>
	    <td align="right">Address : </td>
		<td colspan="3" align="left"><input name="txt_address" type="text" id="txt_address" value="{$mr.cus_address}" style="width:350px;" maxlength="50"></td>
	  </tr>
	  
	 <tr>
	   <td align="right">City/State/Zip : </td>
		<td colspan="3" align="left"><input name="txt_city" type="text" id="txt_city" value="{$mr.cus_city}" style="width:8em;" maxlength="50">
	    <input name="txt_state" type="text" id="txt_state" value="{$mr.cus_state}" style="width:8em;" maxlength="50" />
	    <input name="txt_zip" type="text" id="txt_zip" value="{$mr.cus_zipcode}" style="width:8em;" maxlength="50" /></td>
	  </tr>
	  
	  <tr>
	    <td align="right">Email : </td>
		<td colspan="3" align="left"><input name="txt_email" id="txt_email" type="text"  value="{$mr.cus_email}" style="width:10em;" > </td>
	  </tr>
	  <tr>
      	<td colspan="4" align="right">&nbsp;</td>
	  </tr>
	  <tr>
	    <td align="right">Phone : </td>
		<td colspan="3" align="left"><input name="txt_phone" type="text" id="txt_phone" size="20" value="{$mr.cus_phone}" maxlength="20" style="width:10em;"/></td>
	  </tr>
	  <tr>
	    <td align="right">Fax : </td>
		<td colspan="3" align="left"><input name="txt_fax" type="text" id="txt_fax" size="20" value="{$mr.cus_fax}" maxlength="20" style="width:10em;"/></td>
	  </tr>
	  <tr>
	    <td align="right">Note : </td>
	    <td colspan="3" align="left"><textarea id="txt_note" name="txt_note" cols="50" rows="5"">{$mr.cus_note}</textarea> </td>
	    </tr>
            <tr>
              <td align="right">Report #:</td>
              <td colspan="3" align="left"><input name="txt_startnumber" type="text" id="txt_startnumber" value="{$mr.cus_startnumber}" size="30" style="width:10em;" />
              <input name="txt_invoice_number" type="hidden" id="txt_invoice_number" value="{$mr.cus_invoice}" size="30" style="width:10em;" /></td>
            </tr>
           <!-- <tr>
              <td align="right">Invoice number:</td>
              <td colspan="3" align="left">&nbsp;</td>
            </tr>-->
            {if $mr.cus_logo}
            <tr>
              <td colspan="4" align="center"><img src="{$site.base_url}uploads/inspector/{$mr.cus_logo}" width="100" />
                <input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" />
Delete file.</td>
              </tr>
             {/if}
            <tr>
	    <td align="right" style="padding-bottom: 20px;">Logo:</td>
	    <td colspan="3" align="left"><input name="attack_1" type="file" id="attack_1" " /><input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.cus_logo}" />
	      <br />
	      <font color="#666666" size="1">(Recommended image size is 100px X 100px)</font></td>
	    </tr>  
	  <tr>
      	<td colspan="4" align="center" ><input type="submit" name="Submit" value="Submit" class="btn" >
		  <input type="reset" name="reset" value="Reset" class="btn" >
	    <input type="button" name="btn_back" value="Back" id="btn_back" onclick="location.href='{$site.base_url}home'" class="btn" /></td>
                </tr>
            </table>
        </td>
	  </tr>
    </form> 
	</table>