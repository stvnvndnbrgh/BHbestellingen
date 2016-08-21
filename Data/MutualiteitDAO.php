<?php
//Data/MutualiteitDAO.php
require_once 'DBConfig.php';
require_once 'Data/PostcodeDAO.php';
require_once 'Entities/Mutualiteit.php';
require_once 'Entities/Postcode.php';

class MutualiteitDAO {
    public function getAll() {
        $sql = "select mut_id, mut_naam, mut_nummer, mut_adres, mut_postcode_id, postcode, gemeente, mut_tel, mut_email from mutualiteit, postcode where mut_postcode_id = postcode.id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbh->query($sql);
        $lijst = array();
        foreach ($resultset as $rij) {
            $postcode = Postcode::create($rij['mut_postcode_id'], $rij['postcode'], $rij['gemeente']);
            $mutualiteit = Mutualiteit::create($rij['mut_id'], $rij['mut_naam'], $rij['mut_nummer'], $rij['mut_adres'], $postcode, $rij['mut_tel'], $rij['mut_email']);
            array_push($lijst, $mutualiteit);
        }
        $dbh = null;
        return $lijst;
    }
}