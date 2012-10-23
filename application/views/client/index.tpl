{include file= 'client/top.tpl'}
<table border="0" align="center" bgcolor="#000000" cellpadding="0" cellspacing="0" class="main">
    <tr>
        <td colspan="3" class="menu" background="{$site.theme_url}pics/banner.gif}" height="160" valign="bottom"></td>
    </tr>
    <tr>
    	<td class="left" width=""></td>
        <td  width="1000" >
        	<table border="0" align="center" width="100%"  cellpadding="0" cellspacing="0" class="content">
            	<tr>
                	<td class="title_menu">{include file ='client/menu.tpl'}</td>
                </tr>
                <tr>
                	<td class="content">{include file=$tpl_center}</td>
                </tr>
            </table>
        </td>
        <td class="right" width=""></td>
    </tr>
    <tr>
    	<td class="footer" colspan="3" valign="top" align="center">{include file='client/footer.tpl'}</td>
    </tr>
</table>
</body>
</html>