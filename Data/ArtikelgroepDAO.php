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
}