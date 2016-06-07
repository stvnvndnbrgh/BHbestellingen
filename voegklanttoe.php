<?php
//voegklanttoe.php
session_start();
require_once 'Business/KlantService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuweklant"){
    try{
        $_SESSION['txtVoornaam'] = $_POST['txtVoornaam'];
        $_SESSION['txtFamilienaam'] = $_POST['txtFamilienaam'];
        $_SESSION['txtAdres'] = $_POST['txtAdres'];
        $_SESSION['txtGemeente'] = $_POST['txtGemeente'];
        $_SESSION['txtTelefoon'] = $_POST['txtTelefoon'];
        $_SESSION['txtEmail'] = $_POST['txtEmail'];
        $klantSvc = new KlantService();
        $klantSvc->voegKlantToe($_POST['txtVoornaam'], $_POST['txtFamilienaam'], $_POST['txtAdres'], $_POST['txtGemeente'], $_POST['txtTelefoon'], $_POST['txtEmail']);
        header("location: voegbestellingtoe.php");
        exit(0);
    } catch (NoPostcodeException $ex) {
        header("location: voegklanttoe.php?error=gemeentebestaatniet");
    }   
}else{
    if(isset($_GET['error']) && $_GET['error'] == "gemeentebestaatniet"){
        $error = $_GET['error'];
        include("Presentation/nieuweKlantForm.php");
        exit(0);
    }
    include("Presentation/nieuweKlantForm.php");
}