<?php
//toonklant.php
session_start();
require_once 'Business/KlantService.php';
require_once 'Business/AankoopService.php';

if(isset($_GET['action'])){
    $klantenSvc = new KlantService();
    $klant= $klantenSvc->getKlantById($_GET['action']);
    $aankoopSvc = new AankoopService();
    $lijst = $aankoopSvc->AankopenPerKlant($_GET['action']);
    
    include 'Presentation/Klantenkaart.php';
}