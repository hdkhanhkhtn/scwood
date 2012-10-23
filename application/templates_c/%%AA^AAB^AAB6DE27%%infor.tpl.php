<?php /* Smarty version 2.6.18, created on 2012-10-22 11:04:31
         compiled from invoice/infor.tpl */ ?>
<table width="100%" cellspacing="1" cellpadding="10" style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
	<tr>
    	
    	<td width="100"><?php if ($this->_tpl_vars['mr']['cus_logo']): ?><img src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
uploads/inspector/<?php echo $this->_tpl_vars['mr']['cus_logo']; ?>
" width="100" /><?php endif; ?>  </td>
        <td align="center">
   	    <strong>INVOICE  / STATEMENT</strong><br>
			<?php echo $this->_tpl_vars['mr']['cus_comp_name']; ?>
<br>
			<?php echo $this->_tpl_vars['mr']['cus_address']; ?>
.<br>
			<?php echo $this->_tpl_vars['mr']['cus_city']; ?>
, <?php echo $this->_tpl_vars['mr']['cus_state']; ?>
 <?php echo $this->_tpl_vars['mr']['cus_zipcode']; ?>
<br>
            Tel : <?php echo $this->_tpl_vars['mr']['cus_phone']; ?>
 - Fax : <?php echo $this->_tpl_vars['mr']['cus_fax']; ?>

        </td>
        <td valign="top" align="left">
        	<table style="font-family:Tahoma, Geneva, sans-serif;font-size:12px">
            	<tr>
                	<td>DATE : <input type="text" name="txt_date" id="txt_date" size="10" value="<?php echo $this->_tpl_vars['mr']['date']; ?>
" readonly /></td>
                    <td><a  onclick="if(self.gfPop)gfPop.fPopCalendar(document.frm.txt_date);return false;" ><img align="absmiddle" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/calbtn.gif" border="0" /></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Report #  : <?php echo $this->_tpl_vars['mr']['report']; ?>
</td>
                </tr>
                <tr>
                  <td colspan="2">Invoice # : <input name="txt_invoicename" type="text" id="txt_invoicename"  value="<?php echo $this->_tpl_vars['mr']['invoice_name']; ?>
" size="10" /></td>
                </tr>
                <tr>
                    <td colspan="2">CASE # : <?php if ($this->_tpl_vars['mr']['escrow']): ?><?php echo $this->_tpl_vars['mr']['escrow']; ?>
<?php else: ?><?php echo $this->_tpl_vars['mr']['r1a']; ?>
<?php endif; ?></td>
                </tr>
            </table>
		</td>
    </tr>
</table>
<iframe width=174 height=189 name="gToday:normal:normal.js" id="gToday:normal:normal.js" src="<?php echo $this->_tpl_vars['site']['base_url']; ?>
/application/libraries/js/calendar/ipopeng.htm" scrolling="no" frameborder="0" 
style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>