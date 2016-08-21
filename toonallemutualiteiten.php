<?php
//toonallemutualiteiten.php
session_start();
require_once 'Business/MutualiteitService.php';

if(isset($_GET['action']) && $_GET['action'] == 'mutualiteitentonen'){
    $mutualiteitSvc = new MutualiteitService();
    $lijst = $mutualiteitSvc->getMutualiteitOverzicht();
    
    include 'Presentation/Mutualiteitlijst.php';
}
