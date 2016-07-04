<?php
//statusterug.php
session_start();
require_once 'Business/BestellingService.php';

if(isset($_GET['action']) && $_GET['action'] == 'statusterug'){
    $bestelSvc = new BestellingService();
    $bestelSvc->stapterug($_GET['id']);
    header('location:toonallebestellingen.php');
}
header('location:toonallebestellingen.php');