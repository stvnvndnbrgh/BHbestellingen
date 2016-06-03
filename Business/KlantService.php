<?php
//Business/KlantService.php
require_once 'Data/KlantDAO.php';

class KlantService {
    public function getKlantOverzicht(){
        $KlantDao = new KlantDAO();
        $lijst = $KlantDao->getAll();
        return $lijst;
    }
}