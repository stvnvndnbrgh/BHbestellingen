<?php
//Business/StatusService.php
require_once 'Data/StatusDAO.php';

class StatusService {
    public function getStatusOverzicht(){
        $statusDao = new StatusDAO();
        $lijst = $statusDao->getAll();
        return $lijst;
    }
    
    
}