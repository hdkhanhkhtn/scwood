<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Quick Link</td>
     <td align="right" ><input type="button"class="button_1" value="New Quick link input" onclick="javascript:location.href='{$site.base_url}admin_quicklink/create'" /></td>
  </tr>
</table>
{$mr.str_msg}
<form name="frmlist" id="frmlist" action="{$site.base_url}admin_quicklink/search" method="post" >
<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td>{$lang.lbl_search}: 
      <input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.keyword}"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="{$lang.lbl_search}" /></td>
  </tr>
</table>

<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >

  <tr class="header" >
    <td width="10"><input type="checkbox" name="checkbox" value="checkbox" onclick='checkedAll(this.checked);' ></td>
    <td>Name </td>
    <td>Link</td>
    <td width="80" align="center">{$lang.lbl_action}</td>
  </tr>
  {section name=i loop=$mlist}
  <tr class="row{if $smarty.section.i.index%2 == 0}2{/if}">
    <td><input name="chk_id[]" type="checkbox" id="chk_id[]" value="{$mlist[i].quicklink_id}"></td>
    <td><a href="{$site.base_url}admin_quicklink/edit/id/{$mlist[i].quicklink_id}">{$mlist[i].quicklink_name}</a></td>
    <td>
      <a href="{$site.base_url}admin_quicklink/edit/id/{$mlist[i].quicklink_id}">{$mlist[i].quicklink_url}</a></td>
    <td align="center"><a href="{$site.base_url}admin_quicklink/edit/id/{$mlist[i].quicklink_id}">{$lang.lbl_btn_edit}</a> || <a href="{$site.base_url}admin_quicklink/delete/id/{$mlist[i].quicklink_id}"  onclick="return confirm('{$lang.msg_confirm_del}')" >{$lang.lbl_btn_delete}</a> </td>
  </tr>
  {/section}
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5"  class="tbl_list_bottom">
  <tr >
    <td>
	<select name="sel_action" id="sel_action">
		<option value="delete">delete the selected</option>
	</select>
	<input name="btn_update" type="button" id="btn_update"  onclick="sm_frm(frmlist,'{$site.base_url}admin_quicklink/saveall','{$lang.msg_confirm_del}');" value="{$lang.lbl_btn_update}" class="button_1"   /></td>
  </tr>
</table>


<div class='pagination' >{$mr.str_paging}</div>
</form>

{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal} 
