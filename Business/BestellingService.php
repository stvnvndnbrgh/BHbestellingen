<?php
//Business/BestellingService.php
require_once 'Data/BestellingDAO.php';

class BestellingService {
    public function getBestellingOverzicht() {
        $bestellingDAO = new BestellingDAO();
        $lijst = $bestellingDAO->getAll();
        return $lijst;
    }
    
    public function voegBestellingToe($klant_id, $artikel_id) {
        $bestelDao = new BestellingDAO();
        $bestelDao->createBestelling($klant_id, $artikel_id);
    }
}