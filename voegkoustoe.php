<?php
session_start();
//voegkoustoe.php
require_once 'Business/KousService.php';
require_once 'Business/LeverancierService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuwekous"){
    if($_POST['newMerk'] <> ""){$_POST['merk'] = $_POST['newMerk'];}
    if($_POST['newKwaliteit'] <> ""){$_POST['kwaliteit'] = $_POST['newKwaliteit'];}
    if($_POST['newDrukklasse'] <> ""){$_POST['drukklasse'] = $_POST['newDrukklasse'];}
    if($_POST['newLengte'] <> ""){$_POST['lengte'] = $_POST['newLengte'];}
    if($_POST['newMaat']<> ""){$_POST['maat'] = $_POST['newMaat'];}
    if($_POST['newKleur'] <> ""){$_POST['kleur'] = $_POST['newKleur'];}
    if($_POST['newVoetgrootte'] <> ""){$_POST['voetgrootte'] = $_POST['newVoetgrootte'];}
    if($_POST['newBijzonder'] <> ""){$_POST['bijzonderheden'] = $_POST['newBijzonder'];}
    $kousSvc = new KousService();
    $kousSvc->voegKousToe($_POST['merk'], $_POST['kwaliteit'], $_POST['drukklasse'], $_POST['lengte'], $_POST['maat'], $_POST['kleur'], $_POST['voetgrootte'], $_POST['bijzonderheden'], $_POST['bestelcode'], $_POST['barcode']);
    if(isset($_SESSION['klant']) && isset($_SESSION['barcode'])) {
        
        header("location: voegaankooptoe.php");
        exit(0);
    }
    header("location: toonallebestellingen.php");
    exit(0);

    
}else{
    $KousSvc = new KousService();
    $merken = $KousSvc->getMerkOverzicht();
    $kwaliteiten = $KousSvc->getKwaliteitOverzicht();
    $drukklasses = $KousSvc->getDrukklasseOverzicht();
    $lengtes = $KousSvc->getLengteOverzicht();
    $maten = $KousSvc->getMaatOverzicht();
    $kleuren = $KousSvc->getKleurOverzicht();
    $voetgroottes = $KousSvc->getVoetgrootteOverzicht();
    $bijzonderheden = $KousSvc->getBijzonderhedenOverzicht();
    if(isset($_SESSION['barcode'])){
        $barcode = $_SESSION['barcode'];
    }
    include("Presentation/nieuweKousform.php");
}


