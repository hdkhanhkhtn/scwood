<?php /* Smarty version 2.6.18, created on 2012-10-19 08:59:34
         compiled from admin/header.tpl */ ?>
<table width="100%" border="0" height="80" class="tbl_header" cellpadding="5" >
<tr>
    <td>ARIZONA - <?php echo $this->_tpl_vars['lang']['lbl_admin_panel']; ?>
</td>
    <Td align="right">
	
        <table border="0" cellpadding="0" cellspacing="0" class="tbl_toplogin">
            <tr>
            <td class="size12"><?php echo $this->_tpl_vars['lang']['lbl_logged']; ?>
: <?php echo $this->_tpl_vars['sess_user']['name']; ?>
</td>
            </tr>
            <tr>
            <td><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_myaccount"><?php echo $this->_tpl_vars['lang']['lbl_my_acc']; ?>
</a></td>
            </tr>
            <tr>
            <td><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_login/out"><?php echo $this->_tpl_vars['lang']['lbl_signout']; ?>
</a></td>
            </tr>
        </table>
  
	</TD>
</TR>
</table>