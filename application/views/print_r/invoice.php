<style >
table {
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
}
</style>
<?php
	$bsolid = "border:1px solid #ccc;";
	$bdashed = "border:1px dashed #ccc;";
	
	$tbl_bill_h = 90;
	if($this->mr['inspected_cname']) $tbl_bill_h -= 15;
	
?>

<page backtop="1cm" backbottom="1mm">

<table style="width: 100%;border:2px solid #000;">
  <tr>
    <td><table style="width: 100%;" border="0" cellpadding="5" cellspacing="0"  >
      <tr >
        <td  style="width:15%;padding-left:10px;"><?php if($this->mr['cus_logo']){ ?>
          <img src="<?php echo $this->site['base_url'].'uploads/inspector/'.$this->mr['cus_logo'] ?>"  style="width:100px;" />
          <?php }?></td>
        <td align="center" style="width:50%;padding-top:10px;"  valign="top" ><strong style="font-size:20px;">INVOICE  / STATEMENT </strong><br />
          <strong><?php echo !empty($this->mr['cus_comp_name'])?$this->mr['cus_comp_name']:$this->mr['cus_name'] ?></strong><br />
          <?php echo $this->mr['cus_address'] ?><br />
          <?php echo $this->mr['cus_city'] ?>, <?php echo $this->mr['cus_state'] ?> <?php echo $this->mr['cus_zipcode'] ?><br />
Tel : <?php echo $this->mr['cus_phone'] ?> - Fax : <?php echo $this->mr['cus_fax'] ?></td>
        <td style="width:35%;" align="right" valign="top"><table style="width:100%;">
          <tr>
            <td align="left"><strong>DATE : </strong><?php echo $this->mr['date'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Report #  :</strong> <?php echo $this->mr['report'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Invoice # :</strong> <?php echo $this->mr['invoice_name'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Case # :</strong> <?php echo $this->mr['escrow'] ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table border="0" cellspacing="0" cellpadding="0" style="width:100%" >
        <tr>
          <td style="width:50%;padding-right:2px;" valign="top" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td rowspan="2"  align="center" valign="middle" style="width:20%;color:#000;border:1px solid #000;"><strong>Property Inspected: </strong></td>
              <td align="center" valign="middle"  style="width:80%;border-top:1px solid #000;border-right:1px solid #000;height:15px;"><?php echo $this->mr['inspected_name'] ?><?php if($this->mr['inspected_cname']){ echo '<br>'.$this->mr['inspected_cname']; } ?></td>
            </tr>
            <tr>
              <td align="center"  valign="middle" style="width:80%;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:40px;"><?php echo $this->mr['inspected_address'] ?><br />
                <?php echo $this->mr['inspected_city'] ?>, <?php echo $this->mr['inspected_state'] ?> <?php echo $this->mr['inspected_zipcode'] ?></td>
            </tr>
          </table>
            <br /></td>
          <td rowspan="2" valign="top" style="width:50%;padding-left:2px;" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td align="center" valign="middle"  style="width:70%;color:#000;border:1px solid #000;height:15px;"><strong>Descriptions</strong></td>
              <td align="center" valign="middle"  style="width:30%;color:#000;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:15px;"><strong>Amount($)</strong></td>
            </tr>
            <?php for($i=0;$i<10;$i++){ ?>
            <?php if($i<9){ ?>
            <tr>
              <td style="width:70%;border-bottom:1px dashed #000;border-right:1px solid #000;border-left:1px solid #000;"><?php if(isset($this->mlist[$i]['desc'])){ ?>
                <?php echo $this->mlist[$i]['desc'] ?>
                <?php }else{?>
                &nbsp;
                <?php }?></td>
              <td style="width:30%;border-bottom:1px dashed #000;border-right:1px solid #000;" align="right"><?php echo $this->mlist[$i]['amount'] ?></td>
            </tr>
            <?php }else{ ?>
            <tr>
              <td style="width:70%;border-bottom:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;"><?php if(isset($this->mlist[$i]['desc'])){ ?>
                <?php echo $this->mlist[$i]['desc'] ?>
                <?php }else{?>
                &nbsp;
                <?php }?></td>
              <td style="width:30%;border-bottom:1px solid #000;border-right:1px solid #000;" align="right"><?php echo $this->mlist[$i]['amount'] ?></td>
            </tr>
            <?php }?>
            <?php }?>
            <tr>
              <td align="center" style="font-weight:bold;width:70%;border-bottom:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;">Total Due</td>
              <td style="font-weight:bold;width:30%;border-bottom:1px solid #000;border-right:1px solid #000;" align="right"><?php echo $this->mr['total'] ?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td style="width:50%;padding-right:2px;" valign="bottom" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td rowspan="2"  align="center" style="width:20%;color:#000;border:1px solid #000;" valign="middle"><strong>Bill to:</strong></td>
              <td align="center" valign="middle" style="width:80%;border-top:1px solid #000;border-right:1px solid #000;height:15px;"><?php echo $this->mr['bill_name'] ?>
              <?php if($this->mr['bill_cname']){ echo '<br>'.$this->mr['bill_cname']; } ?>
              </td>
            </tr>
            <tr>
              <td align="center" valign="middle" style="width:80%;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:<?php echo $tbl_bill_h.'px';?>;"><?php echo $this->mr['bill_address'] ?><br />
                <?php echo $this->mr['bill_city'] ?>, <?php echo $this->mr['bill_state'] ?> <?php echo $this->mr['bill_zipcode'] ?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" valign="top" style="width:50%;padding-top:4px;" ><table style="width:100%;border:1px solid #000;" border="0" cellspacing="2" cellpadding="3" >
            <tr>
              <td align="left"  style="width:100%;color:#000;"><strong>Description of service</strong></td>
            </tr>
            <tr >
              <td style="width:100%;height:70;"><?php echo nl2br($this->mr['description']) ?></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="3" style="width:100%;" align="center"   >
<tr>
	<td align="center" style="width:100%;padding-top:10px;">Retain  this copy for your reference</td>
  </tr>
    
<tr>
	<td align="center" style="width:100%;font-size:14px;"><strong>THANK YOU FOR YOUR BUSINESS</strong></td>
  </tr>
</table>

<table style="width: 100%;">
    <tr>
        <td colspan="3" style="height:5px; "></td>
    </tr>
	<tr>
    	<td align="left" style="width:30%;font-size:9px;color:#666;">Cut here</td>
    	<td align="center" style="width:40%;font-size:9px;color:#666;">Cut here</td>
        <td align="right" style="width:30%;font-size:9px;color:#666;">Cut here</td>
    </tr>
	<tr>
    	<td colspan="3" style="border-top:0.5px dashed #666;width:100%; height:5px; ">&nbsp;</td>
    </tr>
</table>
<br />
<table style="width: 100%;border:2px solid #000;">
  <tr>
    <td><table style="width: 100%;" border="0" cellpadding="5" cellspacing="0"  >
      <tr >
        <td  style="width:15%;padding-left:10px;"><?php if($this->mr['cus_logo']){ ?>
          <img src="<?php echo $this->site['base_url'].'uploads/inspector/'.$this->mr['cus_logo'] ?>"  style="width:100px;" />
          <?php }?></td>
        <td align="center" style="width:50%;padding-top:10px;"  valign="top" ><strong style="font-size:20px;">INVOICE  / STATEMENT </strong><br />
          <strong><?php echo !empty($this->mr['cus_comp_name'])?$this->mr['cus_comp_name']:$this->mr['cus_name'] ?></strong><br />
          <?php echo $this->mr['cus_address'] ?><br />
          <?php echo $this->mr['cus_city'] ?>, <?php echo $this->mr['cus_state'] ?> <?php echo $this->mr['cus_zipcode'] ?><br />
          Tel : <?php echo $this->mr['cus_phone'] ?> - Fax : <?php echo $this->mr['cus_fax'] ?></td>
        <td style="width:35%;" align="right" valign="top"><table style="width:100%;">
          <tr>
            <td align="left"><strong>DATE : </strong><?php echo $this->mr['date'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Report #  :</strong> <?php echo $this->mr['report'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Invoice # :</strong> <?php echo $this->mr['invoice_name'] ?></td>
          </tr>
          <tr>
            <td align="left"><strong>Case # :</strong> <?php echo $this->mr['escrow'] ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table border="0" cellspacing="0" cellpadding="0" style="width:100%" >
        <tr>
          <td style="width:50%;padding-right:2px;" valign="top" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td rowspan="2"  align="center" valign="middle" style="width:20%;color:#000;border:1px solid #000;"><strong>Property Inspected: </strong></td>
              <td align="center" valign="middle"  style="width:80%;border-top:1px solid #000;border-right:1px solid #000;height:15px;"><?php echo $this->mr['inspected_name'] ?>
                <?php if($this->mr['inspected_cname']){ echo '<br>'.$this->mr['inspected_cname']; } ?></td>
            </tr>
            <tr>
              <td align="center"  valign="middle" style="width:80%;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:40px;"><?php echo $this->mr['inspected_address'] ?><br />
                <?php echo $this->mr['inspected_city'] ?>, <?php echo $this->mr['inspected_state'] ?> <?php echo $this->mr['inspected_zipcode'] ?></td>
            </tr>
          </table>
            <br /></td>
          <td rowspan="2" valign="top" style="width:50%;padding-left:2px;" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td align="center" valign="middle"  style="width:70%;color:#000;border:1px solid #000;height:15px;"><strong>Descriptions</strong></td>
              <td align="center" valign="middle"  style="width:30%;color:#000;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:15px;"><strong>Amount($)</strong></td>
            </tr>
            <?php for($i=0;$i<10;$i++){ ?>
            <?php if($i<9){ ?>
            <tr>
              <td style="width:70%;border-bottom:1px dashed #000;border-right:1px solid #000;border-left:1px solid #000;"><?php if(isset($this->mlist[$i]['desc'])){ ?>
                <?php echo $this->mlist[$i]['desc'] ?>
                <?php }else{?>
                &nbsp;
                <?php }?></td>
              <td style="width:30%;border-bottom:1px dashed #000;border-right:1px solid #000;" align="right"><?php echo $this->mlist[$i]['amount'] ?></td>
            </tr>
            <?php }else{ ?>
            <tr>
              <td style="width:70%;border-bottom:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;"><?php if(isset($this->mlist[$i]['desc'])){ ?>
                <?php echo $this->mlist[$i]['desc'] ?>
                <?php }else{?>
                &nbsp;
                <?php }?></td>
              <td style="width:30%;border-bottom:1px solid #000;border-right:1px solid #000;" align="right"><?php echo $this->mlist[$i]['amount'] ?></td>
            </tr>
            <?php }?>
            <?php }?>
            <tr>
              <td align="center" style="font-weight:bold;width:70%;border-bottom:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;">Total Due</td>
              <td style="font-weight:bold;width:30%;border-bottom:1px solid #000;border-right:1px solid #000;" align="right"><?php echo $this->mr['total'] ?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td style="width:50%;padding-right:2px;" valign="bottom" ><table style="width:100%;" border="0" cellspacing="0" cellpadding="3" >
            <tr>
              <td rowspan="2"  align="center" style="width:20%;color:#000;border:1px solid #000;" valign="middle"><strong>Bill to:</strong></td>
              <td align="center" valign="middle" style="width:80%;border-top:1px solid #000;border-right:1px solid #000;height:15px;"><?php echo $this->mr['bill_name'] ?>
                <?php if($this->mr['bill_cname']){ echo '<br>'.$this->mr['bill_cname']; } ?></td>
            </tr>
            <tr>
              <td align="center" valign="middle" style="width:80%;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;height:<?php echo $tbl_bill_h.'px';?>;"><?php echo $this->mr['bill_address'] ?><br />
                <?php echo $this->mr['bill_city'] ?>, <?php echo $this->mr['bill_state'] ?> <?php echo $this->mr['bill_zipcode'] ?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2" valign="top" style="width:50%;padding-top:4px;" ><table style="width:100%;border:1px solid #000;" border="0" cellspacing="2" cellpadding="3" >
            <tr>
              <td align="left"  style="width:100%;color:#000;"><strong>Description of service</strong></td>
            </tr>
            <tr >
              <td style="width:100%;height:70;"><?php echo nl2br($this->mr['description']) ?></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="3" style="width:100%;" align="center"   >
<tr>
	<td align="center" style="width:100%;padding-top:10px;">Return this copy with Remittance</td>
  </tr>
    
<tr>
	<td align="center" style="width:100%;font-size:14px;"><strong>THANK YOU FOR YOUR BUSINESS</strong></td>
  </tr>
</table>
</page>