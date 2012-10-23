<?php /* Smarty version 2.6.18, created on 2012-10-23 11:46:00
         compiled from customer/inspector.tpl */ ?>
<table class="content" align="center">
	<tr>
	  <td align="left" valign="top" height="120"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
     </tr>
     <tr>
        <td valign="top">
        	<table width="100%" align="center" style="font-family:Tahoma, Geneva, sans-serif;font-size:13px;color:#000;">
            	<tr>
                	<td>
                    	<input class="btn" type="button" value="New Inspector input" id="btn_new" name="btn_new" onclick="javascript:location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/cinspector'">
                    </td>
                    <?php if ($this->_tpl_vars['mr']['aaa']): ?>
                    <td align="right">
                    	<strong>Inspector / License NO.</strong>
                        <input type="text" id="txt_keyword"  name="txt_keyword"> <input type="submit" value="search">
                    </td>
                    <?php endif; ?>
                </tr>
                <tr>
                	<td colspan="2" >&nbsp;
                    </td>
                </tr>
                <tr>
                	<td colspan="2" >
                    	<table width="100%" cellpadding="1" class="table table-bordered">
                        	<tr>
                            	<td width="50%" align="center" bgcolor="#FFFFFF">
                                	Inspector
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	License #
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	Status
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	Action
                                </td>
                            </tr>
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
                            	<td width="50%" align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/cinspector/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?><span style="color:#F00;"><?php endif; ?><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['name']; ?>
<?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?></span><?php endif; ?></a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/cinspector/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?><span style="color:#F00;"><?php endif; ?><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['license']; ?>
<?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?></span><?php endif; ?></a>
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<?php if ($this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/cinspector/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
">Active</a><?php else: ?><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/cinspector/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><span style="color:#F00;">In-Active</span><?php endif; ?>
                                </td>
                                <td align="center" bgcolor="#FFFFFF">
                                	<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
customer/del_inspector/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['lang']['msg_confirm_del']; ?>
')"><?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?><span style="color:#F00;"><?php endif; ?>Del<?php if (! $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['active']): ?></span><?php endif; ?></a>
                                </td>
                            </tr>	
                            <?php endfor; endif; ?>
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
<script language="javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/form.js"></script>
'; ?>
 