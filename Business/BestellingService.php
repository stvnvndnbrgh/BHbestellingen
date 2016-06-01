<?php
//Business/BestellingService.php
require_once 'Data/BestellingDAO.php';

class BestellingService {
    public function getBestellingOverzicht() {
        $bestellingDAO = new BestellingDAO();
        $lijst = $bestellingDAO->getAll();
        return $lijst;
    }
}