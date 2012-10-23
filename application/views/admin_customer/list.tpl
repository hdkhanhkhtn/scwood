<form name="frmlist" id="frmlist" action="{$site.base_url}admin_customer/search" method="post" >

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Customer</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td >{$lang.lbl_search}: 
      <input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.keyword}"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="{$lang.lbl_search}" /></td>
    <td align="right">
    	<input type="button" id="btn_print" name="btn_print" value="Print list" onclick="window.open('{$site.base_url}print_history/cus_print')" />
    	<input type="button" id="btn_new" name="btn_new" value="New Member Input" onclick="location.href='{$site.base_url}admin_customer/create'" />
    </td>
  </tr>
</table>


<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
 <tr class="header" >
    <td ><input type="checkbox" name="checkbox" value="checkbox" onclick='checkedAll(this.checked);' ></td>
    <td align="center" nowrap="nowrap">ID &nbsp;&nbsp; <a href="{$site.base_url}admin_customer/id/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_customer/id/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">Company &nbsp;&nbsp;<a href="{$site.base_url}admin_customer/company/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_customer/company/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td  align="center" nowrap="nowrap">City &nbsp;&nbsp;<a href="{$site.base_url}admin_customer/city/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_customer/city/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">Zip &nbsp;&nbsp;<a href="{$site.base_url}admin_customer/zip/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_customer/zip/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td  align="center">Phone</td>
    <td  align="center" nowrap="nowrap">Date Register &nbsp;&nbsp;<a href="{$site.base_url}admin_customer/register/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_customer/register/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td  align="center" nowrap="nowrap">Date Log</td>
    <td  align="center">Report</td>
    <td  align="center">{$lang.lbl_status}</td>
    <td  align="center" nowrap="nowrap">{$lang.lbl_action}</td>
  </tr>
  {section name=i loop=$mlist}
  <tr class="row{if $smarty.section.i.index%2 == 0}2{/if}">
    <td><input name="chk_id[]" type="checkbox" id="chk_id[]" value="{$mlist[i].cus_id}"></td>
    <td><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_username}</a></td>
    <td><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_comp_name}</a></td>
    <td align="center"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_city}</a></td>
    <td align="center"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_zipcode}</a></td>
    <td align="center"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_phone}</a></td>
    <td align="center" nowrap="nowrap"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_time}</a></td>
    <td align="center" nowrap="nowrap"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_timelog}</a></td>
    <td align="center"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$mlist[i].cus_countinvoice}</a></td>
    <td align="center">{if $mlist[i].cus_active} <a href="{$site.base_url}admin_customer/setstatus/id/{$mlist[i].cus_id}/status/0" title="click to change status" >{$lang.lbl_active}</a> {else} <a href="{$site.base_url}admin_customer/setstatus/id/{$mlist[i].cus_id}/status/1" title="click to change status" >{$lang.lbl_blocked}</a> {/if}</td>
    <td align="center" nowrap="nowrap"><a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}">{$lang.lbl_btn_edit}</a> || <a href="{$site.base_url}admin_customer/delete/id/{$mlist[i].cus_id}" onclick="return confirm('{$lang.msg_confirm_del}')" >{$lang.lbl_btn_delete}</a> <a href="{$site.base_url}admin_customer/edit/id/{$mlist[i].cus_id}"></a></td>
  </tr>
  {/section}
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5"  class="tbl_list_bottom"  >
  <tr>
    <td>
	<select name="sel_action" id="sel_action">
		<option value="block">block the selected</option>
		<option value="active">active the selected</option>
		<option value="delete">delete the selected</option>
	</select>
	<input name="btn_update" type="button" id="btn_update"  onclick="sm_frm(frmlist,'{$site.base_url}admin_customer/saveall','{$lang.msg_confirm_del}');" value="{$lang.lbl_btn_update}"   />	</td>
  </tr>
</table>

<div class='pagination' >{$mr.str_paging}</div>

</form>

{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal} 
