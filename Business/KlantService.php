<?php
//Business/KlantService.php
require_once 'Data/KlantDAO.php';

class KlantService {
    public function getKlantOverzicht(){
        $KlantDao = new KlantDAO();
        $lijst = $KlantDao->getAll();
        return $lijst;
    }
    
    public function voegKlantToe($voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email){
        $klantDao = new KlantDAO();
        $klantDao->createKlant($voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email);
    }
}