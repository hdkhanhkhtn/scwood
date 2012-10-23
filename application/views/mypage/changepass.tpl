<table class="content" border="0" cellspacing="0" cellpadding="3" align="center" >
	<form id="form1" name="form1" method="post" action="{$site.base_url}mypage/sm_changepass">
    	<tr>
	    <td  align="left" valign="top" height="120" >{include file="customer/menu.tpl}</td>
        </tr>
       <tr>
		<td><font class="text_error">{$mr.frm_error}</font></td>
	  </tr>
	  <tr>
		<td colspan="2" width="100%" align="center" valign="top">
        	<table width="80%" border="0" cellpadding="5" cellspacing="0" align="center" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" >
            	<tr>
                	<td  align="right">{$lang.lbl_old_pass} </td>
		<td align="left">
		  <input type="password" name="txt_pass" id="txt_pass" style="width:8em;"/>		</td>
	  </tr>
	  <tr>
	    <td align="right" >{$lang.lbl_new_pass} </td>
	    <td align="left"><input type="password" name="txt_newpass" id="txt_newpass" style="width:8em;"/></td>
	    </tr>
	  <tr>
	    <td align="right" >{$lang.lbl_cfnew_pass} </td>
	    <td align="left"><input type="password" name="txt_cfpass" id="txt_cfpass" style="width:8em;" /></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	   
	    		
		<td align="center" colspan="2"><input type="submit" name="Submit" value="Submit" class="btn" >
		<input type="reset" name="reset" value="Reset" class="btn" >
		<input type="button" name="btn_back" value="Back" id="btn_back" onclick="location.href='{$site.base_url}home'" class="btn" /></td>
                </tr>
            </table>
        </td>
	  </tr>
	  </form>
	</table>