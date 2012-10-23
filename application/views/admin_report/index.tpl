<form name="frmlist" id="frmlist" action="{$site.base_url}admin_report/search" method="post" >

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Report</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td >{$lang.lbl_search}: <select id="sel_type" name="sel_type" >
    							<option value="1" {if $mr.sel_type==1}selected{/if}>Lic.NO.</option>
                                <option value="2" {if $mr.sel_type==2}selected{/if}>File NO.</option>
                                <option value="3" {if $mr.sel_type==3}selected{/if}>Address</option>
    						</select>
      <input name="txt_keyword" type="text" id="txt_keyword" value="{$mr.keyword}"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="{$lang.lbl_search}" /></td>
    <td align="right"><input type="button" id="btn_print" name="btn_print" value="Print list" onclick="window.open('{$site.base_url}print_history/report_list')" /></td>
  </tr>
</table>


<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
 <tr class="header" >
    <td align="center" nowrap="nowrap">Lic.No. &nbsp;&nbsp; <a href="{$site.base_url}admin_report/lic/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_report/lic/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">File No.</td>
    <td  align="center" nowrap="nowrap">Date of Inspection &nbsp;&nbsp; <a href="{$site.base_url}admin_report/date/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_report/date/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td align="center">Address</td>
    <td  align="center" nowrap="nowrap">City &nbsp;&nbsp; <a href="{$site.base_url}admin_report/city/sort/asc"><img src="{$site.theme_url}pics/asc.png" border="0" /></a> <a href="{$site.base_url}admin_report/city/sort/desc"><img src="{$site.theme_url}pics/desc.png" border="0" /></a></td>
    <td  align="center">Zip</td>
    <td  align="center">History</td>
    <td align="center">Action</td>
    </tr>
  {section name=i loop=$mlist}
  <tr class="row{if $smarty.section.i.index%2 == 0}2{/if}">
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].cus_license}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].number}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].dateofinspection}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].r5b1}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].r5b2}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].r5b4}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/edit/id/{$mlist[i].id}">{$mlist[i].total}</a></td>
    <td align="center"><a href="{$site.base_url}admin_report/del/id/{$mlist[i].id}" onclick="return confirm('{$lang.msg_confirm_del}')">Del</a></td>
    </tr>
  {/section}
</table>



<div class='pagination' >{$mr.str_paging}</div>

</form>

{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal} 
