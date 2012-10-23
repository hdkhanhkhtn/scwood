{if $sess_cus.username}
Welcome, {$sess_cus.username}&nbsp;&nbsp;&nbsp; <a href="{$site.base_url}login/out" >Logout</a>
{else}
	{include file='login/frmlogin.tpl'}
{/if}


