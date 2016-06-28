<?php
//Business/LeverancierService.php
require_once 'Data/LeverancierDAO.php';

class LeverancierService {
    public function voegLeverancierToe($leveranciernaam, $email){
        $leverancierDao = new LeverancierDAO();
        $leverancierDao->createLeverancier($leveranciernaam, $email);
    }
}