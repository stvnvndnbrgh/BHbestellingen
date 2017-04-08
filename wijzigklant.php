<?php
//wijzigklant.php
session_start();
require_once 'Business/KlantService.php';
require_once 'Business/GemeenteService.php';

if(isset($_GET['action']) && $_GET['action'] == "wijzigklant"){
    $klantSvc = new KlantService();
    $klantSvc->updateKlant($id, $voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email);
}