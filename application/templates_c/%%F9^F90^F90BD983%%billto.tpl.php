<?php /* Smarty version 2.6.18, created on 2012-10-22 11:04:31
         compiled from invoice/billto.tpl */ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;height:8em;">
  <tr>
    <td rowspan="2" bgcolor="#4f81BD" align="center" style="width:100px;"><font color="#FFFFFF"><strong>Bill to :</strong></font></td>
    <td bgcolor="#999999" style="padding-left:5px;">
    <input type="text" name="txt_bill_name" id="txt_bill_name" value="<?php echo $this->_tpl_vars['mr']['bill_name']; ?>
" style="width:18em;"  /><br />
 	<input type="text" name="txt_bill_cname" id="txt_bill_cname" value="<?php echo $this->_tpl_vars['mr']['bill_cname']; ?>
" style="width:18em;"  />
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" style="padding-left:5px;" >
    <input type="text" name="txt_bill_address" id="txt_bill_address" value="<?php echo $this->_tpl_vars['mr']['bill_address']; ?>
"  style="width:18em;" /><br />
<input type="text" name="txt_bill_city" id="txt_bill_city" value="<?php echo $this->_tpl_vars['mr']['bill_city']; ?>
"  style="width:9em;" />, <input type="text" name="txt_bill_state" id="txt_bill_state" value="<?php echo $this->_tpl_vars['mr']['bill_state']; ?>
" style="width:2em;"  /> <input type="text" name="txt_bill_zipcode" id="txt_bill_zipcode" value="<?php echo $this->_tpl_vars['mr']['bill_zipcode']; ?>
" style="width:5em;" />
    </td>
  </tr>
</table>
<br clear="all">
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	<td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Description</font><font color="#FFFFFF"> of service</font></td>
    </tr>
    <tr>
    	<td height="3"></td>
    </tr>
    <tr>
    	<td valign="top">
    		<textarea name="txt_description" id="txt_description" cols="35" rows="16" style="width:100%;height:22em;margin-left:-3px;margin-top:-3px;" ><?php echo $this->_tpl_vars['mr']['description']; ?>
</textarea>
            <input name="report_id" id="report_id" type="hidden" value="<?php if ($this->_tpl_vars['mr']['id']): ?><?php echo $this->_tpl_vars['mr']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mr']['report_id']; ?>
<?php endif; ?>" >
        </td>
    </tr>
</table>