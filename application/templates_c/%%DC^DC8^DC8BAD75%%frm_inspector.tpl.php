<?php /* Smarty version 2.6.18, created on 2012-10-21 21:45:50
         compiled from customer/frm_inspector.tpl */ ?>
<table class="content" align="center" >
  <tr>
    <td height="120" align="left" valign="top" b><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
  </tr>
  <tr>
        <td valign="top">
            <table width="80%" align="center" border="0" cellspacing="0" cellpadding="8" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" >
            <form action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/save_inspector" method="post" enctype="multipart/form-data">
            <tr>
            <td width="30%"></td>
            <td><font class="text_error"><?php echo $this->_tpl_vars['mr']['frm_error']; ?>
</font></td>
            </tr>
            <tr>
            <td align="right">Inspector name</td>
            <td><input name="name" type="text" value="<?php echo $this->_tpl_vars['mr']['name']; ?>
" id="name" style="border: 1px solid #FF771D;" <?php if ($this->_tpl_vars['mr']['id']): ?>readonly="readonly"<?php endif; ?>><input name="reid" type="hidden" id="reid" value="<?php echo $this->_tpl_vars['mr']['id']; ?>
" /><input name="hd_old_image" type="hidden" id="hd_old_image" value="<?php echo $this->_tpl_vars['mr']['image']; ?>
" /></td>
            </tr>
           
            <tr>
              <td align="right"><?php if ($this->_tpl_vars['mr']['id']): ?>Current <?php endif; ?>Password</td>
              <td><input type="password" name="txt_pass" id="txt_pass" autocomplete="off" style="border: 1px solid #FF771D;" value=""  /><br />
             <font color="#666666" size="1">* Password should be 6 or more characters and  case sensitive</font>
				 </td>
            </tr>
            
            <tr>
            <td align="right">License No.: </td>
            <td><input name="license" type="text" value="<?php echo $this->_tpl_vars['mr']['license']; ?>
" id="license" style="border: 1px solid #FF771D;"></td>
            </tr>
            <?php if ($this->_tpl_vars['mr']['image']): ?>
            <tr>
            	<td colspan="2" align="center">
                    <img src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
uploads/inspector/<?php echo $this->_tpl_vars['mr']['image']; ?>
" width="150" >
                <input name="chk_delfile" type="checkbox" id="chk_delfile" value="1" >
                Delete file.</td>
            </tr>
            <?php endif; ?>
            <tr>
            <td align="right">Signature:</td>
            <td><input name="attack_1" type="file" id="attack_1"  style="border: 1px solid #FF771D;"></td>
            </tr>
            <tr>
            <td align="right">Notes</td>
            <td><input name="note" type="text" id="note" value="<?php echo $this->_tpl_vars['mr']['note']; ?>
" style="border: 1px solid #FF771D;"></td>
            </tr>
            <tr>
            
            <td colspan="2" align="center"><?php if ($this->_tpl_vars['mr']['id']): ?><input type="button" name="change_pass" class="btn_change_pass" value="" onclick="javascript:OpenSubWin('<?php echo $this->_tpl_vars['site']['base_url']; ?>
change_pass/change/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
',350,200);" /><?php endif; ?> <input type="submit" name="Submit"  class="btn_save" value="" ></td>
            </tr>
            </form> 
            </table>
    </td>
</tr>
</table>
<?php echo '
<script language="javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/popup.js"></script>
<script language="javascript" type="text/javascript" charset="UTF-8">
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? \'yes\' : \'no\';
	
	  var paramz = \'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=\'+sbt+\',width=\'+w+\',height=\'+h+\'\';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
</script>
'; ?>