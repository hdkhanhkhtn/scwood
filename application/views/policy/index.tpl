 <table width="90%" align="center" border="0" cellspacing="0" cellpadding="3" class="tbl_frm"  >
       
          <tr>
            <td width="100%" class="header">{$mr.policy_name}</td>
        </tr>
          <tr>
            <td >{$mr.policy_desc}</td>
        </tr>
          <tr>
            <td >&nbsp;</td>
          </tr>
    </table>
    
    <table width="90%" align="center" border="0" cellspacing="0" cellpadding="0" class="tbl_frm">
    {section name=i loop=$mlist}
    <tr>
      <td><strong>{$mlist[i].policydt_title}</strong></td>
    </tr>
    <tr>
      <td>{$mlist[i].policydt_body}</td>
    </tr>
    <tr>
      <td >&nbsp;</td>
    </tr>
    {/section}
    </table>
