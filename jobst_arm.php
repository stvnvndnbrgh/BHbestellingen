<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('L');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/Bestelbon-Upper-Extremities-CM-2014.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 297);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(1, 82, 154);
$pdf->SetDrawColor(1, 82, 154);
$pdf->SetFillColor(255,255,255);
$pdf->Rect(126,20,101,26,'F');
$pdf->SetXY(20, 16);
$pdf->SetFont('Arial', '', 12);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(20, 23);
$pdf->Write(0, '940184490');

// de Voorschrijver overschrijven met Opmeter
$pdf->Rect(8,26.9,50,5,'F');
$pdf->SetXY(7, 30);
$pdf->SetFont('Arial', '', 10);
$pdf->Write(0, 'Opmeter:');

// man of vrouw boxjes verhuizen
$pdf->Rect(127.63,19.9,3.9,3.8);
$pdf->SetXY(132,22.25);
$pdf->Write(0, 'Man');
$pdf->Rect(193.9,19.9,3.9,3.8);
$pdf->SetXY(198,22.25);
$pdf->Write(0, 'Vrouw');

// Aanmetingsplaats
$pdf->SetXY(126, 30);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write(0, 'Aanmetingsplaats:');
$pdf->SetFont('Arial', '', 10);
$pdf->Rect(127.63,33,3.9,3.8);
$pdf->SetXY(131, 35);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->Rect(172.63,33,3.9,3.8);
$pdf->SetXY(176, 35);
$pdf->Write(0, 'UZ Leuven');
$pdf->Rect(198.63,33,3.9,3.8);
$pdf->SetXY(202, 35);
$pdf->Write(0, 'UZ Pellenberg');
$pdf->Rect(127.63,40,3.9,3.8);
$pdf->SetXY(131, 42);
$pdf->Write(0, 'Altijd Mooi');
$pdf->Rect(151.63,40,3.9,3.8);
$pdf->SetXY(155, 42);
$pdf->Write(0, 'Andere:');

// Versie stempel aanbrengen:
$pdf->SetXY(265, 5);
$pdf->SetFont('Arial', '', 5);
$pdf->Write(0, 'Jobst_Arm_BH_V0.1');

$pdf->Output();


