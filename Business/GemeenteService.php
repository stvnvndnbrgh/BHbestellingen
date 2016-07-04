<?php

require_once 'Data/PostcodeDAO.php';

class GemeenteService{
    public function genereerLijst(){
        $gemeenteDao = new PostcodeDAO();
        $lijst = $gemeenteDao->getAll();        
        return $lijst;
    }
    
    public function genereerLijstAlfa(){
        $gemeenteDao = new PostcodeDAO();
        $lijstAlfa = $gemeenteDao->getAllAlfaOpGemeente();
        return $lijstAlfa;
    }
}

