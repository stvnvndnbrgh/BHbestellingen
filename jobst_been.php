<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('L');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/Bestelbon-Lower-Extremities-2014.pdf');
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
//$pdf->Rect(126,20,101,26);
$pdf->SetXY(16.5, 12.9);
$pdf->SetFont('Arial', '', 12);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(16.5, 20);
$pdf->Write(0, '940184490');

// de Voorschrijver overschrijven met Opmeter
$pdf->Rect(6,23.9,50,5,'F');
$pdf->SetXY(5.5, 27);
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
$pdf->Rect(124,18,101,26,'F');
// man of vrouw boxjes verhuizen
$pdf->Rect(125.63,17.9,3.9,3.8);
$pdf->SetXY(130,20.25);
$pdf->Write(0, 'Man');
$pdf->Rect(191.9,17.9,3.9,3.8);
$pdf->SetXY(196,20.25);
$pdf->Write(0, 'Vrouw');
$pdf->SetXY(124, 28);
//
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write(0, 'Aanmetingsplaats:');
$pdf->SetFont('Arial', '', 10);
$pdf->Rect(125.63,31,3.9,3.8);
$pdf->SetXY(129, 33);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->Rect(170.63,31,3.9,3.8);
$pdf->SetXY(174, 33);
$pdf->Write(0, 'UZ Leuven');
$pdf->Rect(196.63,31,3.9,3.8);
$pdf->SetXY(200, 33);
$pdf->Write(0, 'UZ Pellenberg');
$pdf->Rect(125.63,38,3.9,3.8);
$pdf->SetXY(129, 40);
$pdf->Write(0, 'Altijd Mooi');
$pdf->Rect(149.63,38,3.9,3.8);
$pdf->SetXY(153, 40);
$pdf->Write(0, 'Andere:');

// Versie stempel aanbrengen:
$pdf->SetXY(265, 5);
$pdf->SetFont('Arial', '', 5);
$pdf->Write(0, 'Jobst_Been_BH_V0.1');

$pdf->Output();


