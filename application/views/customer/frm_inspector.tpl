<table class="content" align="center" >
  <tr>
    <td height="120" align="left" valign="top" b>{include file = "customer/menu.tpl"}</td>
  </tr>
  <tr>
        <td valign="top">
            <table width="80%" align="center" border="0" cellspacing="0" cellpadding="8" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" >
            <form action="{$site.base_url}customer/save_inspector" method="post" enctype="multipart/form-data">
            <tr>
            <td width="30%"></td>
            <td><font class="text_error">{$mr.frm_error}</font></td>
            </tr>
            <tr>
            <td align="right">Inspector name</td>
            <td><input name="name" type="text" value="{$mr.name}" id="name" style="border: 1px solid #FF771D;" {if $mr.id}readonly="readonly"{/if}><input name="reid" type="hidden" id="reid" value="{$mr.id}" /><input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.image}" /></td>
            </tr>
           
            <tr>
              <td align="right">{if $mr.id}Current {/if}Password</td>
              <td><input type="password" name="txt_pass" id="txt_pass" autocomplete="off" style="border: 1px solid #FF771D;" value=""  /><br />
             <font color="#666666" size="1">* Password should be 6 or more characters and  case sensitive</font>
				 </td>
            </tr>
            
            <tr>
            <td align="right">License No.: </td>
            <td><input name="license" type="text" value="{$mr.license}" id="license" style="border: 1px solid #FF771D;"></td>
            </tr>
            {if $mr.image}
            <tr>
            	<td colspan="2" align="center">
                    <img src="{$site.base_url}uploads/inspector/{$mr.image}" width="150" >
                <input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" >
                Delete file.</td>
            </tr>
            {/if}
            <tr>
            <td align="right">Signature:</td>
            <td><input name="attack_1" type="file" id="attack_1"  style="border: 1px solid #FF771D;"></td>
            </tr>
            <tr>
            <td align="right">Notes</td>
            <td><input name="note" type="text" id="note" value="{$mr.note}" style="border: 1px solid #FF771D;"></td>
            </tr>
            <tr>
            
            <td colspan="2" align="center">{if $mr.id}<input type="button" name="change_pass" class="btn_change_pass" value="" onclick="javascript:OpenSubWin('{$site.base_url}change_pass/change/id/{$mr.id}',350,200);" />{/if} <input type="submit" name="Submit"  class="btn_save" value="" ></td>
            </tr>
            </form> 
            </table>
    </td>
</tr>
</table>
{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/popup.js"></script>
<script language="javascript" type="text/javascript" charset="UTF-8">
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? 'yes' : 'no';
	
	  var paramz = 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars='+sbt+',width='+w+',height='+h+'';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
</script>
{/literal}