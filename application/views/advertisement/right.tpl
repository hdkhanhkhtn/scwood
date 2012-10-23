<table width="100%" align="center" border="1" cellspacing="0" cellpadding="5">
<tr>
	<Td>Advertisement</Td>
</tr>
{section name=i loop=$lst_adv_right}
<tr>
  <td>
  <a href="{$lst_adv_right[i].adv_url}" target="_blank">
  <img src="{$site.base_url}uploads/adv/{$lst_adv_right[i].adv_image}" border="0"
   alt="{$lst_adv_right[i].adv_name}" width="150" ></a></td>
</tr>
{/section}

</table>