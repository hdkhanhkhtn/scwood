<?php /* Smarty version 2.6.18, created on 2012-10-21 21:31:38
         compiled from admin_email/main.tpl */ ?>
<form action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_email/index_sm" method="post">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td width="200"class="text_tt">Email Template</td>
    <td align="right"><input type="reset" name="btn_reset" value="<?php echo $this->_tpl_vars['lang']['lbl_btn_reset']; ?>
" class="button_1" /> 
    <input type="submit" name="btn_save"  value="<?php echo $this->_tpl_vars['lang']['lbl_btn_save']; ?>
" class="button_1" /></td>
  </tr>
</table>

<br />

<?php echo $this->_tpl_vars['mr']['str_msg']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_email/tab.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tbl_frm" >

    <tr>
    <td class="error"><?php echo $this->_tpl_vars['mr']['frm_error']; ?>
&nbsp;</td>
    </tr>
    <tr>
    <td><textarea name="txt_content" cols="60" rows="10" id="txt_content" style="width:700px;height:600px" ><?php echo $this->_tpl_vars['mr']['content']; ?>
</textarea></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>

</table>
 </form>
 
<?php echo '
<script type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'uploads/fckeditor/fckeditor.js"></script>
<script language="javascript" >
	var oFCKeditor = new FCKeditor(\'txt_content\');
	oFCKeditor.BasePath	= \''; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'uploads/fckeditor/\' ;
	oFCKeditor.ReplaceTextarea() ;
</script>
'; ?>