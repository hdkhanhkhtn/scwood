<form name="frmlist" id="frmlist" action="{$site.base_url}admin_advertisement/search" method="post" >
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr>
    <td class="text_tt">Advertisement</td>
	<td align="right">
		<input type="button"class="button_1" value="Add advertisement" onclick="javascript:location.href='{$site.base_url}admin_advertisement/create'" /></td>
  </tr>
</table>
{$mr.str_msg}

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td align="left">{$lang.lbl_search}: 
    
    <select name="sel_type" id="sel_type" style="width:120" onchange="frmlist.submit();" >
      <option value="0"> - - - </option>
      <option value="1" {$mr.type1_selected} >Left</option>
      <option value="2" {$mr.type2_selected} >Right</option>
      <option value="3" {$mr.type3_selected} >Top</option>
      <option value="4" {$mr.type4_selected} >Bottom</option>
    </select>
    &nbsp;&nbsp;
      <input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.keyword}"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="{$lang.lbl_search}" /></td>
  </tr>
</table>

<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
<tr class="header">
		<td width="10"><input type="checkbox" name="checkbox" value="checkbox" onclick='checkedAll(this.checked);' ></td>
		<td>Name</td>
		<td width="200">URL</td>
		<td width="80" align="center">Expired Date</td>
		<td width="80" align="center">Image</td>
		<td width="80" align="center">{$lang.lbl_status}</td>
	  <td width="80" align="center">{$lang.lbl_action}</td>
	</tr>
	{section name=i loop=$mlist}
	<tr class="row{if $smarty.section.i.index%2 == 0}2{/if}">
    <td><input name="chk_id[]" type="checkbox" id="chk_id[]" value="{$mlist[i].adv_id}"></td>
    <td><a href="{$site.base_url}admin_advertisement/edit/id/{$mlist[i].adv_id}">{$mlist[i].adv_name}</a></td>
    <td><a href="{$site.base_url}admin_advertisement/edit/id/{$mlist[i].adv_id}">{$mlist[i].adv_url}</a></td>
    <td align="center">{$mlist[i].adv_expired_date}</td>
    <td align="center">
    <a href="{$site.base_url}admin_advertisement/image/id/{$mlist[i].adv_id}">
    <img src="{if $mlist[i].adv_image}{$site.base_url}uploads/adv/{$mlist[i].adv_image}{else}{$site.theme_url}pics/warning.gif{/if}" width="20" border="0" /></a>    </td>
    <td align="center">
	{if $mlist[i].adv_active}
	<a href="{$site.base_url}admin_advertisement/setstatus/id/{$mlist[i].adv_id}/status/0" title="click to change status" >{$lang.lbl_active}</a>
	{else}
	<a href="{$site.base_url}admin_advertisement/setstatus/id/{$mlist[i].adv_id}/status/1" title="click to change status" >{$lang.lbl_blocked}</a>
	{/if}	</td>
    <td align="center"><a href="{$site.base_url}admin_advertisement/edit/id/{$mlist[i].adv_id}">{$lang.lbl_btn_edit}</a> || <a href="{$site.base_url}admin_advertisement/delete/id/{$mlist[i].adv_id}"  onclick="return confirm('{$lang.msg_confirm_del}')" >{$lang.lbl_btn_delete}</a> </td>
  </tr>
	{/section}
</table> 
<table width="100%" border="0" cellspacing="0" cellpadding="5"  class="tbl_list_bottom">
  <tr >
    <td>
	<select name="sel_action" id="sel_action">
		<option value="active">active the selected</option>
		<option value="blocked">blocked the selected</option>
		<option value="delete">Delete the selected</option>
	</select>
	<input name="btn_update" type="button" id="btn_update"  onclick="sm_frm(frmlist,'{$site.base_url}admin_advertisement/saveall','{$lang.msg_confirm_del}');" value="{$lang.lbl_btn_update}" class="button_1"   /></td>
  </tr>
</table>
<div class='pagination' >{$mr.str_paging}</div>
</form>

{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal}