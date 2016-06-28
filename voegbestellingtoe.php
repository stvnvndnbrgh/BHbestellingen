<?php
//voegbestellingtoe.php
require_once 'Business/StatusService.php';
require_once 'Business/BestellingService.php';
require_once 'Business/KlantService.php';
require_once 'Business/ArtikelService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuwebestelling"){
    $bestelSvc = new BestellingService();
    $bestelSvc->voegBestellingToe($_POST['selKlant'], $_POST['selArtikel'], $_POST['txtAantal'], $_POST['selStatus']);
    header("location: toonallebestellingen.php");
    exit(0);
}else{
    $statusSvc = new StatusService();
    $statusLijst = $statusSvc->getStatusOverzicht();
    $klantSvc = new KlantService();
    $klantLijst = $klantSvc->getKlantOverzicht();
    $artikelSvc = new ArtikelService();
    $artikelLijst = $artikelSvc->getArtikelOverzicht();
    include("Presentation/nieuweBestellingForm.php");
}