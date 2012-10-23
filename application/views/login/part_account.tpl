<table width="150" border="0" align="center" cellpadding="10" cellspacing="0" class="tbl_login">
{if $sess_cus.type=='0'}
  <tr>
  	<td class="title">Welcome, {$sess_cus.username}<br />
		<a href="{$site.base_url}login/out">Logout</a>
    </td>

    {elseif $sess_cus.type=='1'}
     <tr>
  	<td class="title">Welcome, {$sess_cus.username}</td>
  </tr>
  <tr height="20">
    <td class="title"><a href="{$site.base_url}mypage/viewaccount">My Account</a></td>
  </tr>
  <tr height="20">
    <td class="title"><a href="{$site.base_url}mypage/changepass">Change password</a></td>
  </tr>
  <tr height="20">
    <td class="title"><a href="{$site.base_url}login/out">Logout</a></td>
  </tr>
  {/if}
</table>
