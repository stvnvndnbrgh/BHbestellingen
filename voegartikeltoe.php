<?php
//voegartikeltoe.php
require_once 'Business/ArtikelService.php';
require_once 'Business/LeverancierService.php';
require_once 'Business/ArtikelgroepService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuwartikel"){
    $artikelSvc = new ArtikelService();
    $artikelSvc->voegArtikelToe($_POST['txtArtikel'], $_POST['selArtikelgroep'], $_POST['txtBarcode'], $_POST['selLeverancier']);
    header("location: voegbestellingtoe.php");
    exit(0);
}else{
    $LevSvc = new LeverancierService();
    $ArtikelgroepSvc = new ArtikelgroepService();
    $artikelGroepLijst = $ArtikelgroepSvc->getArtikelgroepOverzicht();
    $leverancierslijst = $LevSvc->getLeveranciersOverzicht();
    include("Presentation/nieuwArtikelForm.php");
}
