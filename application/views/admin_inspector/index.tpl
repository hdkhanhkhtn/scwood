<form name="frmlist" id="frmlist" action="{$site.base_url}admin_inspector/search" method="post" >

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Inspector</td>
    <td align="right">{if $mr.aaa}<input type="button" id="btn_new" name="btn_new" value="New inspector Input" onclick="location.href='{$site.base_url}admin_inspector/create'" />{/if}</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td >{$lang.lbl_search}: 
      <input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.keyword}"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="{$lang.lbl_search}" /></td>
    <td align="right"></td>
  </tr>
</table>


<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
 <tr class="header" >
    <td align="center" nowrap="nowrap">Inspector name&nbsp;&nbsp; <a href="{$site.base_url}admin_inspector/name/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_inspector/name/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">License #&nbsp;&nbsp; <a href="{$site.base_url}admin_inspector/lic/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_inspector/lic/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td  align="center">{$lang.lbl_status}</td>
    <td  align="center">Action</td>
    </tr>
  {section name=i loop=$mlist}
  <tr class="row{if $smarty.section.i.index%2 == 0}2{/if}">
    <td align="center"><a href="{$site.base_url}admin_inspector/edit/id/{$mlist[i].id}">{$mlist[i].name}</a></td>
    <td align="center"><a href="{$site.base_url}admin_inspector/edit/id/{$mlist[i].id}">{$mlist[i].license}</a></td>
    <td align="center">{if $mlist[i].active} <a href="{$site.base_url}admin_inspector/setstatus/id/{$mlist[i].id}/status/0" title="click to change status" >{$lang.lbl_active}</a> {else} <a href="{$site.base_url}admin_inspector/setstatus/id/{$mlist[i].id}/status/1" title="click to change status" >{$lang.lbl_blocked}</a> {/if}</td>
    <td align="center"><a href="{$site.base_url}admin_inspector/edit/id/{$mlist[i].id}">{$lang.lbl_btn_edit}</a> || <a href="{$site.base_url}admin_inspector/delete/id/{$mlist[i].id}" onclick="return confirm('{$lang.msg_confirm_del}')" >{$lang.lbl_btn_delete}</a> <a href="{$site.base_url}admin_inspector/edit/id/{$mlist[i].id}"></a></td>
    </tr>
  {/section}
</table>



<div class='pagination' >{$mr.str_paging}</div>

</form>

{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal} 
