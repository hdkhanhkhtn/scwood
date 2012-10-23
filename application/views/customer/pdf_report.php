<?php
$this->pdf->AddPage('P','Letter');
$this->pdf->AddFont('oldengl','','oldengl.php');
$this->pdf->SetMargins(20,20,20);
$this->pdf->SetFillColor(255);
$this->pdf->SetX(12.7);
$this->pdf->Cell(192.3,25.2,"",1.1);


$this->pdf->SetFont('times','BU',8); 
$text = "WOOD-DESTROYING INSECT INSPECTION REPORT";
$this->pdf->SetXY(43,14);
$this->pdf->Justify($text,100,10);
$text = "ADDITIONAL INFORMATION OF THIS PROPERTY MAY BE AVAILABLE FORM OFFICE OF PEST MANAGEMENT, 9535 E. Doubletree Ranch Road, Scottsdale, Arizona 85258-5514, (602) 255-3664 - (602) 255-1281 fax www.bs.state.az.us";
$this->pdf->SetFont('times','B',6);
$this->pdf->SetXY(40,21);
$this->pdf->lMargin=40;
$this->pdf->Justify($text,80,3);
$this->pdf->SetXY(124,10);
$this->pdf->SetFont('Arial','B',7); 
$this->pdf->lMargin=10;
$this->pdf->Cell(41.3,6.2,"1A. VA/HUD/FHA CASE#\n\n",1,2);

$this->pdf->SetXY(124,16.4);
$this->pdf->Cell(41.3,8.6,"1B.        ORIGINAL REPORT\n \n              SUPPLEMENTAL REPORT",1,2);

$this->pdf->SetXY(124,25.1);
$this->pdf->Cell(41.3,10,"1C. PURPOSE OF REPOST\n\n       Sale           Refinancing           Other",1);

$this->pdf->SetXY(165.2,10);
$this->pdf->Cell(40,6.2,"DATE OF INSPECTION\n\n",1,2,'C');

$this->pdf->SetXY(165.2,25.1);
$this->pdf->Cell(40,8.6,"1D. WDIIR #\n\n",1,2);

$this->pdf->SetXY(165.2,16.4);
$this->pdf->Cell(40,10,"1E. TARF #\n\n",1);

$this->pdf->SetXY(10,40);
$this->pdf->SetFont('times','B',8);
$this->pdf->Cell(190,5,"NOTE: Pursuant to: ARS".chr(167)."32-3321 (B)(1)(10), ARS".chr(167)."32-2324 (A) This form must be completed only by an Active License Applicator or Qualifying Party.",1,1);
$this->pdf->Cell(190,43,"",1,1,'L');
$this->pdf->SetY(46);
$text ='READ CAREFULLY PRIOR TO COMPLETING THIS OFFICE OF PEST MANAGEMENT (OPM) FORM';
$text1='The VA or HUD/FHA case number shall be inserted in item 1A by the lender or by the pest control company.';
$text2='Areas that were inaccessible or obstructed (Item 7) may include, but are not limited to, wall coverings,fixed ceilings, floor coverings, funrniture, or stored articles. In Item 7, the Inspector shall list those obstructions or areas which inhibited the  inspection.';
$text3='Item 8A alone is checked when evidence/insects are found but no control measures are performed. Item 8A and 8C are checked when evidence/insects are found AND control measures are performed.';
$text4='When visible evidence is observed, wood-destroying insects causing such evidence shall be listed in item 8A and the visible damage resulting from such infestation shall be noted in Item 8D.';
$text5='When treatment is indicated in Item 8C, the insects treated shall be named and the date of treatment indicated. The application method and chemicals used shall be entered in Item 10. Proper control measures may include issuance of a warranty. Warranty information shall also be entered in Item 10.(Proper control measures are those which are allowed by';
$text6='Visible evidence of conditions conducive to infestaion from wood-destroying insects shall be reported in Items 15-18 on the second page of this from, (e.g., earth-wood contact, faulty grade, insufficient ventilation, etc.).';
$text7 = 'All supplemental reports shall be completed within (30) days of the date of the original report."';
$this->pdf->lMargin = 15;
$this->pdf->SetX(15);
$this->pdf->SetFont('Arial','BU',7); 
$this->pdf->Justify($text,185,3);
$this->pdf->SetFont('Arial','B',7); 
$this->pdf->Justify($text1,185,3);
$this->pdf->Justify($text2,185,3);
$this->pdf->Justify($text3,185,3);
$this->pdf->Justify($text4,185,3);
$this->pdf->Justify($text5,185,3);

$this->pdf->Justify($text6,185,3);
$this->pdf->Justify($text7,185,3);
$this->pdf->lMargin = 10;
$this->pdf->SetXY(10,46);
$this->pdf->Justify('2.',10,3);
$this->pdf->SetXY(12,49);
$this->pdf->Justify('1.',10,3);
$this->pdf->SetXY(12,52);
$this->pdf->Justify('2.',10,3);
$this->pdf->SetXY(12,58);
$this->pdf->Justify('3.',10,3);
$this->pdf->SetXY(12,64);
$this->pdf->Justify('4.',10,3);
$this->pdf->SetXY(12,70);
$this->pdf->Justify('5.',10,3);
$this->pdf->SetXY(12,79);
$this->pdf->Justify('6.',10,3);
$this->pdf->SetXY(12,85);
$this->pdf->Justify('7.',10,3);
$this->pdf->SetXY(86,76.5);
$this->pdf->SetFont('Arial','BI',7);

$this->pdf->Justify('OPM statute/Rule, or the label for the chemical used).',185,2);
$this->pdf->SetY(88);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(95,8,"3A. NAME OF INSPECTION COMPANY\n",1);
$this->pdf->Cell(95,8,"5A. NAME OF PROPERTY OWNER/SELLER\n",1,1);
$this->pdf->Cell(95,8,"3B. ADDRESS OF INSPECTION COMPANY (street, City, Zip)\n",1);
$this->pdf->Cell(95,8,"5B. PROPERTY ADDRESS (Street, City, Zip)\n",1,1);
$this->pdf->Cell(60,8,"3C. TELEPHONE NUMBER (include Area Code)\n",1);
$this->pdf->Cell(35,8,"4. BUSSINESS LICENSE #\n",1);
//6a
$this->pdf->title1 = $this->mr['5a']."/".$this->mr['5b1'].', '.$this->mr['5b2'].', '.$this->mr['5b3'].', '.$this->mr['5b4'];
$this->pdf->title2 = $this->mr['dateofinspection'];
$line = explode('<br />',nl2br($this->mr['6a']));
if (count($line)>1||strlen($this->mr['6a'])>60)
{	
	$tmp['6a'] = $this->mr['6a'];
	if (count($line)>1)
		$this->mr['6a'] = $line[0];
	if (strlen($this->mr['6a'])>30)
		$this->mr['6a'] = substr($this->mr['6a'],0,20);
	$this->mr['6a'] .='...(See more attachment pages)'; 	
}
$this->pdf->Cell(95,8,"6A. INSPECTED STRUCTURES\n",1,1);
//6b
$line = explode('<br />',nl2br($this->mr['6b']));
if (count($line)>1||strlen($this->mr['6b'])>137)
{	
	$tmp['6b'] = $this->mr['6b'];
	if (count($line)>1)
		$this->mr['6b'] = $line[0];
	if (strlen($this->mr['6b'])>70)
		$this->mr['6b'] = substr($this->mr['6b'],0,70);
	$this->mr['6b'] .='...(See more attachment pages)'; 	
}
$this->pdf->Cell(190,8,"6B. LIST ALL UN-INSPECTED STRUCTURES\n",1,1);
$line = explode('<br />',nl2br($this->mr['7']));
if (count($line)>1||strlen($this->mr['7'])>137)
{	
	$tmp['7'] = $this->mr['7'];
	if (count($line)>1)
		$this->mr['7'] = $line[0];
	if (strlen($this->mr['7'])>70)
		$this->mr['7'] = substr($this->mr['7'],0,70);
	$this->mr['7'] .='...(See more attachment pages)'; 	
}
$this->pdf->Cell(190,8,"7.                                                                                                                                                                                                                                                 (see also Item 19, page2.)\n",1,1);
$line = explode('<br />',nl2br($this->mr['8a1']));
if (count($line)>1||strlen($this->mr['8a1'])>50)
{	
	$tmp['8a1'] = $this->mr['8a1'];
	if (count($line)>1)
		$this->mr['8a1'] = $line[0];
	if (strlen($this->mr['8a1'])>50)
		$this->mr['8a1'] = substr($this->mr['8a1'],0,50);
	$this->mr['8a1'] .='...(See more attachment pages)'; 	
}
$line = explode('<br />',nl2br($this->mr['8a2']));
if (count($line)>1||strlen($this->mr['8a2'])>40)
{	
	$tmp['8a2'] = $this->mr['8a2'];
	if (count($line)>1)
		$this->mr['8a2'] = $line[0];
	if (strlen($this->mr['8a2'])>40)
		$this->mr['8a2'] = substr($this->mr['8a2'],0,40);
	$this->mr['8a2'] .='...(See more attachment pages)'; 	
}

$line = explode('<br />',nl2br($this->mr['8e1']));
if (count($line)>1||strlen($this->mr['8e1'])>60)
{	
	$tmp['8e1'] = $this->mr['8e1'];
	if (count($line)>1)
		$this->mr['8e1'] = $line[0];
	if (strlen($this->mr['8e1'])>20)
		$this->mr['8e1'] = substr($this->mr['8e1'],0,20);
	$this->mr['8e1'] .='...(See more attachment pages)'; 	
}

$this->pdf->Cell(190,40,"8.                                                                                                                                                                                                                            (see Section(11) before completing):\n\n        A. Visible evidence of wood-destroying insects was observed.\n            Describe evidence observed: \n\n            Type of Wood-Destroying Insects obeserved: \n\n        B. No visible evidence of infestation from wood-destroying insects was observed.\n\n        C. Visible evidence of infestation as noted in 8A. Proper control measures were performed on (date): \n\n        D. Visible damage due to                                                             was observed in the following areas: \n\n\n        E. Visible evidence of previous treatment was observed. list evidencd. (see also Item 20, page2.): ",1,1);
$this->pdf->Cell(80,24,"9. \n\n        A. Will be or has been corrected by this company.\n\n        B. Will not be corrected by this company.\n\n        C. It is recommended that noted damage be evaluted by a \n            licensed structural contractor for any neccessary repairs\n            to be made.",1);
		
$this->pdf->Cell(110,24,"10.                                                        (Also see page 2.)\n\n\n\n\n\n\n\n",1,1);
$this->pdf->Cell(190,32,"11. \n\nA.         The inspection covered the readily accessible areas of the above listed structures, including attics and crawl spaces which permitted entry.\n\nB.         Special attention was given to those areas which experience has shown to be particularly susceptible to attack by wood-destroying insects.\n\nC.         Non-destructive probing and/or sounding of those areas and other visible accessible wood members showing evidence of infestation was performed.\n\nD.         The inspection did not include areas which were obstructed or inaccessible at the time of inspection.\n\nE.         Neither I, nor the company for which I am acting, have had, presently have, or contemplate having any interest in this property. I do further state that\n             neither I, nor the company for which I am acting, is associated in any way with any party to this transaction.",1,1); 
$this->pdf->Cell(110,10,"12A. \n\n",1);
$this->pdf->Cell(50,10,"12B. INSPECTOR'S LICENSE NUMBER\n\n",1);
$this->pdf->Cell(30,10,"12C. DATE\n\n",1,1);
	 
$this->pdf->SetFont('Arial','BU',7); 
$this->pdf->Cell(190,5,'STATEMENT OF PURCHASER','LRT',1,'C');
$this->pdf->SetFont('times','B',6);
$this->pdf->Cell(190,10,"I HAVE RECEIVED THE ORIGINAL, OR A LEGIBLE COPY, OF THIS FORM AND HAVE READ PAGE (1,2,3) OF THIS FORM.\nI UNDERSTAND THAT THIS IS NOT A STRUCTURAL DAMAGE, FUNGI/MOLD REPORT, OR A WARRANTY AS TO THE ABSENCE OF WOOD-DESTROYING INSECTS AND I\nCAN CONSIDER ASSESSMENT BY A LICENSED STRUCTURAL CONTRACTOR OR FUNGI/MOLD INSPECTOR FOR ANY STRUCTURAL DAMAGE OR FUNGI/MOLD\nCONCERN",'LRB',1,'C');
$this->pdf->Cell(160,8,"13. SIGNATURE OF PURCHASER\n\n",1);
$this->pdf->Cell(30,8,"14. DATE\n\n",1);
$this->pdf->AliasNbPages();
//insert data
$this->pdf->SetXY(120,15);
$this->pdf->RoundedRect(127, 21.2, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(127, 26, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(123, 36, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(134, 36, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(153.8, 36, 2, 2, 0, 'DF');
$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['1b1'])
	$this->pdf->Text(127.3,23,"C");
if ($this->mr['1b2'])
	$this->pdf->Text(127.3,28,"C");
if ($this->mr['1c1'])
	$this->pdf->Text(123.3,38,"C");
if ($this->mr['1c2'])
	$this->pdf->Text(134.3,38,"C");
if ($this->mr['1c3'])
	$this->pdf->Text(154.1,38,"C");
//1 
$this->pdf->SetFont('Arial','B',9);
$this->pdf->SetXY(120,15);
$this->pdf->Justify($this->mr['1a'],184,3);
//
//$this->pdf->Image($this->site['theme_url'].'greatseal.gif',11,11,24,24);
	
//2
$this->pdf->SetXY(174,15);
$this->pdf->Justify($this->mr['dateofinspection'],184,3);	
//1d
$this->pdf->SetXY(165,25);
$this->pdf->Justify($this->mr['1d'],184,3);	
//1e
$this->pdf->SetXY(165,35);
$this->pdf->Justify($this->mr['1e'],184,3);	
//3a

	$this->pdf->SetXY(10,92);
	$this->pdf->Justify($this->tmp_cus['cus_comp_name'],184,3);	
//3b
	$this->pdf->SetXY(10,100);
	$this->pdf->Justify($this->tmp_cus['cus_address'].', '.$this->tmp_cus['cus_city'].', '.$this->tmp_cus['cus_state'].', '.$this->tmp_cus['cus_zipcode'],200,3);
//3c
$this->pdf->SetXY(10,108);
$this->pdf->Justify($this->tmp_cus['cus_phone'],184,3);
//4
$this->pdf->SetXY(70,108);
$this->pdf->Justify($this->tmp_cus['cus_license'],184,3);
//5a
$this->pdf->SetXY(105,92);
$this->pdf->Justify($this->mr['5a'],184,3);
//5b
$this->pdf->SetXY(105,100);
$this->pdf->Justify($this->mr['5b1'].', '.$this->mr['5b2'].', '.$this->mr['5b3'].', '.$this->mr['5b4'],184,3);
//6a
$this->pdf->SetXY(105,108);
$this->pdf->Justify($this->mr['6a'],184,3);
//6b
$this->pdf->SetXY(10,116);
$this->pdf->Justify($this->mr['6b'],184,3);
//7
$this->pdf->SetXY(10,124);
$this->pdf->Justify($this->mr['7'],184,3);
$this->pdf->SetXY(14,121);
$this->pdf->SetFont('times','BU',7); 
$this->pdf->Justify('THIS INSPECTION DOES NOT INCLUDE THE FOLLOWING LISTED AREAS WHICH ARE OBSTRUCTED OR INACCESSIBLE.',184,3);
$this->pdf->SetFont('Arial','B',7); 

//8
$this->pdf->RoundedRect(13, 134.1, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 146.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 151.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 156.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 163.7, 2, 2, 0, 'DF');
$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['8a'])
	$this->pdf->Text(13.3,135.9,"C");
if ($this->mr['8b'])
	$this->pdf->Text(13.3,148.3,"C");
if ($this->mr['8c'])
	$this->pdf->Text(13.3,153.3,"C");
if ($this->mr['8d'])
	$this->pdf->Text(13.3,158.2,"C");
if ($this->mr['8e'])
	$this->pdf->Text(13.3,165.6,"C");
$this->pdf->SetFont('Arial','B',9);
//8a1
$this->pdf->SetXY(47,136.3);
$this->pdf->Justify($this->mr['8a1'],184,3);
//8a2
$this->pdf->SetXY(65,141.1);
$this->pdf->Justify($this->mr['8a2'],184,3);
//8c1
$this->pdf->SetXY(121,151);
$this->pdf->Justify($this->mr['8c1'],184,3);
//8d1
$this->pdf->SetXY(43,155.8);
$this->pdf->Justify($this->mr['8d1'],184,3);
//8d2
$line = explode('<br />',nl2br($this->mr['8d2']));
if (count($line)>1||strlen($this->mr['8d2'])>100)
{	
	$tmp['8d2'] = $this->mr['8d2'];
	$text = $line[0];
	if (strlen($text)>50)
		$text = substr($text,0,50);
	$text .='...(See more attachment pages)'; 	
}
$this->pdf->SetXY(18.5,159.5);
$this->pdf->Justify($text,184,3);
//8e1
$this->pdf->SetXY(116,163.5);
$this->pdf->Justify($this->mr['8e1'],184,3);

$this->pdf->SetFont('times','BU',8);
$this->pdf->SetXY(14,129);
$this->pdf->Justify('BASED ON THE INSPECTOR\'S VISUAL INSPECTION OF THE READILY ACCESSIBLE AREAS OF THE PROPERTY',184,3);
//9
$this->pdf->SetXY(14,168.3);
$this->pdf->Justify('DAMAGE OBSERVED, IF ANY',184,3);
$this->pdf->SetXY(95,168.3);
$this->pdf->Justify('ADDITIONAL COMMENTS',184,3);
$this->pdf->SetXY(15,192.6);
$this->pdf->Justify('STATEMENT OF INSPECTOR',184,3);

$this->pdf->SetXY(17,224.7);
$this->pdf->Justify('SIGNATURE OF INSPECTOR',184,3);

$this->pdf->RoundedRect(13, 173.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 178.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(13, 183.3, 2, 2, 0, 'DF');
$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['9a'])
	$this->pdf->Text(13.3,175.5,"C");
if ($this->mr['9b'])
	$this->pdf->Text(13.3,180.3,"C");
if ($this->mr['9c'])
	$this->pdf->Text(13.3,185.3,"C");
$this->pdf->SetFont('Arial','B',9);
//10
$line = explode('<br />',nl2br($this->mr['101']));
$l=0;
$text = '';
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/75);
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	if ($l<=5)
		$text .= $line[$i];
	else
	{
		$text = substr($text,0,strlen($text));
		break;
	}
}
if ($l>4)
{
	$tmp['101'] = $this->mr['101'];
	$text = substr($text,0,strlen($text)-75).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
	
//12 inspector
if ($this->mr['inspector_id'])
{	
	$tmp_inspector = $this->inspector_model->get($this->mr['inspector_id']);
	
	$this->pdf->Text(121,231,$tmp_inspector['license']);
//	if ($tmp_inspector['image'])
//		$this->pdf->image($this->site['base_url'].'uploads/inspector/'.$tmp_inspector['image'],60,225,28,8);
		
	$this->pdf->Text(171,231,format_intdate('m/d/Y',time()));
	
}
$this->pdf->SetXY(90,171.3);
$this->pdf->lMargin=90;
$this->pdf->Justify($text,110,3);
$this->pdf->lMargin=10;
//$this->pdf->Justify("dateofinspection",35,2);.
$this->pdf->SetFont('oldengl','',20);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);
$this->pdf->SetXY(40,10);
$this->pdf->Justify('Office of Pest Management',110,8);

//page 2
$this->pdf->AddPage('P','Letter');
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(160,5,"PROPERTY NAME/ADDRESS",'LT');
$this->pdf->Cell(30,5,"DATE OF INSPECTION",'LRT',1,'C');
$this->pdf->SetFont('Arial','B',7);
$this->pdf->Cell(160,5,$this->mr['5a']."/".$this->mr['5b1'].", ".$this->mr['5b2'].", ".$this->mr['5b3'].", ".$this->mr['5b4'],'LB');
$this->pdf->Cell(30,5,$this->mr['dateofinspection'],'LBR',1,'C');

$this->pdf->Cell(30,5,"",0,1);
$this->pdf->SetFont('times','BU',7);
$this->pdf->Cell(70,10,"AT THE TIME OF THE INSPECTION THE PROPERTY WAS:",'LTB');
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(120,10,"                    Vacant                        Occupied                        Unfurnished                         Furnished",'RTB',1);
$this->pdf->SetFont('times','BU',7); 
$this->pdf->Cell(190,5,"CONDITIONS CONDUCIVE TO INFESTATION",'LRT',1,'C');
$this->pdf->SetFont('times','B',7); 
$this->pdf->Cell(70,8,"15. ",'L');
$this->pdf->Cell(30,8,"YES             NO");
$this->pdf->SetFont('times','IU',7);
$this->pdf->Cell(90,8,"(If yes, check mark and explain conditions conducive)",'R',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(60,10,"        Fence Abutting Structure\n\n        Concrete Form Boards\n\n        Porch Post",'L');
$this->pdf->Cell(30,10,"        Pier Post\n\n        Porch Stairs\n\n        Trellis");
//$this->pdf->Cell(100,10,"        Plantings/Planters Contacting Structure\n\n        Other ".$this->mr['159']."\n\n        ",'R',1);
$this->pdf->Cell(100,10,"        Plantings/Planters Contacting Structure\n\n        \n\n        ",'R',1);
$this->pdf->Cell(190,18,"Comments : \n\n\n\n",'LRB',1);
$this->pdf->SetFont('times','B',7); 
$this->pdf->Cell(70,8,"16. ",'L');
$this->pdf->Cell(30,8,"YES             NO");
$this->pdf->SetFont('times','IU',7);
$this->pdf->Cell(90,8,"(If yes, check mark and explain conditions conducive)",'R',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(190,18,"Comments : \n\n\n\n",'LRB',1);
$this->pdf->Cell(70,8,"17. ",'L');
$this->pdf->Cell(30,8,"YES             NO");
$this->pdf->SetFont('times','IU',7);
$this->pdf->Cell(90,8,"(If yes, check mark and explain conditions conducive)",'R',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(80,10,"        Slope; surface water tends to drain toward house\n\n        Floor level at or below grade\n\n        Wood siding below grade",'L');
$this->pdf->Cell(110,10,"        Stucco at or below grade\n\n        Joists in crawl space less than 18 above grade\n\n        ",'R',1);
$this->pdf->Cell(190,18,"Comments : \n\n\n\n",'LRB',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(70,8,"18. ",'L');
$this->pdf->Cell(30,8,"YES             NO");
$this->pdf->SetFont('times','IU',7);
$this->pdf->Cell(90,8,"(If yes, check mark and explain conditions conducive)",'R',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(40,10,"        Standing water\n\n        Sprinklers Hitting Structure\n\n        Crawl Space/Water Leaking",'L');
$this->pdf->Cell(50,10,"        Water Damage\n\n        Water Stain\n\n        Improper Condensate Drainage");
$this->pdf->Cell(40,10,"        Bath/Shower/Toilet Leaking\n\n        Plimbing Leaks\n\n        Attic/Roof Leak");
$this->pdf->Cell(60,10,"        Inadequate Ventilation\n\n        \n\n        ",'R',1);
$this->pdf->Cell(190,18,"Comments : \n\n\n\n",'LRB',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(70,8,"19. ",'L');
$this->pdf->Cell(30,8,"YES             NO");
$this->pdf->SetFont('times','IU',7);
$this->pdf->Cell(90,8,"(If yes, check mark and explain conditions conducive)",'R',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(50,14,"        Attic - All\n\n        Attic - joists\n\n        Attic - Partial\n\n        Plumbing Traps",'L');
$this->pdf->Cell(50,14,"        Floors\n\n        Wall Interios\n\n        Enclosed Stairwell\n\n        Dropped Ceilings");
$this->pdf->Cell(90,14,"        Sub/Crawl Space Area - Clearance\n\n        Sub Area/Crawl Space No Access\n\n        Areas Obstructed By Furniture Or Stored Articles\n\n        ",'R',1);

$this->pdf->Cell(190,18,"Comments : \n\n\n\n",'LRB',1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(190,26,"20. \n\n\n\n\n\n\n\nAccount Number:                     Date of Initial Treatment:                           Target Pest:                         \nWarranty Expiration Date:                               Other:",'LRB',1);
$this->pdf->Cell(190,30,"Pest    Control    Inspector's    Additional    Comments:\n\n\n\n\n\n\n\n\n\n",'LRB',1);
$text = "BY ANOTHER COMPANY: While evidence of previous treatment does exist, it is impossible for the inspecting company to ascertain if such treatment was properly performed. Further investigation is left to the Buyer's discretion to determine if such treatment was done properly and if valid guarantee exists against the target pest of such treatment.\n";
$this->pdf->SetXY(20,220);
$this->pdf->lMargin=20;
$this->pdf->Justify($text,175,2);
$text ="BY THE INSPECTING COMPANY: Previous treatment is recorded for this property. At the buyer's discretion, the treatment records may be viewed at the inspecting company's local office.";
$this->pdf->Justify($text,175,2);
$this->pdf->lMargin=10;
//
$this->pdf->RoundedRect(89.5, 28.8, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(114, 28.8, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(141.5, 28.8, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(173.2, 28.8, 2, 2, 0, 'DF');
//15
$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,42.5);
$this->pdf->Justify('WOOD TO EARTH CONTACT (EC)',184,3);

$this->pdf->RoundedRect(77, 42.7, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(91, 42.7, 2, 2, 0, 'DF');

$this->pdf->RoundedRect(12, 46.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 51.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 56.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(72, 46.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(72, 51.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(72, 56.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(102, 46.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(102, 51.5, 2, 2, 0, 'DF');

$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['15']) //no
	$this->pdf->Text(91.3,44.6,"C");
else
	$this->pdf->Text(77.3,44.6,"C");
	
if ($this->mr['151'])
	$this->pdf->Text(12.3,48.2,"C");
if ($this->mr['152'])
	$this->pdf->Text(12.3,53.2,"C");
if ($this->mr['153'])
	$this->pdf->Text(12.3,58.1,"C");
if ($this->mr['154'])
	$this->pdf->Text(72.3,48.2,"C");
if ($this->mr['155'])
	$this->pdf->Text(72.3,53.2,"C");
if ($this->mr['156'])
	$this->pdf->Text(72.3,58.1,"C");
if ($this->mr['157'])
	$this->pdf->Text(102.3,48.2,"C");
if ($this->mr['158'])
	$this->pdf->Text(102.3,53.2,"C");
$this->pdf->SetFont('Arial','B',7);

$this->pdf->SetXY(105.3,51.4);
$this->pdf->SetMargins(105.3);
if ($this->mr['159'])
{
	
	
	$this->pdf->Justify('Other '.$this->mr['159'],90,3);
}
else{
	$this->pdf->Justify('Other ',90,3);
}

$this->pdf->SetFont('Arial','BI',7);

$line = explode('<br />',nl2br($this->mr['1510']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>4)
	{
		$len =  strlen($text) - ($l - 4)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>4)
{
	$tmp['1510'] = $this->mr['1510'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,64);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;


//16

$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,78.5);
$this->pdf->Justify('EXCESSIVE CELLULOSE DEBRIS(CD)',184,3);

$this->pdf->RoundedRect(77, 78.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(91, 78.5, 2, 2, 0, 'DF');

$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['16']) //no
	$this->pdf->Text(91.3,80.4,"C");
else
	$this->pdf->Text(77.3,80.4,"C");
$this->pdf->SetFont('Arial','BI',7);

$line = explode('<br />',nl2br($this->mr['161']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>4)
	{
		$len =  strlen($text) - ($l - 4)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>4)
{
	$tmp['161'] = $this->mr['161'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,90);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;

//17

$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,104.5);
$this->pdf->Justify('FAULTY GRADES (FG)',184,3);

$this->pdf->RoundedRect(77, 104.7, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(91, 104.7, 2, 2, 0, 'DF');

$this->pdf->RoundedRect(12, 108.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 113.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 118.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(92, 108.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(92, 113.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(92, 118.3, 2, 2, 0, 'DF');
$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['17']) //no
	$this->pdf->Text(91.3,106.6,"C");
else
	$this->pdf->Text(77.3,106.6,"C");
	
if ($this->mr['171'])
	$this->pdf->Text(12.3,110.5,"C");
if ($this->mr['172'])
	$this->pdf->Text(12.3,115.3,"C");
if ($this->mr['173'])
	$this->pdf->Text(12.3,120.2,"C");
if ($this->mr['174'])
	$this->pdf->Text(92.3,110.5,"C");
if ($this->mr['175'])
	$this->pdf->Text(92.3,115.3,"C");
if ($this->mr['176'])
	$this->pdf->Text(92.3,120.2,"C");

$this->pdf->SetFont('Arial','B',7);
$this->pdf->SetXY(95.3,118.2);
$this->pdf->SetMargins(95.3);
if ($this->mr['177'])
{
	$this->pdf->Justify('Other '.$this->mr['177'],100,3);
}
else{
	$this->pdf->Justify('Other ',100,3);
}

$this->pdf->SetFont('Arial','BI',7);

$line = explode('<br />',nl2br($this->mr['178']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>4)
	{
		$len =  strlen($text) - ($l - 4)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>4)
{
	$tmp['178'] = $this->mr['178'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,126);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;

//18
$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,140.4);
$this->pdf->Justify('EXCESSIVE MOISTURE (EM)',184,3);

$this->pdf->RoundedRect(77, 140.7, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(91, 140.7, 2, 2, 0, 'DF');

$this->pdf->RoundedRect(12, 144.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 149.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 154.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(52, 144.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(52, 149.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(52, 154.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(103, 144.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(103, 149.3, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(103, 154.4, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(143, 144.5, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(143, 149.3, 2, 2, 0, 'DF');

$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['18']) //no
	$this->pdf->Text(91.3,142.6,"C");
else
	$this->pdf->Text(77.3,142.6,"C");
	
if ($this->mr['181'])
	$this->pdf->Text(12.3,146.4,"C");
if ($this->mr['182'])
	$this->pdf->Text(12.3,151.2,"C");
if ($this->mr['183'])
	$this->pdf->Text(12.3,156.3,"C");
if ($this->mr['184'])
	$this->pdf->Text(52.3,146.4,"C");
if ($this->mr['185'])
	$this->pdf->Text(52.3,151.2,"C");
if ($this->mr['186'])
	$this->pdf->Text(52.3,156.3,"C");
if ($this->mr['187'])
	$this->pdf->Text(103.3,146.4,"C");
if ($this->mr['188'])
	$this->pdf->Text(103.3,151.2,"C");
if ($this->mr['189'])
	$this->pdf->Text(103.3,156.3,"C");
if ($this->mr['1810'])
	$this->pdf->Text(143.3,146.4,"C");
if ($this->mr['1811'])
	$this->pdf->Text(143.3,151.2,"C");
	
$this->pdf->SetFont('Arial','B',7);
$this->pdf->SetXY(145.6,149.2);
$this->pdf->SetMargins(145.6);
if ($this->mr['1812'])
{
	$this->pdf->Justify('Other '.$this->mr['1812'],50,3);
}
else{
	$this->pdf->Justify('Other ',50,3);
}

$this->pdf->SetFont('Arial','BI',7);
$line = explode('<br />',nl2br($this->mr['1813']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>4)
	{
		$len =  strlen($text) - ($l - 4)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>4)
{
	$tmp['1813'] = $this->mr['1813'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,162);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;

//19
$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,176.4);
$this->pdf->Justify('INACCESSIBLE AREAS',184,3);

$this->pdf->RoundedRect(77, 176.8, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(91, 176.8, 2, 2, 0, 'DF');

$this->pdf->RoundedRect(12, 180, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 185, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 189.9, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(12, 194.7, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(62, 180, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(62, 185, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(62, 189.9, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(62, 194.7, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(112, 180, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(112, 185, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(112, 189.9, 2, 2, 0, 'DF');
$this->pdf->RoundedRect(112, 194.7, 2, 2, 0, 'DF');

$this->pdf->SetFont('Symbol','B',7);
if ($this->mr['19']) //no
	$this->pdf->Text(91.3,178.7,"C");
else
	$this->pdf->Text(77.3,178.7,"C");
	
if ($this->mr['191'])
	$this->pdf->Text(12.3,181.9,"C");
if ($this->mr['192'])
	$this->pdf->Text(12.3,186.9,"C");
if ($this->mr['193'])
	$this->pdf->Text(12.3,191.8,"C");
if ($this->mr['194'])
	$this->pdf->Text(12.3,196.7,"C");
if ($this->mr['195'])
	$this->pdf->Text(62.3,181.9,"C");
if ($this->mr['196'])
	$this->pdf->Text(62.3,186.9,"C");
if ($this->mr['197'])
	$this->pdf->Text(62.3,191.8,"C");
if ($this->mr['198'])
	$this->pdf->Text(62.3,196.7,"C");
if ($this->mr['199'])
	$this->pdf->Text(112.3,181.9,"C");
if ($this->mr['1910'])
	$this->pdf->Text(112.3,186.9,"C");
if ($this->mr['1911'])
	$this->pdf->Text(112.3,191.8,"C");
if ($this->mr['1912'])
	$this->pdf->Text(112.3,196.7,"C");

$this->pdf->SetFont('Arial','B',7);
$this->pdf->SetXY(115.3,194.7);
$this->pdf->SetMargins(115.3);
if ($this->mr['1913'])
{
	$this->pdf->Justify('Other '.$this->mr['1913'],80,3);
}
else{
	$this->pdf->Justify('Other ',80,3);
}
$this->pdf->SetMargins(10,10);
$this->pdf->SetFont('Arial','BI',7);
$line = explode('<br />',nl2br($this->mr['1914']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>4)
	{
		$len =  strlen($text) - ($l - 4)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>4)
{
	$tmp['1914'] = $this->mr['1914'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,202);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;
//20
$this->pdf->SetFont('times','BU',7);
$this->pdf->SetXY(15,214);
$this->pdf->Justify('EVIDENCE OF PREVIOUS TREATMENT',184,3);

$this->pdf->RoundedRect(12, 220, 3,3, 0, 'DF');
$this->pdf->RoundedRect(12, 228.3, 3, 3, 0, 'DF');

$this->pdf->SetFont('Symbol','B',9);
if ($this->mr['201']) //no
	$this->pdf->Text(12.6,222.8,"C");
if ($this->mr['202']) //no
	$this->pdf->Text(12.6,231.1,"C");
	
$this->pdf->SetFont('Arial','BI',7);
if ($this->mr['203']) //no
	$this->pdf->Text(31,236.2,$this->mr['203']);
if ($this->mr['204']) //no
	$this->pdf->Text(71,236.2,$this->mr['204']);
if ($this->mr['205']) //no
	$this->pdf->Text(101,236.2,$this->mr['205']);
if ($this->mr['206']) //no
	$this->pdf->Text(41,238.5,$this->mr['206']);
if ($this->mr['207']) //no
	$this->pdf->Text(67,238.5,$this->mr['207']);
$line = explode('<br />',nl2br($this->mr['208']));
$l=0;
$text = '';
//echo strlen('nsdoivndsovnosdvn dois nviodsnv doisn voisdnv iosd nvoisnvoa lijn e1 dfa soifnasdip fopdsngodisn giodsan goidasnv isdu vnodsian viosadn voisd');
for ($i=0;$i<count($line);$i++)
{
	$s = (int)(strlen($line[$i])/140);
	
	if ($s == 0)
		$l+=1;
	else
		$l+= $s+1;
	$text .= $line[$i];
	if ($l>9)
	{
		$len =  strlen($text) - ($l - 9)*140;
		$text = substr($text,0,$len);
		break;
	}
}
if ($l>9)
{
	$tmp['208'] = $this->mr['208'];
	$text = substr($text,0,strlen($text)-172).'...(See more attachment pages)';	
}		
else
	$text = substr($text,0,strlen($text));
$this->pdf->SetXY(10,244.5);
$this->pdf->lMargin=10;
$this->pdf->Justify($text,188,3);
$this->pdf->lMargin=10;

//
$this->pdf->AddPage('P','Letter');
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(160,5,"PROPERTY NAME/ADDRESS",'LT');
$this->pdf->Cell(30,5,"DATE OF INSPECTION",'LRT',1,'C');
$this->pdf->SetFont('Arial','B',7);
$this->pdf->Cell(160,5,$this->mr['5a']."/".$this->mr['5b1'].", ".$this->mr['5b2'].", ".$this->mr['5b3'].", ".$this->mr['5b4'],'LB');
$this->pdf->Cell(30,5,$this->mr['dateofinspection'],'LBR',1,'C');


$this->pdf->Cell(30,5,"",0,1);
$this->pdf->SetFont('times','BU',20);
$this->pdf->Cell(190,5,"GRAPH OF STRUCTURE(S)",0,1,'C');
$this->pdf->SetFont('times','BI',7);
$this->pdf->Cell(190,10,"(Note: Graph not to Scale)",0,1,'C');
$this->pdf->lMargin=20;

if ($this->mr['image'])
{
	$this->pdf->SetX(1);
	$size = getimagesize($this->site['base_url'].'uploads/report/'.$this->mr['image']);
	$old_w = $size[0];
	$old_h = $size[1];
	
	// tinh ti le
	$ratio1 = 0; 
	if($old_w > 100){
		$ratio1 = $old_w/100;
	}	
	//tinh theo width
	if($ratio1){
		$thumb_w = $old_w/$ratio1;
		$thumb_h = $old_h/$ratio1;
		
	}else{
	
		$thumb_h = $old_h;
		$thumb_w = $old_w;
	}

//	$this->pdf->Image($this->site['base_url'].'uploads/report/'.$this->mr['image'],22,42,$thumb_w,$thumb_h);
}
else{
	$this->pdf->SetX(20);
	for($i=1;$i<=40;$i++)
	{
		for ($j=1;$j<=34;$j++)
			{
				if ($j!=34)
					$this->pdf->Cell(5,5,"",1);
				else
					if($i==1)
						$this->pdf->Cell(5,5,"",1,1);
					else	
						$this->pdf->Cell(5,5,"",1,1);
			}			
	}
}
$this->pdf->lMargin=10;
$this->pdf->SetY(240);
$this->pdf->Cell(10,5,"",0,1);
$this->pdf->SetFont('times','B',7);
$this->pdf->Cell(190,3,"PURSUANT TO: R4-29307 (E)(1) THROUGH (5)&(a) THROUGH (p) THE INSPECTOR MUST COMPLETE THE GRAPH ON PAGE (3) FOR ANY NOTE",'LRT',1,'C');
$this->pdf->Cell(190,3,"ITEMS WHICH ARE CHECK (  ) MARKED BELOW",'LRB',1,'C');
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(10,3,"CODE",1,0,'C');
$this->pdf->Cell(30,3,"SEE GRAPH PAGE(3)",1,0,'C');
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(10,3,"CODE",1,0,'C');
$this->pdf->Cell(40,3,"SEE GRAPH PAGE(3)",1,0,'C');
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(10,3,"CODE",1,0,'C');
$this->pdf->Cell(30,3,"SEE GRAPH PAGE(3)",1,0,'C');
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(10,3,"CODE",1,0,'C');
$this->pdf->Cell(30,3,"SEE GRAPH PAGE(3)",1,1,'C');

$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"SU     Subterranean Termites",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(50,3,"OW    Other Wood Destroying Insects(*)",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"OB     Obstructions",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"WD     Water Damage",1,1);

$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"DR     Drywood Termites",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(50,3,"FG     Faulty Grade",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"IA       Inaccessible Areas",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"WS     Water Stains",1,1);

$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"DA     Dampwood Termites",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(50,3,"WE     Wood To Earth Contact",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"IV       Inadequate Ventilation",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"RL      Roof Leaks",1,1);

$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"BE     Wood Destroying Beetles",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(50,3,"CE     Cellulose Drebris",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"PL      Plumbing Leaks",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"EM      Excessive Moisture",1,1);

$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"CA     Carpenter Ants",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(50,3,"PA     Plantings Abutting Structure",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"SP     Sprinkler Hitting Structure",1);
$this->pdf->Cell(5,3,"  ",1);
$this->pdf->Cell(40,3,"FI        Further Inspection Needed",1,1);

$this->pdf->Cell(190,3,"(*) Other Wood Destroying Insects",1);
//insert data
//$this->pdf->SetXY(10,10);
//$this->pdf->Cell(190,200,"",2);

$this->pdf->SetFont('Symbol','B',7);
$this->pdf->Text(11.7,253.6,"C");
$this->pdf->Text(56.7,253.6,"C");
$this->pdf->Text(111.7,253.6,"C");
$this->pdf->Text(156.7,253.6,"C");
if ($this->mr[211])
	$this->pdf->Text(11.7,256.6,"C");
if ($this->mr[212])
	$this->pdf->Text(11.7,259.6,"C");
if ($this->mr[213])
	$this->pdf->Text(11.7,262.6,"C");
if ($this->mr[214])
	$this->pdf->Text(11.7,265.6,"C");
if ($this->mr[215])
	$this->pdf->Text(11.7,268.6,"C");
if ($this->mr[216])
	$this->pdf->Text(56.7,256.6,"C");
if ($this->mr[217])
	$this->pdf->Text(56.7,259.6,"C");
if ($this->mr[218])
	$this->pdf->Text(56.7,262.6,"C");
if ($this->mr[219])
	$this->pdf->Text(56.7,265.6,"C");
if ($this->mr[2110])
	$this->pdf->Text(56.7,268.6,"C");
if ($this->mr[2111])
	$this->pdf->Text(111.7,256.6,"C");
if ($this->mr[2112])
	$this->pdf->Text(111.7,259.6,"C");
if ($this->mr[2113])
	$this->pdf->Text(111.7,262.6,"C");
if ($this->mr[2114])
	$this->pdf->Text(111.7,265.6,"C");
if ($this->mr[2115])
	$this->pdf->Text(111.7,268.6,"C");
if ($this->mr[2116])
	$this->pdf->Text(156.7,256.6,"C");
if ($this->mr[2117])
	$this->pdf->Text(156.7,259.6,"C");
if ($this->mr[2118])
	$this->pdf->Text(156.7,262.6,"C");
if ($this->mr[2119])
	$this->pdf->Text(156.7,265.6,"C");
if ($this->mr[2120])
	$this->pdf->Text(156.7,268.6,"C");

$this->pdf->SetFont('Arial','B',7);
if (!$this->mr['image'])
{
	$this->pdf->SetXY(20,40);
	$this->pdf->Cell(170,200,'','2',1);
}
if (isset($tmp['6a'])||isset($tmp['6b'])||isset($tmp['7'])||isset($tmp['8a1'])||isset($tmp['8a2'])||isset($tmp['8d2'])||isset($tmp['8e1'])||isset($tmp['101'])||isset($tmp['1510'])||isset($tmp['161'])||isset($tmp['178'])||isset($tmp['1813'])||isset($tmp['1914'])||isset($tmp['208']))
{
	
	$this->pdf->AddPage('P','Letter');
	
	
	$this->pdf->SetFont('times','BU',20);
	$this->pdf->Cell(190,5,"ADDITIONAL NOTES",0,1,'C');
	$this->pdf->Cell(160,3,'','',1);
	$this->pdf->lMargin = 20;
	$this->pdf->SetX(20);
	$this->pdf->SetFont('Arial','B',6);
	if ($tmp['6a'])
	{	
		$this->pdf->Cell(160,3,'6A.','',1);
		$this->pdf->Justify($tmp['6a'],170,3);
	}
	if ($tmp['6a'])
	{	$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'6B.','',1);
		$this->pdf->Justify($tmp['6b'],170,3);
	}
	if ($tmp['7'])
	{	$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'7.','',1);
		$this->pdf->Justify($tmp['7'],170,3);
	}
	if ($tmp['8a1'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'8A  Describe evidence observed','',1);
		$this->pdf->Justify($tmp['8a1'],170,3);
	}
	if ($tmp['8a2'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'8A - Type of Wood-Destroying Insects observed','',1);
		$this->pdf->Justify($tmp['8a2'],170,3);
	}
	//if ($this->mr['8d2'])
	//	$this->pdf->Justify('8D. '.$tmp['8d2'],188,3);
	if ($tmp['8e1'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'8E.','',1);
		$this->pdf->Justify($tmp['8e1'],170,3);
	}
	if ($tmp['101'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'10. ','',1);
		$this->pdf->Justify($tmp['101'],170,3);
	}
	if ($tmp['1510'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'15. ','',1);
		$this->pdf->Justify($tmp['1510'],170,3);
	}
	if ($tmp['161'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'16. ','',1);
		$this->pdf->Justify($tmp['161'],170,3);
	}
	if ($tmp['178'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'17. ','',1);
		$this->pdf->Justify($tmp['178'],170,3);
	}
	if ($tmp['1813'])
	{$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'18. ','',1);
		$this->pdf->Justify($tmp['1813'],170,3);
	}
	if ($tmp['1914'])
	{	$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'19. ','',1);
		$this->pdf->Justify($tmp['1914'],170,3);
	}
	if ($tmp['208'])
	{
		$this->pdf->Cell(160,3,'','',1);
		$this->pdf->Cell(160,3,'20. ','',1);
		$this->pdf->Justify($tmp['208'],170,3);
	}
}

$text ='(Number of additional attachments to this report.) '.(count($this->pdf->pages)-3).' Page(s)';
$this->pdf->page = 1;
$this->pdf->SetFont('times','B',8);
$this->pdf->SetXY(90,188);
$this->pdf->Justify($text,120,4);
$this->pdf->page = count($this->pdf->pages);
//

?>