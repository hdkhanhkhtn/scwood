<?php /* Smarty version 2.6.18, created on 2012-10-21 21:29:28
         compiled from print_r/index_m.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title ><?php echo $this->_tpl_vars['site']['site_title']; ?>
  <?php echo $this->_tpl_vars['mr']['title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['site']['charset']; ?>
" />

<link href="<?php echo $this->_tpl_vars['site']['theme_url']; ?>
client.css" rel="stylesheet" type="text/css" />
</head>
<body >
<div align="center" style="background:#FFF">
<span  style="text-align:center ;color:#000;font-size:36px;background:#FFF;">EMAIL HISTORY</span><br />
<span style="text-align:center;color:#06F;font-size:30px;background:#FFF"><?php echo $this->_tpl_vars['mr']['r1a']; ?>
</span>
<table id="myTable" cellspacing="1" width="500" class="dataTable" >
	<thead>
    	<tr>
    	  <td align="right" colspan="2"><input type="button" class="button_2" value="Print" onclick="javascript:OpenSubWin('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/mprint/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
','550','500','1');" />
          <input type="button" class="button_2" value="Close" onclick="javascript:window.close();" /></td></tr>
		<tr>
			<th>Email address</th>
			<th>Date send email</th>
		</tr>
	</thead>
	<tbody >
    	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['lst_mail']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr>
                <td><?php echo $this->_tpl_vars['lst_mail'][$this->_sections['i']['index']]['email']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lst_mail'][$this->_sections['i']['index']]['date']; ?>
</td>
            </tr>
		<?php endfor; endif; ?>
    </tbody>

    <tfoot>
		<tr>
        	<td colspan="2" align="right"><input type="button" class="button_2" value="Print" onclick="javascript:OpenSubWin('<?php echo $this->_tpl_vars['site']['base_url']; ?>
print_history/mprint/id/<?php echo $this->_tpl_vars['mr']['id']; ?>
','550','500','1');" />
            <input type="button" class="button_2" value="Close" onclick="javascript:window.close();" />
            
        </tr>
	</tfoot>
</table>
</div>
</body>
</html>
<?php echo '
<script type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'themes/js/jquery/jquery-1.2.6.js"></script>
<script type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['site']['base_url']; ?>
<?php echo 'themes/js/jquery/ui/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() { 
        $("#myTable").tablesorter();
	}); 
	
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? \'yes\' : \'no\';
	
	  var paramz = \'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars=\'+sbt+\',width=\'+w+\',height=\'+h+\'\';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
</script>
'; ?>