<?php
//Business/LeverancierService.php
require_once 'Data/LeverancierDAO.php';

class LeverancierService {
    public function voegLeverancierToe($leveranciernaam, $email){
        $leverancierDao = new LeverancierDAO();
        $leverancierDao->createLeverancier($leveranciernaam, $email);
    }
    public function getLeveranciersOverzicht(){
        $leverancierDao = new LeverancierDAO();
        $lijst = $leverancierDao->getAll();
        return $lijst;
    }
}