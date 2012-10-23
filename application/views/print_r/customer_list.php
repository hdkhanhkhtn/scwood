<style >
table {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000;
}
</style>
<?php
	$bsolid = "border:1px solid #ccc;";
	$bdashed = "border:1px dashed #ccc;";

	$bg_center = 'background-image: url(./themes/report/bg_header.gif); height:70px;'; 
?>

<page backtop="35mm" backbottom="20mm">

<page_header>

    <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0" >
    <tr >
    <td style="width:25%; padding-left:10px; <?php echo $bg_center ?>"><img src="<?php echo $this->mr['base_url'] ?>themes/style3/pics/greatseal.gif"  style="width:100px;" /></td>
    <td align="center" style=" width:50%; font-size:28; <?php echo $bg_center ?>"  >CUSTOMER LIST</td>
    <td style="width:25%; padding-top:10px; <?php echo $bg_center ?>" align="right">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">Email contact : <?php echo $this->site['site_email'] ?></td>
    </tr>
    <tr>
      <td align="left">Phone : <?php echo $this->site['site_phone'] ?> - Fax : <?php echo $this->site['site_fax'] ?></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    
    <table border="0" cellspacing="0" cellpadding="0" style="width:100%" >
    <tr>
      <td style="width:50%;" valign="top" >&nbsp;</td>
      <td align="right"  valign="top" style="width:50%; text-align:right " >&nbsp;</td>
    </tr>
    </table>
</page_header>

<page_footer>
<table style="width: 100%;" border="0">
    <tr>
        <td style="text-align: center;	width: 100%">Page [[page_cu]]/[[page_nb]]</td>
    </tr>
</table>
</page_footer>

<?php $bg= 'background-image: url(./themes/report/bg_title.gif);height:20px;' ?>
<?php $style_header = $bg . $bsolid ?>


<table cellspacing="0" cellpadding="3" style="width:100%; ;<?php echo $bsolid ?>" align="center"   >
<thead>
  <tr align="center" >
    <td style="width:10%;<?php  echo $style_header ?>">ID</td>
    <td style="width:35%;<?php  echo $style_header ?>">Company</td>
    <td style="width:30%;<?php  echo $style_header ?>">City</td>
    <td style="width:15%;<?php  echo $style_header ?>">Zipcode</td>
    <td style="width:10%;<?php  echo $style_header ?>">Phone</td>
    </tr>
</thead>
  <?php for($i=0; $i<count($this->mlist); $i++){ ?>
  <tr >
    <td align="center" style="width:10%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['cus_id']?></td>
    <td style="width:35%; padding-left:5px;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['cus_comp_name']?></td>
    <td align="center" style="width:30%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['cus_city']?></td>
    
    <td  align="center" style="width:15%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['cus_zipcode']?></td>
    <td align="center" style="width:10%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['cus_phone']?></td>
  </tr>
  <?php } ?>

</table>
</page>
