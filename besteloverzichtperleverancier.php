<?php
//besteloverzichtperleverancier.php
session_start();
require_once 'Business/BestellingService.php';

if(isset($_GET['action'])){
    $bestelSvc = new BestellingService();
    $lijst = $bestelSvc->getBestellingLijstLeverancier($_GET['action']);
    
    include 'Presentation/LeverancierBestelling.php';

}
