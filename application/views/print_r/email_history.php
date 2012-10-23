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
    <td align="center" style=" width:50%; font-size:20; <?php echo $bg_center ?>"  >MAIL HISTORY<br><?php echo 'VA/HUD/FHA CASE '.$this->mr['r1a'] ?>
	</td>
    <td style="width:25%; padding-top:10px; <?php echo $bg_center ?>" align="right">
    
    <?php if($this->tmp_cus){ ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Company name : <?php echo $this->tmp_cus['cus_comp_name'] ?>&nbsp;</td>
    </tr>
    <tr>
      <td>Address : <?php echo $this->tmp_cus['cus_address'] ?></td>
    </tr>
    <tr>
      <td>City : <?php echo $this->tmp_cus['cus_city'] ?></td>
    </tr>
    <tr>
      <td>State - Zipcode : <?php echo $this->tmp_cus['cus_state'].' - '.$this->tmp_cus['cus_zipcode']  ?></td>
    </tr>
    <tr>
      <td>Phone : <?php echo $this->site['site_phone'] ?> - Fax : <?php echo $this->site['site_fax'] ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    <?php }else{?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">Email contact : <?php echo $this->site['site_email'] ?></td>
    </tr>
    <tr>
      <td align="left">Phone : <?php echo $this->site['site_phone'] ?> - Fax : <?php echo $this->site['site_fax'] ?></td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    <?php } ?>
    
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
    <td style="width:50%;<?php  echo $style_header ?>">Email address</td>
    <td style="width:50%;<?php  echo $style_header ?>">Date time send mail</td>
    </tr>
</thead>
  <?php for($i=0; $i<count($this->mlist); $i++){ ?>
  <tr >
    <td height="15" align="center" style="width:50%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['email'] ?></td>
    <td height="15" align="center" style="width:50%;<?php echo $bdashed ?>"><?php echo $this->mlist[$i]['date']?></td>
  </tr>
  <?php } ?>

</table>
</page>
