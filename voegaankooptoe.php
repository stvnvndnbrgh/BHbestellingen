<?php
session_start();
//voegaankooptoe.php
require_once 'Business/KlantService.php';
require_once 'Business/KousService.php';
require_once 'Business/AankoopService.php';
if(isset($_SESSION['klant']) && isset($_SESSION['barcode'])) {
    $klantSvc = new KlantService();
    $klant = $klantSvc->getKlantById($_SESSION['klant']);
    $kousSvc=new KousService(); 
    $kous=$kousSvc->getKousByBarcode($_SESSION['barcode']);
    $aankoopSvc = new AankoopService();
            $aankoopSvc->createAankoop($klant->getId(), $kous->getKous_id(), $_SESSION['aankoopdatum']);
            unset($_SESSION['klant'], $_SESSION['barcode'], $_SESSION['aankoopdatum']);
            header("location:toonklant.php?action=".$klant->getId());
}

if(isset($_GET['action']) && $_GET['action'] == "create"){
    $klantSvc = new KlantService();
    $klant = $klantSvc->getKlantById($_POST['klant']);
    if(isset($_POST['barcode']) && $_POST['barcode'] <> ""){
        $kousSvc=new KousService();  
        $bestaat = $kousSvc->existBarcode($_POST['barcode']);
        if($bestaat == FALSE){
            $_SESSION['klant'] = $_POST['klant'];
            $_SESSION['barcode'] = $_POST['barcode'];
            $_SESSION['aankoopdatum'] = $_POST['aankoopdatum'];
            header("location: voegkoustoe.php");
            exit(0);
            
        }
        $kous=$kousSvc->getKousByBarcode($_POST['barcode']);
        
        if(isset($_POST['aankoopdatum'])&& $_POST['aankoopdatum'] <> ""){
            $aankoopSvc = new AankoopService();
            $aankoopSvc->createAankoop($klant->getId(), $kous->getKous_id(), $_POST['aankoopdatum']);
            header("location:toonklant.php?action=".$klant->getId());
        }
    }
    
    include('Presentation/nieuweAankoopForm.php');
}
if(isset($_GET['klant'])) {
    $klantSvc = new KlantService();
    $klant = $klantSvc->getKlantById($_GET['klant']);
    include('Presentation/nieuweAankoopForm.php');
    //
    //if(!isset($GET['barcode'])){
      //  include('Presentation/nieuweAankoopForm.php?action=new');
    //}elseif (isset($GET['barcode']) and isset($_GET['aankoopdatum'])){
      //  $KousSvc = new KousService();
       // $KousSvc->getKousByBarcode($GET['barcode']);
    //}
    //header("location: toonallebestellingen.php");
    
}