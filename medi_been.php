<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('P');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/15-06-09_medi_97D22_Massbl_Bein_NL_Reader.pdf');
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
$pdf->SetXY(140.6, 38.6);
$pdf->Write(0, 'x');
$pdf->SetXY(27, 38.4);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(31, 43.8);
$pdf->Write(0, '10316');
$pdf->SetXY(91, 41.7);
$pdf->SetFont('Arial', '', 6);
$pdf->Write(0, 'Naamsesteenweg 180');
$pdf->SetXY(91, 43.9);
$pdf->Write(0, '3001 Heverlee');
$pdf->Output();


