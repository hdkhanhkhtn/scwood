<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title >{$site.site_title}  {$mr.title}</title>
<meta http-equiv="Content-Type" content="text/html; charset={$site.charset}" />

<link href="{$site.theme_url}client.css" rel="stylesheet" type="text/css" />
</head>
<body >
<div align="center" style="background:#FFF">
<span  style="text-align:center ;color:#000;font-size:36px;background:#FFF;">EMAIL HISTORY</span><br />
<span style="text-align:center;color:#06F;font-size:30px;background:#FFF">{$mr.r1a}</span>
<table id="myTable" cellspacing="1" width="500" class="dataTable" >
	<thead>
    	<tr>
    	  <td align="right" colspan="2"><input type="button" class="button_2" value="Print" onclick="javascript:OpenSubWin('{$site.base_url}print_history/mprint/id/{$mr.id}','550','500','1');" />
          <input type="button" class="button_2" value="Close" onclick="javascript:window.close();" /></td></tr>
		<tr>
			<th>Email address</th>
			<th>Date send email</th>
		</tr>
	</thead>
	<tbody >
    	{section name=i loop=$lst_mail}
            <tr>
                <td>{$lst_mail[i].email}</td>
                <td>{$lst_mail[i].date}</td>
            </tr>
		{/section}
    </tbody>

    <tfoot>
		<tr>
        	<td colspan="2" align="right"><input type="button" class="button_2" value="Print" onclick="javascript:OpenSubWin('{$site.base_url}print_history/mprint/id/{$mr.id}','550','500','1');" />
            <input type="button" class="button_2" value="Close" onclick="javascript:window.close();" />
            
        </tr>
	</tfoot>
</table>
</div>
</body>
</html>
{literal}
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}themes/js/jquery/jquery-1.2.6.js"></script>
<script type="text/javascript" src="{/literal}{$site.base_url}{literal}themes/js/jquery/ui/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() { 
        $("#myTable").tablesorter();
	}); 
	
	function OpenSubWin( page, w, h, sb )
	{  var sw = screen.width, sh = screen.height;
	  var ulx = ((sw-w)/2), uly = ((sh-h)/2);
	  var sbt = (sb==1) ? 'yes' : 'no';
	
	  var paramz = 'toolbar=no,location=no,directories=no,status=no,menubar=no,resizable=no,scrollbars='+sbt+',width='+w+',height='+h+'';
	  var oSubWin = window.open( "", "SubWin", paramz );
	
	  oSubWin.moveTo( ulx, uly );
	  oSubWin.location.replace( page );
	}
</script>
{/literal}