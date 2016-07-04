<?php
//bewerkbestelling.php
require_once 'Business/StatusService.php';
require_once 'Business/BestellingService.php';

if(isset($_GET['action']) && $_GET['action'] == "bewerkbestelling") {
    $bestelSvc = new BestellingService();
    $bestelSvc->updateBestelling($_GET['id'], $_POST['selStatus'], $_POST['txtAantal']);
    header("location: toonallebestellingen.php");
    exit(0);
}else{
    $statusSvc = new StatusService();
    $statusLijst = $statusSvc->getStatusOverzicht();
    $bestelSvc = new BestellingService();
    $bestelling = $bestelSvc->haalBestellingOp($_GET['id']);
    include("Presentation/updateBestelling.php");
}