
<table width="791" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td class="tbl_1">
	<table width="95%" border="0" cellpadding="5" cellspacing="0" align="center" > 
	<tr>
	<td width="50%"><font class="text_error">
    {$mr.txt_billname_error}{$mr.txt_billemail_error}{$mr.txt_billphone_error}{$mr.txt_billaddress_error}
    </font></td>
	<td width="50%"><font class="text_error">
    {$mr.txt_shippname_error}{$mr.txt_shippemail_error}{$mr.txt_shippphone_error}{$mr.txt_shippaddress_error}
    </font></td>
	</tr>
	</table>	</td>
  </tr>
  <tr>
    <td class="tbl_1">
	

	<table width="95%" border="0" cellpadding="5" cellspacing="0" align="center" > 
	<form action="{$site.base_url}checkout/check_invoice" method="post" name="frmcheckout"  >
	<tr>
	<td>{include file= 'checkout/billing.tpl'}</td>
	<td>{include file= 'checkout/shipping.tpl'}</td>
	</tr>
	<tr height="30">
	  <td colspan="2" class="text_nomal"><input type="checkbox" name="checkbox" value="checkbox" onclick="sameasbilling(this.checked);" />
	    Shipping address same as billing address.</td>
	  </tr>
	
	<tr>
	  <td colspan="2" class="text_nomal" >{$lang.lbl_invoice_comment}:</td>
	  </tr>
	<tr>
	  <td colspan="2"><textarea name="txt_comment" cols="70" id="txt_comment">{$mr.invoice_comment}</textarea></td>
	  </tr>
	<tr>
	  <td colspan="2" align="center">
	  <input type="button" name="Submit2" value="&lt;&lt; Back" onclick="history.go(-1)" class="btn_1" />
	    <input type="submit" name="Submit" value="Continue &gt;&gt;" class="btn_1" /></td>
	  </tr>
	</form>
	</table>	</td>
  </tr>
  
</table>

{literal}
	<script language="javascript">
		function sameasbilling(ischeck)
		{
			if(ischeck){
				document.getElementById('txt_shippname').value = document.getElementById('txt_billname').value;
				document.getElementById('txt_shippemail').value = document.getElementById('txt_billemail').value;
				document.getElementById('txt_shippphone').value = document.getElementById('txt_billphone').value;
				document.getElementById('txt_shippcompany').value = document.getElementById('txt_billcompany').value;
				document.getElementById('txt_shippaddress').value = document.getElementById('txt_billaddress').value;
				document.getElementById('txt_shippaddress2').value = document.getElementById('txt_billaddress2').value;
				
				//alert('checked');
				
			}else{
			
				document.getElementById('txt_shippname').value = "";
				document.getElementById('txt_shippemail').value = "";
				document.getElementById('txt_shippphone').value = "";
				document.getElementById('txt_shippcompany').value = "";
				document.getElementById('txt_shippaddress').value = "";
				document.getElementById('txt_shippaddress2').value = "";
				
				//alert('unchecked');
			
			}
		
		}
	</script>
{/literal}


