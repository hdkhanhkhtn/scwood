
{if $mr.qna_id}
<table width="95%" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>{$mr.qna_question}</td>
  </tr>
  <tr>
    <td>{$mr.qna_answer}</td>
  </tr>
  <tr>
    <td><a href="{$site.base_url}qna/">back list</a></td>
  </tr>
</table>
<br />
{/if}

<table width="95%" align="center" border="1" cellspacing="0" cellpadding="5">
 <tr>
      <td align="right"><input type="button" onclick="javascript:location.href='{$site.base_url}qna/create'" value="Post question" >&nbsp;</td>
  </tr>
  {section name=i loop=$mlist}
  <tr>
      <td><strong><a href="{$site.base_url}qna/search/id/{$mlist[i].qna_id}">{$mlist[i].qna_question}</a></strong></td>
  </tr>
  {/section}
  <tr>
    <td>{$mr.str_paging}&nbsp;</td>
  </tr>
  
</table>
