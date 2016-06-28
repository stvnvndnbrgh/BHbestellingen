<?php
//Business/ArtikelgroepService.php
require_once 'Data/ArtikelgroepDAO.php';

class ArtikelgroepService {
    public function getArtikelgroepOverzicht(){
        $ArtikelgroepDao = new ArtikelgroepDAO();
        $Lijst = $ArtikelgroepDao->getAll();
        return $Lijst;
    }
}

