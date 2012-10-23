<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<br  clear="all"/>
    <br  clear="all"/>
	<br  clear="all"/>
    
	<table style="width:100%;border:1px solid #ccc;" border="0" cellpadding="5" cellspacing="0" >
    <tr >
    <td style="width:25%; padding-left:10px;background-image: url(./themes/report/bg_header.gif); height:70px;"><img src="{$site.base_url}themes/style3/pics/greatseal.gif"  style="width:100px;" /></td>
    <td align="center" style=" width:50%;background-image: url(./themes/report/bg_header.gif); height:70px;"  ><font size="28">REPORT LIST</font></td>
    <td style="width:25%; padding-top:10px;background-image: url(./themes/report/bg_header.gif); height:70px;" align="right">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">Email contact : {$site.site_email}</td>
    </tr>
    <tr>
      <td align="left">Phone : {$site.site_phone} - Fax : {$site.site_fax}</td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    <br  clear="all"/>
    <br  clear="all"/>
	<br  clear="all"/>
    
    <table cellspacing="0" cellpadding="3" style="width:100%;border:1px solid #ccc;" align="center"   >
<thead>
  <tr align="center" >
    <td style="width:10%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">Lic.No.</td>
    <td style="width:10%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">File No.</td>
    <td style="width:15%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">Date of Inspection</td>
    <td style="width:35%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">Address</td>
    <td style="width:20%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">City</td>
    <td style="width:10%;border:1px solid #ccc;background-image: url(./themes/report/bg_title.gif);height:20px;">Zipcode</td>
    </tr>
</thead>
  {section name=i loop=$mlist}
  <tr >
    <td height="15" align="center" style="width:10%;border:1px dashed #ccc;">{$mlist[i].cus_license}</td>
    <td height="15" align="center" style="width:10%;border:1px dashed #ccc;">{$mlist[i].number}</td>
    <td height="15" align="center" style="width:15%;border:1px dashed #ccc;">{$mlist[i].dateofinspection}</td>
    
        
    <td height="15" align="center" style="width:35%;border:1px dashed #ccc;">{$mlist[i].r5b1}</td>
    <td height="15" align="center" style="width:20%;border:1px dashed #ccc;">{$mlist[i].r5b2}</td>
    <td height="15" align="center" style="width:10%;border:1px dashed #ccc;">{$mlist[i].r5b4}</td>
  </tr>
  {/section}

</table>

</body>
</html>
