
{if $mr.faqs_id}
<table width="95%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>{$mr.faqs_question}</td>
  </tr>
  <tr>
    <td>{$mr.faqs_answer}</td>
  </tr>
  <tr>
    <td><a href="{$site.base_url}faqs/">back list</a></td>
  </tr>
</table>
<br />
{/if}

<table width="95%" align="center" border="1" cellspacing="0" cellpadding="5">
  {section name=i loop=$mlist}
  <tr>
      <td><strong><a href="{$site.base_url}faqs/search/id/{$mlist[i].faqs_id}">{$mlist[i].faqs_question}</a></strong></td>
  </tr>
  {/section}
  <tr>
    <td>{$mr.str_paging}&nbsp;</td>
  </tr>
</table>
