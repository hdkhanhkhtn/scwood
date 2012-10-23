<table cellpadding="0" cellspacing="0" border="0" align="left" class="tbl_menu">
<tr>
	
    <td class="bg_menu" ><a href="{$site.base_url}">Home</a></td>
    <td class="spec">&nbsp;</td>
   
    <td class="bg_menu"><a href="{$site.base_url}aboutus">About us</a></td>
    <td class="spec">&nbsp;</td>
    
    
    <td class="bg_menu"><a href="{$site.base_url}service">Getting Started</a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu"><a href="{$site.base_url}contact">Contact us</a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu"><a href="{$site.base_url}login">{if !$sess_cus.username}Login{else}Report{/if}</a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu">{if !$sess_cus.username}<a href="{$site.base_url}register">Register</a>{else}<a href="{$site.base_url}login/out">Logout</a>{/if}</td>
</tr>
</table>