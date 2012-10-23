<table width="100%" cellspacing="1" cellpadding="10" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	
    	<td width="100">{if $mr.cus_logo}<img src="{$site.base_url}uploads/inspector/{$mr.cus_logo}" width="100" />{/if}  </td>
        <td align="center">
   	    <strong>INVOICE  / STATEMENT</strong><br>
			{$mr.cus_comp_name}<br>
			{$mr.cus_address}.<br>
			{$mr.cus_city}, {$mr.cus_state} {$mr.cus_zipcode}<br>
            Tel : {$mr.cus_phone} - Fax : {$mr.cus_fax}
        </td>
        <td valign="top" align="left">
        	<table style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
            	<tr>
                	<td>DATE : <input type="text" name="txt_date" id="txt_date" size="10" value="{$mr.date}" readonly /></td>
                    <td><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_date);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Report #  : {$mr.report}</td>
                </tr>
                <tr>
                  <td colspan="2">Invoice # : <input name="txt_invoicename" type="text" id="txt_invoicename"  value="{$mr.invoice_name}" size="10" /></td>
                </tr>
                <tr>
                    <td colspan="2">CASE # : {if $mr.escrow}{$mr.escrow}{else}{$mr.r1a}{/if}</td>
                </tr>
            </table>
		</td>
    </tr>
</table>
<iframe width=174 height=189 name="gToday:normal:normal.js" id="gToday:normal:normal.js" src="{$site.base_url}/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>