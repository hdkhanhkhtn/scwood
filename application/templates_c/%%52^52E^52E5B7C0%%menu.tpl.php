<?php /* Smarty version 2.6.18, created on 2012-10-20 08:56:29
         compiled from client/menu.tpl */ ?>
<table cellpadding="0" cellspacing="0" border="0" align="left" class="tbl_menu">
<tr>
	
    <td class="bg_menu" ><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
">Home</a></td>
    <td class="spec">&nbsp;</td>
   
    <td class="bg_menu"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
aboutus">About us</a></td>
    <td class="spec">&nbsp;</td>
    
    
    <td class="bg_menu"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
service">Getting Started</a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
contact">Contact us</a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
login"><?php if (! $this->_tpl_vars['sess_cus']['username']): ?>Login<?php else: ?>Report<?php endif; ?></a></td>
    <td class="spec">&nbsp;</td>
    
    <td class="bg_menu"><?php if (! $this->_tpl_vars['sess_cus']['username']): ?><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
register">Register</a><?php else: ?><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
login/out">Logout</a><?php endif; ?></td>
</tr>
</table>