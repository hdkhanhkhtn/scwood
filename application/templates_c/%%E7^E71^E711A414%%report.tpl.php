<?php /* Smarty version 2.6.18, created on 2012-10-23 11:27:29
         compiled from customer/report.tpl */ ?>
<table class="content" align="center" border="0">
	<tr>
	  <td align="left" valign="top" height="120"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    </tr>
    <tr valign="top">
        <td valign="top" align="center">
        	<table style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;" align="center">
            	<tr>
                	<td align="left">
                    	<input type="button" onclick="javascript:location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport'" value="New report input" id="btn_new" class="btn" name="btn_new" >
                    </td>
                    <?php if ($this->_tpl_vars['mr']['aaa']): ?>
                    <td align="right"><strong style="font-family:Arial, Helvetica, sans-serif;">Search By</strong>
                    	<select id="sel_report">
                        	<option value="0">File no.</option>
                            <option value="1">Date of inspection</option>
                            <option value="2">Address</option>
                        </select>
                      	<input type="text" id="txt_keyword"  name="txt_keyword" value="<?php echo $this->_tpl_vars['mr']['keyword']; ?>
"> <input type="submit" value="search">
                    </td>
                    <?php endif; ?>
                    <td align="right">
                    	<input onclick="window.open('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/print_list')" type="button"  name="btn_print" class="btn" id="btn_print" value="Print"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >&nbsp;
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >
                    	<table class="table table-bordered" width="100%" cellpadding="1" >
                        	<tr>
                            	<td  align="center" bgcolor="#FFFFFF" class="header">
                                	File no.
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	Date of Inspection
                                </td>
                                <td width="300" align="center" bgcolor="#FFFFFF" class="header">
                                	Address
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	City
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">
                                	Zip
                                </td>
                                <td align="center" bgcolor="#FFFFFF" class="header">Invoice</td>
                            </tr>
                            <?php if ($this->_tpl_vars['mlist']): ?>
                            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['mlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                            <tr>
                            	<td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['number']; ?>
</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['dateofinspection']; ?>
</a>
                                </td>
                                <td width="300" align="left" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b1']; ?>
</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b2']; ?>
</a>
                              </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/creport/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b4']; ?>
</a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
invoice/create/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
">invoice</a></td>
                            </tr>	
                            <?php endfor; endif; ?>
                            <?php endif; ?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class='pagination' style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;" ><?php echo $this->_tpl_vars['mr']['str_paging']; ?>
</div>
<?php echo '
<script language="javascript" type="text/javascript" charset="UTF-8">
/* <![CDATA[ */
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? \'yes\' : \'no\';
	
	  var paramz = \'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=\'+sbt+\',width=\'+w+\',height=\'+h+\'\';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
/* ]]> */
</script>
'; ?>