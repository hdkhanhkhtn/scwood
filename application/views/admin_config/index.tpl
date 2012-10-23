<form action="{$site.base_url}admin_config/index_sm" method="post" enctype="multipart/form-data">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Site information</td>
     <td align="right"><input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1" /> 
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1" /></td>
  </tr>
</table>

<br />

{$mr.str_msg}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr>

  <tr>
    <td>Site name : </td>
  </tr>
  <tr>
    <td><input type=text name=txt_name id=txt_name value="{$mr.site_name}" size=50 ></td>
  </tr>
<!--  <tr>
    <td>Logo: </td>
  </tr>
  <tr>
    <td><input name="file_logo" type="file" id="file_logo" /></td>
  </tr>-->
  <tr>
    <td>Phone | Fax </td>
  </tr>
  <tr>
    <td><input name="txt_phone" type="text" id="txt_phone" value="{$mr.site_phone}" />
      <input name="txt_fax" type="text" id="txt_fax" value="{$mr.site_fax}" /></td>
  </tr>
  <tr>
    <td>Email contact : </td>
  </tr>
  <tr>
    <td><input name="txt_email" type="text" id="txt_email" value="{$mr.site_email}" size="50" /></td>
  </tr>
  <tr>
    <td>Bank account: </td>
  </tr>
  <tr>
    <td><input name="txt_bankacc" type="text" id="txt_bankacc" value="{$mr.site_bankacc}" size="50" /></td>
  </tr>
  <tr>
    <td>Title:</td>
  </tr>
  <tr>
    <td><input name="txt_title" type="text" id="txt_title" value="{$mr.site_title}" size="50" /></td>
  </tr>
  <tr>
    <td>Keyword: </td>
  </tr>
  <tr>
    <td><input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.site_keyword}" size="50" /></td>
  </tr>
  
  <tr>
    <td>Footer</td>
  </tr>
  <tr>
    <td><textarea name="txt_footer" cols="50" value=""  id="txt_footer" >{$mr.site_footer}</textarea></td>
  </tr>

   <tr>
     <td>&nbsp;</td>
   </tr>

</table>
 </form>

