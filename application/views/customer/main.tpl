{if $sess_cus.username}
<table class="content" align="center">
	<tr>
	  <td valign="top" >
      	{include file="customer/menu.tpl}
      </td>
    </tr>
    <tr>
        <td valign="top">
        
        	<table width="90%" border="0" align="center">
          <tr>
            <td>{$mr.content}</td>
        
          </tr>
          </table>
 

            
            
        </td>
    </tr>
</table>
{/if}