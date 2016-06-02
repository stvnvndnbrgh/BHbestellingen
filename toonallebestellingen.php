<?php
//toonallebestellingen.php
require_once 'Business/BestellingService.php';

$bestelSvc = new BestellingService();
$lijst = $bestelSvc->getBestellingOverzicht();
include 'Presentation/Bestellijst.php';