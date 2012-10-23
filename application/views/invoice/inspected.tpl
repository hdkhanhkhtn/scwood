<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;height:8em;"">
  <tr>
    <td rowspan="2" bgcolor="#4f81BD" align="center"  style="width:100px;"><font color="#FFFFFF"><strong>Property</strong><br>
<strong>Inspected :</strong></font></td>
    <td bgcolor="#999999" style="padding-left:5px;">
    <input type="text" name="txt_inspected_name" id="txt_inspected_name" value="{$mr.inspected_name}" style="width:18em;"  /><br />
    <input type="text" name="txt_inspected_cname" id="txt_inspected_cname" value="{$mr.inspected_cname}" style="width:18em;"  />
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" style="padding-left:5px;" >
        <input type="text" name="txt_inspected_address" id="txt_inspected_address" value="{$mr.inspected_address}"  style="width:18em;" /><br />
        <input type="text" name="txt_inspected_city" id="txt_inspected_city" value="{$mr.inspected_city}"  style="width:9em;" />, 
        <input type="text" name="txt_inspected_state" id="txt_inspected_state" value="{$mr.inspected_state}" style="width:2em;"  /> 
        <input type="text" name="txt_inspected_zipcode" id="txt_inspected_zipcode" value="{$mr.inspected_zipcode}" style="width:5em;" />
		
         
    </td>
  </tr>
</table>
<br clear="all">
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	<td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Descriptions</font></td>
        <td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Amount($)</font></td>
    </tr>
    <tr>
    	<td height="3" colspan="2"></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td ><input type="text" name="txt_des1" id="txt_des1" value="{$mr.desc_1}" /></td>
        <td ><input type="text" name="txt_amount1" id="txt_amount1" value="{if $mr.desc_1}{$mr.amount_1}{/if}" style="text-align:right;"   ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td ><input type="text" name="txt_des2" id="txt_des2" value="{$mr.desc_2}" /></td>
        <td><input type="text" name="txt_amount2" id="txt_amount2" value="{if $mr.desc_2}{$mr.amount_2}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des3" id="txt_des3" value="{$mr.desc_3}"/></td>
        <td><input type="text" name="txt_amount3" id="txt_amount3" value="{if $mr.desc_3}{$mr.amount_3}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des4" id="txt_des4" value="{$mr.desc_4}"/></td>
        <td><input type="text" name="txt_amount4" id="txt_amount4" value="{if $mr.desc_4}{$mr.amount_4}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des5" id="txt_des5" value="{$mr.desc_5}" /></td>
        <td><input type="text" name="txt_amount5" id="txt_amount5" value="{if $mr.desc_5}{$mr.amount_5}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des6" id="txt_des6" value="{$mr.desc_6}"/></td>
        <td><input type="text" name="txt_amount6" id="txt_amount6" value="{if $mr.desc_6}{$mr.amount_6}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des7" id="txt_des7" value="{$mr.desc_7}"/></td>
        <td><input type="text" name="txt_amount7" id="txt_amount7" value="{if $mr.desc_7}{$mr.amount_7}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des8" id="txt_des8" value="{$mr.desc_8}"/></td>
        <td><input type="text" name="txt_amount8" id="txt_amount8" value="{if $mr.desc_8}{$mr.amount_8}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des9" id="txt_des9" value="{$mr.desc_9}"/></td>
        <td><input type="text" name="txt_amount9" id="txt_amount9" value="{if $mr.desc_9}{$mr.amount_9}{/if}" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des10" id="txt_des10" value="{$mr.desc_10}" /></td>
        <td><input type="text" name="txt_amount10" id="txt_amount10" value="{if $mr.desc_10}{$mr.amount_10}{/if}" style="text-align:right;" ></td>
    </tr>
</table>