<?php
//plaatsbestelling.php
session_start();
require_once 'Business/BestellingService.php';

if(isset($_GET['action'])){
    $bestelSvc = new BestellingService();
    $bestelSvc->BestellingPlaatsen($_GET['action']);
    header('location:toonallebestellingen.php');
    exit(0);
}


