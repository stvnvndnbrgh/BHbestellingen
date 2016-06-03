<?php
//Business/ArtikelService.php
require_once 'Data/ArtikelDAO.php';

class ArtikelService {
    public function getArtikelOverzicht(){
        $ArtikelDao = new ArtikelDAO();
        $lijst = $ArtikelDao->getAll();
        return $lijst;
    }
}