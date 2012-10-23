<form action="{$site.base_url}contact/sm" method="post" name="frm" enctype="multipart/form-data">
<table class="content" align="center" border="0" cellspacing="0" cellpadding="0">
    <tr>
    	<td>
            <table width="80%" class="contact" align="center" border="0" cellspacing="0" cellpadding="3">
            <tr><td height="40"></td></tr>
            <tr>
            <td colspan="2" align="justify" >
            	{$mr.content}
            </td>
            </tr>
            <tr>
            <td height="10"></td>
            </tr>
            {if $mr.frm_error}
            <tr>
            <td>&nbsp;</td>
            <td><font class="text_error">{$mr.frm_error}&nbsp;</font></td>
            </tr>
            {/if}
            <tr>
            <td width="22%" align="left">{$lang.lbl_name} </td>
            <td width="78%"><input name="txt_name" type="text" id="txt_name" size="50" maxlength="50" value="{$mr.cont_name}" style="border: 1px solid #FF771D;" />
              *</td>
            </tr>
            <tr>
            <td align="left">{$lang.lbl_email}</td>
            <td><input name="txt_email" type="text" id="txt_email" size="50" maxlength="50" value="{$mr.cont_email}" style="border: 1px solid #FF771D;" />
              *</td>
            </tr>
            <tr>
            <td align="left">{$lang.lbl_phone}</td>
            <td><input name="txt_phone" type="text" id="txt_phone" size="20" maxlength="20" value="{$mr.cont_phone}"  style="border: 1px solid #FF771D;"/></td>
            </tr>
            <tr>
            <td align="left">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td align="left">{$lang.lbl_subject} </td>
            <td><input name="txt_subject" type="text" id="txt_subject" size="50" maxlength="50" value="{$mr.cont_subject}" style="border: 1px solid #FF771D;"/>
              *</td>
            </tr>
            <tr>
            <td align="left">{$lang.lbl_content} </td>
            <td><textarea name="txt_content" cols="38" rows="5" id="txt_content" style="border: 1px solid #FF771D;">{$mr.cont_content}</textarea>
              *</td>
            </tr>
            <tr>
            <td align="left">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td align="left">{$lang.lbl_security} </td>
            <td><div >{$mr.str_random}</div></td>
            </tr>
            <tr>
            <td align="left"></td>
            <td><input name="txt_random" type="text" id="txt_random" size="20" maxlength="20" style="border: 1px solid #FF771D;" />
            * Please enter the verification code. </td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" name="Submit" value=""  class="btn_submit" />
            <input name="reset" type="reset" id="reset" value=""  class="btn_reset"/></td>
            </tr>
            </table>
    	</td>
    </tr>
</table>
</form>