<form name="frmlist" id="frmlist" action="{$site.base_url}admin/save" method="post" enctype="multipart/form-data">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr>
    <td width="200"class="text_tt">Home manager</td>
    <td align="right">
    <input type="submit"class="button_1" value="Save" /></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1">
	<tr>
    	<td width="50%">
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Top left 
                    </td>
                    <td>
                    	<select id="sel_topleft" name="sel_topleft" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.topleft==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_topleft" name="desc_topleft" value="{$mr.desc_topleft}" style="width:220px;" />
                    </td>
                </tr>
            </table>
      </td>
        <td>
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Top right 
                    </td>
                    <td>
                    	<select id="sel_topright" name="sel_topright" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.topright==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_topright" name="desc_topright" value="{$mr.desc_topright}" style="width:220px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Center Banner
                    </td>
                    <td>
                    	<input name="attach_1" type="file" id="attach_1" value="{$mr.banner}" /> (Best image width: 800 pixel) <input name="hd_id" type="hidden" id="hd_id" value="{$mr.home_id}" />
       <input name="hd_old_image" type="hidden" id="hd_old_image" value="{$mr.banner}" />
                    </td>
                </tr>
                {if $mr.banner}
                <tr>
                    <td colspan="2"> 
                    	<img src="{$site.base_url}uploads/home/{$mr.banner}" />&nbsp;<input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" >
    Delete file.
                    </td>
                </tr>
                {/if}
            </table>
        	 
			
        </td>
    </tr>
    <tr>
    	<td>
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Center left 
                    </td>
                    <td>
                    	<select id="sel_centerleft" name="sel_centerleft" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.centerleft==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_centerleft" name="desc_centerleft" value="{$mr.desc_centerleft}" style="width:220px;" />
                    </td>
                </tr>
            </table>
        </td>
        <td>
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Center right 
                    </td>
                    <td>
                    	<select id="sel_centerright" name="sel_centerright" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.centerright==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_centerright" name="desc_centerright" value="{$mr.desc_centerright}" style="width:220px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td>	
        	<table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Bottom left 
                    </td>
                    <td>
                    	<select id="sel_bottomleft" name="sel_bottomleft" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.bottomleft==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_bottomleft" name="desc_bottomleft" value="{$mr.desc_bottomleft}" style="width:220px;" />
                    </td>
                </tr>
            </table>
        </td>	
        <td>
        	 <table width="100%" border="0" cellpadding="10" class="tbl_frm">
            	<tr>
                	<td width="100">
                    	Bottom right 
                    </td>
                    <td>
                    	<select id="sel_bottomright" name="sel_bottomright" style="width:220px;" >
            				{section name=i loop=$lst_page}
                        	<option value="{$lst_page[i].page_id}" {if $mr.bottomright==$lst_page[i].page_id}selected{/if}>{$lst_page[i].page_title}</option>
                        	{/section}
                     	</select>
                    </td>
                </tr>
                <tr>
					<td>	
                    	Description
                    </td>
                    <td> 
                    	<input type="text" id="desc_bottomright" name="desc_bottomright" value="{$mr.desc_bottomright}" style="width:220px;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table></form>