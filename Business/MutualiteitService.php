<?php
//Business/MutualiteitService.php
require_once 'Data/MutualiteitDAO.php';

class MutualiteitService {
    public function getMutualiteitOverzicht(){
        $MutualiteitDao = new MutualiteitDAO();
        $lijst = $MutualiteitDao->getAll();
        return $lijst;
    }
}

