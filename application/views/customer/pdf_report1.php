<?php
//var_dump($this->mr); die();
$this->fpdi->AddPage('P','letter');
$this->fpdi->setSourceFile('data_3.pdf');
$tplIdx = $this->fpdi->importPage(1);
$this->fpdi->useTemplate($tplIdx);


//1a
$this->fpdi->SetFont('Arial','B',9);
$this->fpdi->SetXY(124,15);
$this->fpdi->Write(0,$this->mr['sc_date']);
//1b

$text =(count($this->fpdi->pages)-3);
$this->fpdi->page = 1;
$this->fpdi->SetFont('Arial','B',9);
$this->fpdi->SetXY(155,192.5);
$this->fpdi->Justify($text,120,4);
$this->fpdi->page = count($this->fpdi->pages);


$this->fpdi->Output(); 
?>