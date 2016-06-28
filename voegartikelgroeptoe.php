<?php
//voegartikelgroeptoe.php
require_once 'Business/ArtikelgroepService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuweartikelgroep"){
    $artikelSvc = new ArtikelgroepService();
    $artikelSvc->voegArtikelGroepToe($_POST['txtArtikelgroep']);
    header("location:voegartikeltoe.php");
    exit(0);
}else{
    include("Presentation/nieuweArtikelgroepForm.php");
}

