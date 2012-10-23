<?php /* Smarty version 2.6.18, created on 2012-10-23 16:17:51
         compiled from client/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'client/top.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table border="0" align="center" bgcolor="#000000" cellpadding="0" cellspacing="0" class="main">
    <tr>
        <td colspan="3" class="menu" background="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/banner.gif}" height="160" valign="bottom"></td>
    </tr>
    <tr>
    	<td class="left" width=""></td>
        <td  width="1000" >
        	<table border="0" align="center" width="100%"  cellpadding="0" cellspacing="0" class="content">
            	<tr>
                	<td class="title_menu"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'client/menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                </tr>
                <tr>
                	<td class="content"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['tpl_center'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                </tr>
            </table>
        </td>
        <td class="right" width=""></td>
    </tr>
    <tr>
    	<td class="footer" colspan="3" valign="top" align="center"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'client/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    </tr>
</table>
</body>
</html>