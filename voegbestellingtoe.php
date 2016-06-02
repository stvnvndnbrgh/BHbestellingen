<?php
//voegbestellingtoe.php
require_once 'Business/StatusService.php';
require_once 'Business/BestellingService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuwebestelling"){
    $bestelSvc = new BestellingService();
    $bestelSvc->voegBestellingToe($_POST['txtKlant'], $_POST['txtArtikel'], $_POST['selStatus']);
    header("location: toonallebestellingen.php");
    exit(0);
}else{
    $statusSvc = new StatusService();
    $statusLijst = $statusSvc->getStatusOverzicht();
    include("Presentation/nieuweBestellingForm.php");
}