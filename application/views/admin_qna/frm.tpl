<form action="{$site.base_url}admin_qna/save" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Q&A </td>
    <td align="right">
    <input type="button" name="btn_back"  class="button_1" value="{$lang.lbl_btn_back}" onclick="javascript:location.href='{$site.base_url}admin_qna/search'">
    <input type="reset" name="btn_reset" class="button_1" value="{$lang.lbl_btn_reset}" />
    <input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}">
	</td>
  </tr>
</table>
<br />
{$mr.str_msg}
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >
	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr> 
  <tr>
    <td>{$lang.lbl_name}: {$mr.qna_name}</td>
  </tr>
  <tr>
    <td>{$lang.lbl_email}: {$mr.qna_email}</td>
  </tr>
  <tr>
    <td>{$lang.lbl_phone}: {$mr.qna_phone}</td>
  </tr>	
  <tr>
    <td>{$lang.lbl_company}: {$mr.qna_company}</td>
  </tr>
    
  <tr>
    <td>{$lang.lbl_question}:</td>
  </tr>
  <tr>
    <td><textarea name="txt_question" cols="84" rows="3" id="txt_question" >{$mr.qna_question}</textarea>
       <input name="hd_id" type="hidden" id="hd_id" value="{$mr.qna_id}" /></td>
  </tr>
    <tr>
    <td>{$lang.lbl_answer}: (*) </td>
  </tr>
  <tr>
    <td><textarea name="txt_answer" cols="84" rows="20" id="txt_answer">{$mr.qna_answer}</textarea></td>
  </tr>
  <tr>
    <td>{$lang.lbl_order}:</td>
  </tr>
  <tr>
    <td><input name="txt_order" type="text" id="txt_order" value="{$mr.qna_order}" size="10"></td>
  </tr>
  <tr>
    <td>{$lang.lbl_status}:</td>
  </tr>
  <tr>
    <td><select name="sel_status" id="sel_status">
	  <option value="0"   >{$lang.lbl_blocked}</option>	
      <option value="1" {if $mr.qna_active == 1} selected {/if}>{$lang.lbl_active}</option>
      
    </select>    </td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
    </tr>

</table>
 </form>