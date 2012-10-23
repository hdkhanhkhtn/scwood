<?php /* Smarty version 2.6.18, created on 2012-10-19 08:59:34
         compiled from admin_customer/list.tpl */ ?>
<form name="frmlist" id="frmlist" action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/search" method="post" >

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Customer</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td ><?php echo $this->_tpl_vars['lang']['lbl_search']; ?>
: 
      <input name="txt_keyword" type="text" id="txt_keyword" value="<?php echo $this->_tpl_vars['mr']['keyword']; ?>
"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="<?php echo $this->_tpl_vars['lang']['lbl_search']; ?>
" /></td>
    <td align="right">
    	<input type="button" id="btn_print" name="btn_print" value="Print list" onclick="window.open('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/cus_print')" />
    	<input type="button" id="btn_new" name="btn_new" value="New Member Input" onclick="location.href='<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/create'" />
    </td>
  </tr>
</table>


<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
 <tr class="header" >
    <td ><input type="checkbox" name="checkbox" value="checkbox" onclick='checkedAll(this.checked);' ></td>
    <td align="center" nowrap="nowrap">ID &nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/id/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/id/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">Company &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/company/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/company/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td  align="center" nowrap="nowrap">City &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/city/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/city/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">Zip &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/zip/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/zip/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td  align="center">Phone</td>
    <td  align="center" nowrap="nowrap">Date Register &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/register/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/register/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td  align="center" nowrap="nowrap">Date Log</td>
    <td  align="center">Report</td>
    <td  align="center"><?php echo $this->_tpl_vars['lang']['lbl_status']; ?>
</td>
    <td  align="center" nowrap="nowrap"><?php echo $this->_tpl_vars['lang']['lbl_action']; ?>
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
  <tr class="row<?php if ($this->_sections['i']['index']%2 == 0): ?>2<?php endif; ?>">
    <td><input name="chk_id[]" type="checkbox" id="chk_id[]" value="<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"></td>
    <td><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_username']; ?>
</a></td>
    <td><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_comp_name']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_city']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_zipcode']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_phone']; ?>
</a></td>
    <td align="center" nowrap="nowrap"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_time']; ?>
</a></td>
    <td align="center" nowrap="nowrap"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_timelog']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_countinvoice']; ?>
</a></td>
    <td align="center"><?php if ($this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_active']): ?> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/setstatus/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
/status/0" title="click to change status" ><?php echo $this->_tpl_vars['lang']['lbl_active']; ?>
</a> <?php else: ?> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/setstatus/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
/status/1" title="click to change status" ><?php echo $this->_tpl_vars['lang']['lbl_blocked']; ?>
</a> <?php endif; ?></td>
    <td align="center" nowrap="nowrap"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"><?php echo $this->_tpl_vars['lang']['lbl_btn_edit']; ?>
</a> || <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/delete/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['lang']['msg_confirm_del']; ?>
')" ><?php echo $this->_tpl_vars['lang']['lbl_btn_delete']; ?>
</a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_id']; ?>
"></a></td>
  </tr>
  <?php endfor; endif; ?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5"  class="tbl_list_bottom"  >
  <tr>
    <td>
	<select name="sel_action" id="sel_action">
		<option value="block">block the selected</option>
		<option value="active">active the selected</option>
		<option value="delete">delete the selected</option>
	</select>
	<input name="btn_update" type="button" id="btn_update"  onclick="sm_frm(frmlist,'<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_customer/saveall','<?php echo $this->_tpl_vars['lang']['msg_confirm_del']; ?>
');" value="<?php echo $this->_tpl_vars['lang']['lbl_btn_update']; ?>
"   />	</td>
  </tr>
</table>

<div class='pagination' ><?php echo $this->_tpl_vars['mr']['str_paging']; ?>
</div>

</form>

<?php echo '
<script language="javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/form.js"></script>
'; ?>
 