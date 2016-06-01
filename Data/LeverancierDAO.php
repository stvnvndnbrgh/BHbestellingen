<?php
//Data/LeverancierDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Leverancier.php';

class LeverancierDAO {
    public function getAll() {
        $sql = "select leveranciernaam, email from leverancier";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
    }
}