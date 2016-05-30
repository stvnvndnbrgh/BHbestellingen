<?php
//Data/ArtikelgroepDAO.php

require_once 'DBConfig.php';
require_once 'Entities/Artikelgroep.php';

class ArtikelgroepDAO {
    public function getAll() {
        $sql = "select id, artikelgroepnaam from artikelgroep";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultset as $rij){
            $artikelgroep = Artikelgroep::create($rij['id'], $rij['artikelgroepnaam']);
            array_push($lijst, $artikelgroep);
        }
        return $lijst;
    }
    
    public function getById($id) {
        $sql = "select id, artikelgroepnaam from artikelgroep where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $artikelgroep = Artikelgroep::create($rij ['id'], $rij['artikelgroepnaam']);
        $dbh = null;
        return $artikelgroep;
    }
    
    public function getByArtikelgroepnaam($artikelgroepnaam) {
        $sql = "select id, artikelgroepnaam from artikelgroep where artikelgroepnaam = :artikelgroepnaam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':artikelgroepnaam' => $artikelgroepnaam));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $artikelgroep = Artikelgroep::create($rij ['id'], $rij['artikelgroepnaam']);
        $dbh = null;
        return $artikelgroep;
    }
    
    public function createArtikelgroep($artikelgroepnaam) {
        $sql = "insert into artikelgroep (artikelgroepnaam) values (artikelgroepnaam = :artikelgroepnaam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':artikelgroepnaam' => $artikelgroepnaam));
        $dbh = null;
    }
}