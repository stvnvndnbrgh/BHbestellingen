<?php
//Data/ArtikelDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Artikel.php';
require_once 'Entities/Artikelgroep.php';
require_once 'Entities/Leverancier.php';

class ArtikelDAO {
    public function getAll() {
        $sql = "select artikel.id, artikelnaam, artikelgroep_id, artikelgroepnaam, barcode, leverancier_id, leveranciernaam, email from artikel, artikelgroep, leverancier where artikelgroep_id = artikelgroep.id and leverancier_id = leverancier.id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $artikelgroep = Artikelgroep::create($rij['artikelgroep_id'], $rij['artikelgroepnaam']);
            $leverancier = Leverancier::create($rij['leverancier_id'], $rij['leveranciernaam'], $rij['email']);
            $artikel = Artikel::create($rij['id'], $rij['artikelnaam'], $artikelgroep, $rij['barcode'], $leverancier);
            array_push($lijst, $artikel);
        }
        return $lijst;
    }
    
    public function getById($id) {
        $sql = "select artikel.id, artikelnaam, artikelgroep_id, artikelgroepnaam, barcode, leverancier_id, leveranciernaam, email from artikel, artikelgroep, leverancier where artikelgroep_id = artikelgroep.id and leverancier_id = leverancier.id and artikel.id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $artikelgroep = Artikelgroep::create($rij['artikelgroep_id'], $rij['artikelgroepnaam']);
        $leverancier = Leverancier::create($rij['leverancier_id'], $rij['leveranciernaam'], $rij['email']);
        $artikel = Artikel::create($rij['id'], $rij['artikelnaam'], $artikelgroep, $rij['barcode'], $leverancier);
        $dbh = null;
        return $artikel;
    }
    
    public function createArtikel($artikelnaam, $artikelgroep_id, $barcode, $leverancier_id) {
        $sql = "insert into artikel (artikelnaam, artikelgroep_id, barcode, leverancier_id) values (:artikelnaam, :artikelgroep_id, :barcode, :leverancier_id)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':artikelnaam' => $artikelnaam, ':artikelgroep_id' => $artikelgroep_id, ':barcode' => $barcode, ':leverancier_id' => $leverancier_id));
        $dbh = null;
    }
}