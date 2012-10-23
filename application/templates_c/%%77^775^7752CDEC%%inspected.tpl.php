<?php /* Smarty version 2.6.18, created on 2012-10-22 11:04:31
         compiled from invoice/inspected.tpl */ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px;height:8em;"">
  <tr>
    <td rowspan="2" bgcolor="#4f81BD" align="center"  style="width:100px;"><font color="#FFFFFF"><strong>Property</strong><br>
<strong>Inspected :</strong></font></td>
    <td bgcolor="#999999" style="padding-left:5px;">
    <input type="text" name="txt_inspected_name" id="txt_inspected_name" value="<?php echo $this->_tpl_vars['mr']['inspected_name']; ?>
" style="width:18em;"  /><br />
    <input type="text" name="txt_inspected_cname" id="txt_inspected_cname" value="<?php echo $this->_tpl_vars['mr']['inspected_cname']; ?>
" style="width:18em;"  />
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" style="padding-left:5px;" >
        <input type="text" name="txt_inspected_address" id="txt_inspected_address" value="<?php echo $this->_tpl_vars['mr']['inspected_address']; ?>
"  style="width:18em;" /><br />
        <input type="text" name="txt_inspected_city" id="txt_inspected_city" value="<?php echo $this->_tpl_vars['mr']['inspected_city']; ?>
"  style="width:9em;" />, 
        <input type="text" name="txt_inspected_state" id="txt_inspected_state" value="<?php echo $this->_tpl_vars['mr']['inspected_state']; ?>
" style="width:2em;"  /> 
        <input type="text" name="txt_inspected_zipcode" id="txt_inspected_zipcode" value="<?php echo $this->_tpl_vars['mr']['inspected_zipcode']; ?>
" style="width:5em;" />
		
         
    </td>
  </tr>
</table>
<br clear="all">
<table width="100%" border="0" cellspacing="1" cellpadding="3" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	<td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Descriptions</font></td>
        <td align="center" bgcolor="#4f81BD"><font color="#FFFFFF">Amount($)</font></td>
    </tr>
    <tr>
    	<td height="3" colspan="2"></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td ><input type="text" name="txt_des1" id="txt_des1" value="<?php echo $this->_tpl_vars['mr']['desc_1']; ?>
" /></td>
        <td ><input type="text" name="txt_amount1" id="txt_amount1" value="<?php if ($this->_tpl_vars['mr']['desc_1']): ?><?php echo $this->_tpl_vars['mr']['amount_1']; ?>
<?php endif; ?>" style="text-align:right;"   ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td ><input type="text" name="txt_des2" id="txt_des2" value="<?php echo $this->_tpl_vars['mr']['desc_2']; ?>
" /></td>
        <td><input type="text" name="txt_amount2" id="txt_amount2" value="<?php if ($this->_tpl_vars['mr']['desc_2']): ?><?php echo $this->_tpl_vars['mr']['amount_2']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des3" id="txt_des3" value="<?php echo $this->_tpl_vars['mr']['desc_3']; ?>
"/></td>
        <td><input type="text" name="txt_amount3" id="txt_amount3" value="<?php if ($this->_tpl_vars['mr']['desc_3']): ?><?php echo $this->_tpl_vars['mr']['amount_3']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des4" id="txt_des4" value="<?php echo $this->_tpl_vars['mr']['desc_4']; ?>
"/></td>
        <td><input type="text" name="txt_amount4" id="txt_amount4" value="<?php if ($this->_tpl_vars['mr']['desc_4']): ?><?php echo $this->_tpl_vars['mr']['amount_4']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des5" id="txt_des5" value="<?php echo $this->_tpl_vars['mr']['desc_5']; ?>
" /></td>
        <td><input type="text" name="txt_amount5" id="txt_amount5" value="<?php if ($this->_tpl_vars['mr']['desc_5']): ?><?php echo $this->_tpl_vars['mr']['amount_5']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des6" id="txt_des6" value="<?php echo $this->_tpl_vars['mr']['desc_6']; ?>
"/></td>
        <td><input type="text" name="txt_amount6" id="txt_amount6" value="<?php if ($this->_tpl_vars['mr']['desc_6']): ?><?php echo $this->_tpl_vars['mr']['amount_6']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des7" id="txt_des7" value="<?php echo $this->_tpl_vars['mr']['desc_7']; ?>
"/></td>
        <td><input type="text" name="txt_amount7" id="txt_amount7" value="<?php if ($this->_tpl_vars['mr']['desc_7']): ?><?php echo $this->_tpl_vars['mr']['amount_7']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des8" id="txt_des8" value="<?php echo $this->_tpl_vars['mr']['desc_8']; ?>
"/></td>
        <td><input type="text" name="txt_amount8" id="txt_amount8" value="<?php if ($this->_tpl_vars['mr']['desc_8']): ?><?php echo $this->_tpl_vars['mr']['amount_8']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#D0D8E8">
    	<td><input type="text" name="txt_des9" id="txt_des9" value="<?php echo $this->_tpl_vars['mr']['desc_9']; ?>
"/></td>
        <td><input type="text" name="txt_amount9" id="txt_amount9" value="<?php if ($this->_tpl_vars['mr']['desc_9']): ?><?php echo $this->_tpl_vars['mr']['amount_9']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
    <tr bgcolor="#E9EDF4">
    	<td><input type="text" name="txt_des10" id="txt_des10" value="<?php echo $this->_tpl_vars['mr']['desc_10']; ?>
" /></td>
        <td><input type="text" name="txt_amount10" id="txt_amount10" value="<?php if ($this->_tpl_vars['mr']['desc_10']): ?><?php echo $this->_tpl_vars['mr']['amount_10']; ?>
<?php endif; ?>" style="text-align:right;" ></td>
    </tr>
</table>