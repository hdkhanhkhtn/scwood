<table class="content" align="center" border="0">
	<tr>
	  <td align="left" valign="top" height="120">{include file = "customer/menu.tpl}</td>
    </tr>
    <tr valign="top">
        <td valign="top" align="center">
        	<table style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" align="center">
            	<tr>
                	<td align="left">
                    	<input type="button" onclick="javascript:location.href='{$site.base_url}customer/creport'" value="New report input" id="btn_new" class="btn" name="btn_new" >
                    </td>
                    {if $mr.aaa}
                    <td align="right"><strong style="font-family:Arial, Helvetica, sans-serif;">Search By</strong>
                    	<select id="sel_report">
                        	<option value="0">File no.</option>
                            <option value="1">Date of inspection</option>
                            <option value="2">Address</option>
                        </select>
                      	<input type="text" id="txt_keyword"  name="txt_keyword" value="{$mr.keyword}"> <input type="submit" value="search">
                    </td>
                    {/if}
                    <td align="right">
                    	<input onclick="window.open('{$site.base_url}print_history/print_list')" type="button"  name="btn_print" class="btn" id="btn_print" value="Print"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >&nbsp;
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >
                    	<table class="table table-bordered" width="100%" cellpadding="1" >
                        	<tr>
                            	<td  align="center" bgcolor="#FFFFFF" class="header">
                                	File no.
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	Date of Inspection
                                </td>
                                <td width="300" align="center" bgcolor="#FFFFFF" class="header">
                                	Address
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	City
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	Zip
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">Invoice</td>
                            </tr>
                            {if $mlist}
                            {section name=i loop=$mlist}
                            <tr>
                            	<td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/creport/id/{$mlist[i].id}">{$mlist[i].number}</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/creport/id/{$mlist[i].id}">{$mlist[i].dateofinspection}</a>
                                </td>
                                <td width="300" align="left" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/creport/id/{$mlist[i].id}">{$mlist[i].r5b1}</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/creport/id/{$mlist[i].id}">{$mlist[i].r5b2}</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="{$site.base_url}customer/creport/id/{$mlist[i].id}">{$mlist[i].r5b4}</a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF"><a href="{$site.base_url}invoice/create/id/{$mlist[i].id}">invoice</a></td>
                            </tr>	
                            {/section}
                            {/if}
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class='pagination' style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;" >{$mr.str_paging}</div>
{literal}
<script language="javascript" type="text/javascript" charset="UTF-8">
/* <![CDATA[ */
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? 'yes' : 'no';
	
	  var paramz = 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars='+sbt+',width='+w+',height='+h+'';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
/* ]]> */
</script>
{/literal}