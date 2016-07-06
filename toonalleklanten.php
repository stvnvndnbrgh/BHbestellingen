<?php
//toonalleklanten.php
session_start();
require_once 'Business/KlantService.php';

if(isset($_GET['action']) && $_GET['action'] == 'klantentonen'){
    $klantenSvc = new KlantService();
    $lijst = $klantenSvc->getKlantOverzicht();
    
    include 'Presentation/Klantenlijst.php';
}