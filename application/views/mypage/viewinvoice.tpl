<table width="791" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td colspan="2"  valign="top" class="tbl_1"> {include file= 'mypage/menu.tpl'}</td>
  </tr>
  <tr>
    <td>{include file= 'invoice/pre_billing.tpl'}</td>
    <td>{include file= 'invoice/pre_shipping.tpl'}</td>
  </tr>
  <tr>
  	<td colspan="2">
    
    <table width="100%" align="center" cellspacing="1" cellpadding="5" class="tbl_list" border="1"  >
        <tr class="tbl_list_header" >
        <td width="50" align="center">{$lang.lbl_id}</td>
        <td>{$lang.lbl_item}</td>
        <td width="50" align="center">{$lang.lbl_qty}</td>
        <td  width="80">{$lang.lbl_price}</td>
        <td  width="80">{$lang.lbl_amount}</td>
        </tr>
        {section name=i loop=$mlist}
        <tr class="tbl_list_row{if $smarty.section.i.index%2 == 0}2{/if}">
        <td align="center">{$mlist[i].invdt_id}</td>
        <td>{$mlist[i].invdt_item_name}</td>
        <td align="center">{$mlist[i].invdt_item_qty}</td>
        <td align="right">{$mlist[i].invdt_item_price}</td>
        <td align="right">{$mlist[i].invdt_item_amount}</td>
        </tr>
        {/section}
        <tr class="tbl_list_row2">
        <td align="center">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="right">{$lang.lbl_total}: </td>
        <td align="right">{$mr.invoice_total}</td>
        </tr>
        <tr class="tbl_list_row2">
          <td align="center">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td align="right">&nbsp;</td>
        </tr>
        <tr class="tbl_list_row2">
          <td colspan="5">{$lang.lbl_status}: {$mr.invoice_status_name}</td>
        </tr>
    </table>    </td>
  </tr>
</table>

