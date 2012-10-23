<?php /* Smarty version 2.6.18, created on 2012-10-19 08:52:22
         compiled from customer/main.tpl */ ?>
<?php if ($this->_tpl_vars['sess_cus']['username']): ?>
<table class="content" align="center">
	<tr>
	  <td valign="top" >
      	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "customer/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>
    <tr>
        <td valign="top">
        
        	<table width="90%" border="0" align="center">
          <tr>
            <td><?php echo $this->_tpl_vars['mr']['content']; ?>
</td>
        
          </tr>
          </table>
 

            
            
        </td>
    </tr>
</table>
<?php endif; ?>