<table class="content" align="center">
	<tr>
	  <td align="left" valign="top" height="120">{include file = "customer/menu.tpl}</td>
     </tr>
     <tr>
        <td valign="top">
        	<table width="100%" align="center" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
            	<tr>
                	<td>
                    	<input class="btn" type="button" value="New Inspector input" id="btn_new" name="btn_new" onclick="javascript:location.href='{$site.base_url}customer/cinspector'">
                    </td>
                    {if $mr.aaa}
                    <td align="right">
                    	<strong>Inspector / License NO.</strong>
                        <input type="text" id="txt_keyword"  name="txt_keyword"> <input type="submit" value="search">
                    </td>
                    {/if}
                </tr>
                <tr>
                	<td colspan="2" >&nbsp;
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >
                    	<table width="100%" cellpadding="1" class="table table-bordered">
                        	<tr>
                            	<td width="50%" align="center" bgcolor="#FFFFFF">
                                	Inspector
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	License #
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	Status
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	Action
                                </td>
                            </tr>
                            {section name=i loop=$mlist}
                            <tr>
                            	<td width="50%" align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/cinspector/id/{$mlist[i].id}">{if !$mlist[i].active}<span style="color:#F00;">{/if}{$mlist[i].name}{if !$mlist[i].active}</span>{/if}</a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/cinspector/id/{$mlist[i].id}">{if !$mlist[i].active}<span style="color:#F00;">{/if}{$mlist[i].license}{if !$mlist[i].active}</span>{/if}</a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	{if $mlist[i].active}<a href="{$site.base_url}customer/cinspector/id/{$mlist[i].id}">Active</a>{else}<a href="{$site.base_url}customer/cinspector/id/{$mlist[i].id}"><span style="color:#F00;">In-Active</span>{/if}
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/del_inspector/id/{$mlist[i].id}" onclick="return confirm('{$lang.msg_confirm_del}')">{if !$mlist[i].active}<span style="color:#F00;">{/if}Del{if !$mlist[i].active}</span>{/if}</a>
                                </td>
                            </tr>	
                            {/section}
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class='pagination' style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;" >{$mr.str_paging}</div>
{literal}
<script language="javascript" src="{/literal}{$site.base_url}{literal}application/libraries/js/form.js"></script>
{/literal} 