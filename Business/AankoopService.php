<?php
//Business/AankoopService.php
require_once 'Data/AankoopDAO.php';
require_once 'Data/KlantDAO.php';
require_once 'Data/KousDAO.php';

class AankoopService {
    public function AankopenPerKlant($klant_id){
        $aankoopDao = new AankoopDAO();
        $lijst = $aankoopDao->getAankopenPerKlant($klant_id);
        return $lijst;
    }
    
    public function createAankoop($klant_id, $kous_id, $aankoopdatum) {
        $aankoopDao = new AankoopDAO();
        $aankoopDao->createAankoop($klant_id, $kous_id, $aankoopdatum);
    }
}