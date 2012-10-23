<?php /* Smarty version 2.6.18, created on 2012-10-22 11:04:31
         compiled from invoice/index.tpl */ ?>
<form name="frm" action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
invoice/save" method="post">
	<table border="0" align="center" class="content" >
    	<tr>
        	<td style="padding:20px;">
            	<table border="0" align="center" style="border:1px solid #000;" >
                    <tr>
                      <td colspan="2" align="center"><?php echo $this->_tpl_vars['mr']['frm_error']; ?>
</td>
                  </tr>
                    <tr>
                        <td colspan="2" align="center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'invoice/infor.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $this->_tpl_vars['mr']['invoice_id']; ?>
"></td>
                    </tr>
                    <tr>
                      <td nowrap valign="top" width="50%"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'invoice/inspected.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                      <td valign="top" width="50%"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'invoice/billto.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                    </tr> 
                    <tr><td colspan="2" align="center"><input type="button" value="Save" onclick="sm_frm(frm,'<?php echo $this->_tpl_vars['site']['base_url']; ?>
invoice/save','_self');"> <?php if ($this->_tpl_vars['mr']['invoice_id']): ?><input type="button"  value="Print" onclick="sm_frm(frm,'<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/print_invoice/id/<?php echo $this->_tpl_vars['mr']['invoice_id']; ?>
','_blank');"><?php endif; ?>
                   <?php if ($this->_tpl_vars['mr']['new']): ?>
                    <input type="button" name="btn_back"  class="button_1" value="Back to report" onclick="javascript:location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mr']['report_id']; ?>
'">
                    <?php else: ?>
                    <input type="button" name="btn_back"  class="button_1" value="Back" onclick="javascript:location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/report'">
                    <?php endif; ?>
                    <input name="txt_new" id="txt_new" type="hidden" value="<?php echo $this->_tpl_vars['mr']['new']; ?>
" >
                    </td></tr>
                </table>
            </td>
        </tr>
    </table>
	
</form>
<?php echo '
<script language="javascript" type="text/javascript" charset="UTF-8">
/* <![CDATA[ */
	function sm_frm(frm,action,target){
		  frm.target=target;
		  frm.action = action;
		  frm.submit();
	}
</script>
'; ?>