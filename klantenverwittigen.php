<?php
//klantenverwittigen.php
session_start();
require_once 'Business/BestellingService.php';
require_once 'Business/MailService.php';

if(isset($_GET['action']) && $_GET['action'] == 'verwittigen'){
    $bestelSvc = new BestellingService();
    $mailSvc = new MailService();
    $bestelDao = new BestellingDAO();
    $lijst = $bestelSvc->getLijstTeVerwittigenKlanten();
    foreach($lijst as $klantmail){
        $mailSvc->sendKlantBestellingGeleverd($klantmail['email']);
        $bestelDao->statusstapvooruit($klantmail['id']);
    }
    header('location:toonallebestellingen.php');
}