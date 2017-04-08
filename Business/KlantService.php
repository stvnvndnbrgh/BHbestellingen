<?php
//Business/KlantService.php
require_once 'Data/KlantDAO.php';

class KlantService {
    public function getKlantOverzicht(){
        $KlantDao = new KlantDAO();
        $lijst = $KlantDao->getAll();
        return $lijst;
    }
    public function getKlantById($id){
        $klantDao = new KlantDAO();
        $klant = $klantDao->getById($id);
        return $klant;
    }
    public function voegKlantToe($voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email){
        $klantDao = new KlantDAO();
        $klantDao->createKlant($voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email);
    }
    
    public function vindtKlant($zoekterm){
        $klantDao = new KlantDAO();
        $lijst = $klantDao->getByBeginsWith($zoekterm . "%");
        return $lijst;
    }
    
    public function updateKlant($id, $voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email, $rijksregisternummer){
        $klantDao = new KlantDAO();
        $klant = $klantDao->getById($id);
        $klant->setVoornaam($voornaam);
        $klant->setFamilie($familienaam);
        $klant->setAdres($adres);
        $klant->setPostcode_id($gemeente);
        $klant->setTelefoonnr($telefoonnr);
        $klant->setEmail($email);
        $klant->setRijksregisternr($rijksregisternummer);
        $klantDao->updateKlant($klant);
    }
}