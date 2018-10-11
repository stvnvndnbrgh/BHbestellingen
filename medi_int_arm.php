<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('P');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/medi_order form_flat knit_interactive_NL_arm_2015-06_97D21.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(165, 38);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(165, 42);
$pdf->Write(0, 'Naamsesteenweg 180');
$pdf->SetXY(165, 46);
$pdf->Write(0, '3001 Heverlee');
$pdf->SetXY(165, 50);
$pdf->Write(0, '016/88 63 11');
$pdf->SetXY(146.25, 38.6);
$pdf->Write(0, 'x');
$pdf->SetXY(29, 38);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(33, 43.2);
$pdf->Write(0, '10316');
$pdf->SetXY(91, 41.7);
$pdf->SetFont('Arial', '', 6);
$pdf->Write(0, 'Naamsesteenweg 180');
$pdf->SetXY(91, 43.9);
$pdf->Write(0, '3001 Heverlee');
$pdf->SetFillColor(255);
$pdf->Rect(10,20,140,15,'F');
$pdf->Rect(10,20,105,15,'');
$pdf->Line(10,25.5,115,25.5);
$pdf->SetXY(10,23);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Write(0,'Aanmetingsplaats');
$pdf->Rect(11,27,1.8,1.8,'');
$pdf->Rect(11,31.5,1.8,1.8,'');
$pdf->SetFont('Arial', '', 7);
$pdf->SetXY(13,28);
$pdf->Write(0,'Bandagisterie Heverlee');
$pdf->SetXY(13,32.5);
$pdf->Write(0,'Altijd Mooi');
$pdf->Rect(46,27,1.8,1.8,'');
$pdf->Rect(46,31.5,1.8,1.8,'');
$pdf->SetXY(48,28);
$pdf->Write(0,'UZ Leuven');
$pdf->SetXY(48,32.5);
$pdf->Write(0,'UZ Antwerpen');
$pdf->Rect(81,27,1.8,1.8,'');
$pdf->Rect(81,31.5,1.8,1.8,'');
$pdf->SetXY(83,28);
$pdf->Write(0,'UMC Sint-Pieter');
$pdf->SetXY(83,32.5);
$pdf->Write(0,'andere:');
$pdf->Rect(115,20,40,5.5,'');
$pdf->Rect(126,22,1.8,1.8,'');
$pdf->SetXY(128,23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Write(0,'Dringend');
$pdf->Output();
