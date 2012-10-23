<table width="791" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td><img src="{$site.theme_url}images/title_login.gif" width="791" height="43"></td>
  </tr>
  <tr>
    <td class="tbl_1">&nbsp;</td>
  </tr>
  <tr>
    <td class="tbl_1">
	
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
		<form  action="{$site.base_url}login" method="post">
		  <tr>
			<td><table class="text_frm" >
			  <tr>
                <td class="text_nomal"  >{$lang.msg_pass_change}</td>
			    </tr>
		
			  <tr>
			    <td>&nbsp;</td>
			  </tr>

			  <tr>
			    <td><input name="submit2" type="submit" value="{$lang.lbl_btn_login}" class="btn_1" /></td>
			    </tr>
			</table></td>
		  </tr>
		</form>
	  </table>
	  
	  
    </td>
  </tr>
  <tr>
    <td class="tbl_1">&nbsp;</td>
  </tr>
  <tr>
    <td height="9"><img src="{$site.theme_url}images/bottom_tbl1.gif" width="791" height="9"></td>
  </tr>
</table>
{literal}

<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
<script language="javascript">set_default_focus('txt_email');</script>

{/literal}


