<?php
//verwijderbestelling.php
require_once 'Business/BestellingService.php';

$bestelSvc = new BestellingService();
$bestelSvc->verwijderBestelling($_GET['id']);
header("location: toonallebestellingen.php");
exit(0);
