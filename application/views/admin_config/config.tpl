<form action="{$site.base_url}admin_config/config_sm" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Site configuration </td>
    <td align="right">
    <input type="reset" name="btn_reset" value="{$lang.lbl_btn_reset}" class="button_1" />
    <input type="submit" name="btn_save"  value="{$lang.lbl_btn_save}" class="button_1" />      </td>
  </tr>
</table>
<br />
{$mr.str_msg}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr>
  <tr>
    <td>Line per page 1 | Line per page 2</td>
  </tr>
  <tr>
    <td><input name="txt_num_line" type="text" id="txt_num_line" value="{$mr.site_num_line}" size="12" />
		&nbsp; <input name="txt_num_line2" type="text" id="txt_num_line2" value="{$mr.site_num_line2}" size="12" />	  </td>
  </tr>
  <tr>
    <td>Format short date  | Format long date | Time Zone (GMT)</td>
  </tr>
  <tr>
    <td>
	<input name="txt_short_date" type="text" id="txt_short_date" value="{$mr.site_short_date}" size="12" />
	&nbsp;<input name="txt_long_date" type="text" id="txt_long_date" value="{$mr.site_long_date}" size="12" />&nbsp;
    <input name="txt_time_zone" type="text" id="txt_time_zone" value="{$mr.site_time_zone}" size="12" /> 
    (minute)</td>
  </tr>
  <tr>
    <td>State :
      <input type="text" name="txt_state" id="txt_state" value="{$mr.site_state}" maxlength="3"/></td>
  </tr>
  
  <tr>
    <td><strong>Frontend</strong></td>
  </tr>
  <tr>
    <td>Language:
      <input name="rdo_lang" type="radio" value="english" {if $mr.site_lang_client=='english'} checked="checked"{/if}/>
English</td>
  </tr>
  <tr>
    <td>Skin: 
      <select name="select" id="select">
        <option value="style3" {if $mr.site_style=="style3"}selected{/if}>style3</option>
      </select>
      </td>
  </tr>
    <tr>
    <td><strong>Backend</strong></td>
  </tr>
  <tr>
    <td>Language:
      <input name="rdo_lang_admin" type="radio" value="english" {if $mr.site_lang_admin=='english'} checked="checked"{/if}/>
      English
        </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
 </form>