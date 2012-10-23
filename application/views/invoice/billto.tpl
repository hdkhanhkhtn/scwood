<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;height:8em;">
  <tr>
    <td rowspan="2" bgcolor="#4f81BD" align="center" style="width:100px;"><font color="#FFFFFF"><strong>Bill to :</strong></font></td>
    <td bgcolor="#999999" style="padding-left:5px;">
    <input type="text" name="txt_bill_name" id="txt_bill_name" value="{$mr.bill_name}" style="width:18em;"  /><br />
 	<input type="text" name="txt_bill_cname" id="txt_bill_cname" value="{$mr.bill_cname}" style="width:18em;"  />
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" style="padding-left:5px;" >
    <input type="text" name="txt_bill_address" id="txt_bill_address" value="{$mr.bill_address}"  style="width:18em;" /><br />
<input type="text" name="txt_bill_city" id="txt_bill_city" value="{$mr.bill_city}"  style="width:9em;" />, <input type="text" name="txt_bill_state" id="txt_bill_state" value="{$mr.bill_state}" style="width:2em;"  /> <input type="text" name="txt_bill_zipcode" id="txt_bill_zipcode" value="{$mr.bill_zipcode}" style="width:5em;" />
    </td>
  </tr>
</table>
<br clear="all">
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	<td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Description</font><font color="#FFFFFF"> of service</font></td>
    </tr>
    <tr>
    	<td height="3"></td>
    </tr>
    <tr>
    	<td valign="top">
    		<textarea name="txt_description" id="txt_description" cols="35" rows="16" style="width:100%;height:22em;margin-left:-3px;margin-top:-3px;" >{$mr.description}</textarea>
            <input name="report_id" id="report_id" type="hidden" value="{if $mr.id}{$mr.id}{else}{$mr.report_id}{/if}" >
        </td>
    </tr>
</table>