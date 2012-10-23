<form action="{$site.base_url}change_pass/sm" method="post">
<table cellpadding="0" cellspacing="0" align="center"  >
	<tr>
    	<td>
        	<table cellpadding="5" cellspacing="0" style="font-family:Tahoma;font-size:12px;">
            	<tr>
                	<td colspan="2"><font color="#FF0000">{$mr.error_frm}{$mr.str_msg}</font></td>
                </tr>
            	<tr>
            	  <td>Old Password</td>
            	  <td><input type="password" name="txt_old_pass" /></td>
          	  </tr>
            	<tr>
                    <td>New Password </td>
                    <td><input type="password" name="txt_new_pass" /></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="txt_con_pass" /><input type="hidden" name="txt_id" id="txt_id" value="{$mr.inspector_id}" /> </td>
                </tr>
                <tr>
                    <td colspan="2"  align="center"><input type="submit" name="btn_search" value="Save"/> <input type="button"  value="Close" onclick="javascript:window.close();"/></td>
                </tr>
      
          </table>
        </td>
    </tr>
</table>
</form>