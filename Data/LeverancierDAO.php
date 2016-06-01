<?php
//Data/LeverancierDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Leverancier.php';

class LeverancierDAO {
    public function getAll() {
        $sql = "select leveranciernaam, email from leverancier";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $leverancier = Leverancier::create($rij['id'], $rij['leveranciernaam'], $rij['email']);
            array_push($lijst, $leverancier);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getById ($id) {
        $sql = "select id, leveranciernaam, email from leverancier where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $leverancier = Leverancier::create($rij['id'], $rij['leveranciernaam'], $rij['email']);
        $dbh = null;
        return $leverancier;
    }
    
    public function getByLeveranciernaam ($leveranciernaam) {
        $sql = "select id, leveranciernaam, email from leverancier where leveranciernaam = :leveranciernaam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':leveranciernaam' => $leveranciernaam));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $leverancier = Leverancier::create($rij['id'], $rij['leveranciernaam'], $rij['email']);
        $dbh = null;
        return $leverancier;        
    }

        public function createLeverancier ($leveranciernaam, $email) {
        $sql = "insert into leverancier (leveranciernaam, email) values (:leveranciernaam, :email)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':leveranciernaam' => $leveranciernaam, ':email' => $email));
        //$leverancierId = $dbh->lastInsertId();
        //$lev = Leverancier::create($leverancierId, $leveranciernaam, $email);
        $dbh = null;
        //print_r($lev);
    }
}