<?php
//Data/PostcodeDAO.php

require_once 'DBConfig.php';
require_once 'Entities/Postcode.php';

class PostcodeDAO {
    public function getAll() {
        $sql = "select id, postcode, gemeente from postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst=array();
        foreach ($resultSet as $rij) {
            $postcode = new Postcode($rij['id'], $rij['postcode'], $rij['gemeente']);
            array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getAllAlfaOpGemeente() {
        $sql = "select id, postcode, gemeente from postcode order by gemeente";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst=array();
        foreach ($resultSet as $rij) {
            $postcode = new Postcode($rij['id'], $rij['postcode'], $rij['gemeente']);
            array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }

        public function getById($id) {
        $sql = "select id, postcode, gemeente from postcode where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $postcode = Postcode::create($id, $rij['postcode'], $rij['gemeente']);
        $dbh = null;
        return $postcode;
    }

    public function getByPostcode($postcode) {
        $sql = "select id, postcode, gemeente from postcode where postcode = :postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':postcode' => $postcode));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij){
            $postcode = new Postcode($rij['id'], $rij["postcode"], $rij['gemeente']);
            array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }
        
    public function getByGemeente($gemeente) {
        $sql = "select id, postcode, gemeente from postcode where gemeente = :gemeente";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gemeente' => $gemeente));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $postcode = Postcode::create($rij['id'], $rij['postcode'], $gemeente);
        $dbh = null;
        return $postcode;
    }
    
    public function getCountOfPC($postcode) {
        $sql = "select count(*) from postcode where postcode = :postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':postcode' => $postcode));
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $aantal = (int)$resultSet['count(*)'];        
        $dbh = null;
        return $aantal;
    }
}