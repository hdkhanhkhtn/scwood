{include file= 'admin/top.tpl'}
<p>&nbsp;</p>
<table width="700" height="300" border="1" align="center" cellpadding="5" cellspacing="0" style="border-color:#999999; border-style:solid; border-width:1px"  >
<tr >
    <td style="border:none;"  valign="bottom" ><img src="{$site.theme_url}pics/icon_login.png" width="70"  /></td>
  </tr>
  <tr style="font-family:Arial; font-size:12px;font-weight:bold;color:#075993;background-color:#D5D5D5; " >
  	<td style="border:none; border-color:#999999; border-top-style:solid; border-bottom-style:solid;border-width:1px ">Administration Login</td>
  </tr>
  <tr>
    <td valign="bottom" style="border:none">
    	
      <table width="100%" border="0" cellpadding="5" class="tbl_frm_login"  >
      <form  action="{$site.base_url}admin_login/sm/" method="post">
      <tr>
        <td align="right"  >&nbsp;</td>
        <td class="error">{$mr.error_frm}&nbsp;</td>
      </tr>

      <tr>
        <td width="30%" align="right"  >Login: </td>
        <td width="74%"><input name="txt_username" type="text" id="txt_username" style="width:150px;" >
          &nbsp;</td>
      </tr>
      <tr>
        <td align="right" >Password:</td>
        <td><input name="txt_pass" type="password" id="txt_pass" style="width:150px;" >
          &nbsp;</td>
      </tr>

      <tr>
        <td align="right" >&nbsp;</td>
        <td><input name="submit2" type="submit" value="Login" class="button_1" >
        	<input type="button" class="button_1" onclick="javascript:location.href='{$site.base_url}'" value="Home page" /></td>
      </tr>
      <tr height="45">
        <td  >&nbsp;</td>
        <td  valign="top" ><a href="{$site.base_url}admin_login/forgetpass"><font class="text_1">Forget your password?</a></td>
      </tr>
      </form>
    </table>
    
        
    </td>
  </tr>
  
  <tr style="color:#898989;font-family:Arial;font-size:11px;">
  <td height="25" align="center" style="border:none; border-top:dashed; border-color:#666666; border-width:1px;">
  Copyright &copy;2008 TechKnowledge, Tikay Corporation. All rights reserved.</td>
  </tr>

</table>


{literal}

<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
<script language="javascript">set_default_focus('txt_username');</script>

{/literal}