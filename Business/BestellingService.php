<?php
//Business/BestellingService.php
require_once 'Data/BestellingDAO.php';
require_once 'Data/StatusDAO.php';

class BestellingService {
    public function getBestellingOverzicht() {
        $bestellingDao = new BestellingDAO();
        $lijst = $bestellingDao->getAll();
        return $lijst;
    }
    
    public function voegBestellingToe($klant_id, $artikel_id, $status_id) {
        $bestelDao = new BestellingDAO();
        $bestelDao->createBestelling($klant_id, $artikel_id, $status_id);
    }
    
    public function verwijderBestelling($id) {
        $bestelDao = new BestellingDAO();
        $bestelDao->deleteBestelling($id);
    }
    
    public function haalBestellingOp($id) {
        $bestelDao = new BestellingDAO();
        $bestelling = $bestelDao->getById($id);
        return $bestelling;
    }
    
    public function updateBestelling($id, $statusId) {
        $statusDao = new StatusDAO();
        $bestellingDao = new BestellingDAO();
        //$status = $statusDao->getById($statusId);
        $bestelling = $bestellingDao->getById($id);
        $bestelling->setStatus_id($statusId);
        print("<pre>");
        print_r($bestelling);
        print("</pre>");
        $bestellingDao->updateBestelling($bestelling);
    }
}