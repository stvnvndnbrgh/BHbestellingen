<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('P');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/CircAid_Prijslijst 2016.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(131.5, 33);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(131.5, 36);
$pdf->Write(0, 'Naamsesteenweg 180, 3001 Heverlee');
$pdf->SetXY(131.5, 40);
$pdf->Write(0, '016/88 63 11');




$pdf->Output();


