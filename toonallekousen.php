<?php
//toonallekousen.php
session_start();
require_once 'Business/KousService.php';

if(isset($_GET['action']) && $_GET['action'] == 'kousentonen'){
    $kousSvc = new KousService();
    $lijst = $kousSvc->getKousenOverzicht();
    
    include 'Presentation/Kousenlijst.php';
}