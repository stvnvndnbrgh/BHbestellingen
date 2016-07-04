<?php
//plaatsbestelling.php
session_start();
require_once 'Business/BestellingService.php';
require_once 'Vendor/vendor/autoload.php';
require_once 'Business/MailService.php';

if(isset($_GET['action'])){
    $mailSvc = new MailService();
    $mailSvc->sendLeverancierBestelling($_GET['action'], $_SESSION["bericht"]);
    $bestelSvc = new BestellingService();
    $bestelSvc->BestellingPlaatsen($_GET['action']);
    
    
    header('location:toonallebestellingen.php');
    exit(0);
}


