<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/Riziv_steunzolen_blanco.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Helvetica', '', 7);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(63, 34.6);
$pdf->Write(0, 'Steven Van den Berghe');
$pdf->SetXY(63, 59.6);
$pdf->Write(0, 'Steven Van den Berghe');
// ziekenfonds zetten
$pdf->SetXY(40, 37.6);
$pdf->Write(0, 'Christelijk ziekenfonds - Sint-Pietersbond (108)');
// rijksregisternummer zetten
$pdf->SetXY(33, 40.6);
$pdf->Write(0, '750902-215-05');


$pdf->Output();
?>


