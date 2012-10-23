<form name="frm" id="frm" action="{$site.base_url}admin_advertisement/save" method="post" enctype="multipart/form-data">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr>
    <td class="text_tt">Advertisement</td>
	<td align="right">
		<input type="button" name="btn_back2"  class="button_1" value="{$lang.lbl_btn_back}" onClick="javascript:location.href='{$site.base_url}admin_advertisement/search'">
	    <input type="reset" name="btn_reset2" class="button_1" value="{$lang.lbl_btn_reset}" />
        <input type="submit" name="btn_save"  class="button_1" value="{$lang.lbl_btn_save}"></td>
  </tr>
</table>
<br />
{$mr.str_msg}
{include file='admin_advertisement/tab.tpl'}

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

	<tr>
		<td class="error">{$mr.frm_error}&nbsp;</td>
	</tr> 
  <tr>
    <td>Name: (*) 
      <input name="hd_id" type="hidden" id="hd_id" value="{$mr.adv_id}" /></td>
  </tr>
  <tr>
    <td><input name="txt_name" type="text" id="txt_name" value="{$mr.adv_name}" size="50" maxlength="50" /></td>
  </tr>
  
	<tr>
    <td>URL: (*)      </td>
  </tr>
  <tr>
    <td><input name="txt_url" type="text" id="txt_url" value="{$mr.adv_url}" size="50" maxlength="50" /></td>
  </tr>	
  
  <tr>
    <td>Begin Date: (*)      </td>
  </tr>
  <tr>
    <td><input name="txt_begin" type="text" id="txt_begin" value="{$mr.adv_begin_date}" size="10" maxlength="10" />
    <a  onClick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_begin);return false;" >
	<img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" ></a>
    </td>
  </tr>
  <tr>
    <td>Expired Date: (*) </td>
  </tr>
  <tr>
    <td><input name="txt_expired" type="text" id="txt_expired" value="{$mr.adv_expired_date}" size="10" maxlength="10" />
      <a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_expired);return false;" ><img align="absmiddle" src="{$site.base_url}/application/libraries/js/calendar/calbtn.gif" border="0" /></a></td>
  </tr>
  <tr>
    <td>Position:</td>
  </tr>
  <tr>
    <td><select name="sel_position" id="sel_active4">
        <option value="1" >Left</option>
        <option value="2" {if $mr.adv_position == 2} selected="selected" {/if}>Right</option>
        <option value="3" {if $mr.adv_position == 3} selected="selected" {/if}>Top</option>
        <option value="4" {if $mr.adv_position == 4} selected="selected" {/if}>Bottom</option>
      </select>    </td>
  </tr>
  <tr>
    <td>Open :</td>
  </tr>
  <tr>
    <td><select name="sel_open" id="sel_open">
        <option value="1" >New window</option>
        <option value="2" {if $mr.adv_open == 2} selected="selected" {/if}>Same window</option>
      </select>    </td>
  </tr>  
    
  <tr>
    <td>{$lang.lbl_status}:</td>
  </tr>
  <tr>
    <td><select name="sel_active" id="sel_active">
	  <option value="1" >{$lang.lbl_active}</option>	
      <option value="0" {if $mr.adv_active == 0} selected {/if}>{$lang.lbl_blocked}</option>
      
    </select>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="{$site.base_url}/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
