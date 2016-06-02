<?php
//Data/BestellingDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Klant.php';
require_once 'Data/KlantDAO.php';
require_once 'Entities/Artikel.php';
require_once 'Data/ArtikelDAO.php';
require_once 'Entities/Status.php';
require_once 'Entities/Bestelling.php';

class BestellingDAO {
    public function getAll() {
        $sql = "select bestelling.id, klant_id, artikel_id, status_id, stati, color, createdate, editdate from bestelling, stati where status_id = stati.id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij){
            $klantDao = new KlantDAO();
            $klant = $klantDao->getById($rij['klant_id']);
            $artikelDao = new ArtikelDAO();
            $artikel = $artikelDao->getById($rij['artikel_id']);
            $status = Status::create($rij['status_id'], $rij['stati'], $rij['color']);
            $bestelling = new Bestelling($rij['id'], $klant, $artikel, $status, $rij['createdate'], $rij['editdate']);
            array_push($lijst, $bestelling);            
        }   
        return $lijst;
    }
    
    public function createBestelling($klant_id, $artikel_id) {
        $sql = "insert into bestelling (klant_id, artikel_id, status_id) values (:klant_id, :artikel_id, 1)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':klant_id' => $klant_id, ':artikel_id' => $artikel_id));
        $dbh = null;
    }
}