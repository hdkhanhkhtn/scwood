<?php /* Smarty version 2.6.18, created on 2012-10-21 21:29:19
         compiled from admin_report/index.tpl */ ?>
<form name="frmlist" id="frmlist" action="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/search" method="post" >

<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" class="tbl_title">
  <tr >
    <td class="text_tt">Report</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" class="tbl_list_top">
  <tr>
    <td ><?php echo $this->_tpl_vars['lang']['lbl_search']; ?>
: <select id="sel_type" name="sel_type" >
    							<option value="1" <?php if ($this->_tpl_vars['mr']['sel_type'] == 1): ?>selected<?php endif; ?>>Lic.NO.</option>
                                <option value="2" <?php if ($this->_tpl_vars['mr']['sel_type'] == 2): ?>selected<?php endif; ?>>File NO.</option>
                                <option value="3" <?php if ($this->_tpl_vars['mr']['sel_type'] == 3): ?>selected<?php endif; ?>>Address</option>
    						</select>
      <input name="txt_keyword" type="text" id="txt_keyword" value="<?php echo $this->_tpl_vars['mr']['keyword']; ?>
"  />
    &nbsp;<input name="btn_search" type="submit" id="btn_search" class="button_1" value="<?php echo $this->_tpl_vars['lang']['lbl_search']; ?>
" /></td>
    <td align="right"><input type="button" id="btn_print" name="btn_print" value="Print list" onclick="window.open('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/report_list')" /></td>
  </tr>
</table>


<table width="100%" cellspacing="1" border="0" cellpadding="5" class="tbl_list"   >
 <tr class="header" >
    <td align="center" nowrap="nowrap">Lic.No. &nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/lic/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/lic/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td align="center" nowrap="nowrap">File No.</td>
    <td  align="center" nowrap="nowrap">Date of Inspection &nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/date/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/date/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td align="center">Address</td>
    <td  align="center" nowrap="nowrap">City &nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/city/sort/asc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/asc.png" border="0" /></a> <a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/city/sort/desc"><img src="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
pics/desc.png" border="0" /></a></td>
    <td  align="center">Zip</td>
    <td  align="center">History</td>
    <td align="center">Action</td>
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
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['cus_license']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['number']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['dateofinspection']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b1']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b2']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['r5b4']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/edit/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['total']; ?>
</a></td>
    <td align="center"><a href="<?php echo $this->_tpl_vars['site']['base_url']; ?>
admin_report/del/id/<?php echo $this->_tpl_vars['mlist'][$this->_sections['i']['index']]['id']; ?>
" onclick="return confirm('<?php echo $this->_tpl_vars['lang']['msg_confirm_del']; ?>
')">Del</a></td>
    </tr>
  <?php endfor; endif; ?>
</table>



<div class='pagination' ><?php echo $this->_tpl_vars['mr']['str_paging']; ?>
</div>

</form>

<?php echo '
<script language="javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'application/libraries/js/form.js"></script>
'; ?>
 