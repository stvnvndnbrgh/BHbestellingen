<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI('L');
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/BestelbonFoot-Cap-CM_2014.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 297);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Arial', '', 15);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(19, 14.75);
$pdf->Write(0, 'Bandagisterie Heverlee');
$pdf->SetXY(19, 21.75);
$pdf->Write(0, '940184490');


$pdf->Output();


