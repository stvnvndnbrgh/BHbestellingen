<?php
//statusvooruit.php
session_start();
require_once 'Business/BestellingService.php';

if(isset($_GET['action']) && $_GET['action'] == 'statusvooruit'){
    $bestelSvc = new BestellingService();
    $bestelSvc->stapvooruit($_GET['id']);
    header('location:toonallebestellingen.php');
}
header('location:toonallebestellingen.php');