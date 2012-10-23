<table width="750" border="0" cellspacing="0" cellpadding="3" align="center" >
<form action="{$site.base_url}qna/sm" method="post" 	>
	<tr>
	  <td align="center">&nbsp;</td>
	  <td><font class="text_error">{$mr.frm_error}&nbsp;</font></td>
	</tr> 
  <tr>
    <td width="25%" align="right">(*) {$lang.lbl_name}:  </td>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.bbs_user}" size="50" /></td>
  </tr>	
   <tr>
    <td align="right">(*) {$lang.lbl_email}: </td>
    <td><input name="txt_email" type="text" id="txt_email" value="{$mr.bbs_email}" size="50" /></td>
  </tr>
  <tr>
    <td align="right">(*)  {$lang.lbl_question}:</td>
    <td><textarea name="txt_question" cols="40" rows="5" id="txt_question">{$mr.bbs_title}</textarea></td>
  </tr>

	<tr>
	  <td align="center">&nbsp;</td>
	  <td><input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="btn_1" />
        <input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="btn_1" />
        <input type="button" name="btn_back"  value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}qna'" class="btn_1" /></td>
	</tr>
	<tr>
	  <td colspan="2" align="center">&nbsp;</td>
    </tr>
 </form>
</table>
