<form name="frm" action="{$site.base_url}invoice/save" method="post">
	<table border="0" align="center" class="content" >
    	<tr>
        	<td style="padding:20px;">
            	<table border="0" align="center" style="border:1px solid #000;" >
                    <tr>
                      <td colspan="2" align="center">{$mr.frm_error}</td>
                  </tr>
                    <tr>
                        <td colspan="2" align="center">{include file = 'invoice/infor.tpl'}<input type="hidden" id="invoice_id" name="invoice_id" value="{$mr.invoice_id}"></td>
                    </tr>
                    <tr>
                      <td nowrap valign="top" width="50%">{include file = 'invoice/inspected.tpl'}</td>
                      <td valign="top" width="50%">{include file = 'invoice/billto.tpl'}</td>
                    </tr> 
                    <tr><td colspan="2" align="center"><input type="button" value="Save" onclick="sm_frm(frm,'{$site.base_url}invoice/save','_self');"> {if $mr.invoice_id}<input type="button"  value="Print" onclick="sm_frm(frm,'{$site.base_url}print_history/print_invoice/id/{$mr.invoice_id}','_blank');">{/if}
                   {if $mr.new}
                    <input type="button" name="btn_back"  class="button_1" value="Back to report" onclick="javascript:location.href='{$site.base_url}customer/creport/id/{$mr.report_id}'">
                    {else}
                    <input type="button" name="btn_back"  class="button_1" value="Back" onclick="javascript:location.href='{$site.base_url}customer/report'">
                    {/if}
                    <input name="txt_new" id="txt_new" type="hidden" value="{$mr.new}" >
                    </td></tr>
                </table>
            </td>
        </tr>
    </table>
	
</form>
{literal}
<script language="javascript" type="text/javascript" charset="UTF-8">
/* <![CDATA[ */
	function sm_frm(frm,action,target){
		  frm.target=target;
		  frm.action = action;
		  frm.submit();
	}
</script>
{/literal}