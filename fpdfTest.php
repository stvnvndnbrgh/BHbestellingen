<?php
require_once 'Vendor/vendor/autoload.php';

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('img/Bijlage13_Blanco.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 210);

// now write some text above the imported page
// de naam van de patient zetten
$pdf->SetFont('Times', '', 7);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(63, 34.6);
$pdf->Write(0, 'Steven Van den Berghe');
$pdf->SetXY(63, 59.6);
$pdf->Write(0, 'Steven Van den Berghe');
// ziekenfonds zetten
$pdf->SetXY(63, 37.6);
$pdf->Write(0, 'Christelijk ziekenfonds - Sint-Pietersbond (108)');
// rijksregisternummer zetten
$pdf->SetXY(63, 40.6);
$pdf->Write(0, '750902-215-05');
// adres van de patient
$pdf->SetXY(63, 43.6);
$pdf->Write(0, 'Lijstersstraat 31');
$pdf->SetXY(63, 46.6);
$pdf->Write(0, '3052 Blanden');
// geboortedatum van de patient
$pdf->SetXY(63, 62.6);
$pdf->Write(0, '02/09/1975');

// Verstrekking invullen
$pdf->SetXY(23.2, 89.6);
$pdf->Multicell(18,3,'1 paar orthopedische zolen naar maat', 0, 'L');


// Als het voorschrift is toegevoegd
$pdf->SetXY(89.7, 147.1);
$pdf->Write(0, 'X');

// Als er geen derde betalers regeling is
// $pdf->Line(25,193.4,140,193.4);
$pdf->Line(25,196.4,58,196.4);
$pdf->Line(25,199.4,47,199.4);
$pdf->SetXY(63, 197.9);
$pdf->SetFont('Times', '', 12);
$pdf->Write(0, 'Geen derdebetalersregeling');
$pdf->SetFont('Times', '', 7);

// Naam van de voorschrijver invullen
$pdf->SetXY(50, 150.2);
$pdf->Write(0, 'Dr. S.Thomis');
// Datum van het voorschrift invullen
$pdf->SetXY(41, 156.3);
$pdf->Write(0, '15/10/2016');
// Riziv-nummer van de voorschrijver
$pdf->SetXY(83, 162.5);
$pdf->Write(0, '1-002-1125563-23');

// Naam van de zorgverlener invullen
$pdf->SetXY(69, 174.9);
$pdf->Write(0, 'Sleurs Elke');
// Inschrijvingsnummer RIZIV van de zorgverlener invullen
$pdf->SetXY(59, 177.9);
$pdf->Write(0, '000-00000-00');
// Naam van de onderneming invullen
$pdf->SetXY(59, 180.9);
$pdf->Write(0, 'Bandagisterie Heverlee');
// Straat en huisnummer invullen
$pdf->SetXY(59, 183.9);
$pdf->Write(0, 'Lijstersstraat 31');
// Gemeente en postcode invullen
$pdf->SetXY(59, 186.9);
$pdf->Write(0, '3052 Blanden');
// KBO nummer invullen
$pdf->SetXY(59, 189.9);
$pdf->Write(0, '0536.370.606');

$pdf->Output();


