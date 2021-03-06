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
        $sql = "select bestelling.id, klant_id, artikel_id, aantal, status_id, stati, color, createdate, editdate from bestelling, stati where status_id = stati.id order by stati.id asc, editdate";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij){
            $klantDao = new KlantDAO();
            $klant = $klantDao->getById($rij['klant_id']);
            $artikelDao = new ArtikelDAO();
            $artikel = $artikelDao->getById($rij['artikel_id']);
            $status = Status::create($rij['status_id'], $rij['stati'], $rij['color']);
            $bestelling = new Bestelling($rij['id'], $klant, $artikel, $rij['aantal'], $status, $rij['createdate'], $rij['editdate']);
            array_push($lijst, $bestelling);            
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getAllActiv() {
        $sql = "select bestelling.id, klant_id, artikel_id, aantal, status_id, stati, color, createdate, editdate from bestelling, stati where status_id = stati.id and status_id <> 6 order by stati.id asc, editdate";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij){
            $klantDao = new KlantDAO();
            $klant = $klantDao->getById($rij['klant_id']);
            $artikelDao = new ArtikelDAO();
            $artikel = $artikelDao->getById($rij['artikel_id']);
            $status = Status::create($rij['status_id'], $rij['stati'], $rij['color']);
            $bestelling = new Bestelling($rij['id'], $klant, $artikel, $rij['aantal'], $status, $rij['createdate'], $rij['editdate']);
            array_push($lijst, $bestelling);            
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getById($id) {
        $sql = "select bestelling.id, klant_id, artikel_id, aantal, status_id, stati, color, createdate, editdate from bestelling, stati where status_id = stati.id and bestelling.id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $klantDao = new KlantDAO();
        $klant = $klantDao->getById($rij['klant_id']);
        $artikelDao = new ArtikelDAO();
        $artikel = $artikelDao->getById($rij['artikel_id']);
        $status = Status::create($rij['status_id'], $rij['stati'], $rij['color']);
        $bestelling = new Bestelling($rij['id'], $klant, $artikel, $rij['aantal'], $status, $rij['createdate'], $rij['editdate']);
        $dbh = null;
        return $bestelling;
    }


    public function createBestelling($klant_id, $artikel_id, $aantal, $status_id) {
        $sql = "insert into bestelling (klant_id, artikel_id, aantal, status_id) values (:klant_id, :artikel_id, :aantal, :status_id)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':klant_id' => $klant_id, ':artikel_id' => $artikel_id,':aantal' => $aantal, ':status_id' => $status_id));
        $dbh = null;
    }
    
    public function deleteBestelling($id) {
        $sql = "delete from bestelling where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }
    
    public function updateBestelling($bestelling) {
        $sql = "update bestelling
                set status_id = :stati, aantal = :aantal where bestelling.id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $idii = $bestelling->getStatus_id();
        $stmt->execute(array(':aantal' => $bestelling->getAantal(), ':stati' => $bestelling->getStatus_id(), ':id' => $bestelling->getId()));
        $dbh = null;
    }
    
    public function getBestelLijstPerLeverancier($leverancierid){
        $sql = "select bestelling.id, familienaam, artikelnaam,  sum(aantal) as aantal, leveranciernaam ,leverancier.id as lev
                from bestelling
                inner join klant
                on bestelling.klant_id = klant.id
                inner join artikel
                on bestelling.artikel_id = artikel.id
                inner join leverancier
                on artikel.leverancier_id = leverancier.id
                where status_id = 2
                and leverancier_id = :leverancier_id
                group by artikelnaam;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute(array(':leverancier_id' => $leverancierid));
        $lijst = array();
        while($rij = $stmt->fetch()){
            array_push($lijst, $rij);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getLijstLeveranciersTeBestellen(){
        $sql = " Select leveranciernaam, leverancier.id, count(*)
                    from bestelling
                    inner join artikel
                    on bestelling.artikel_id = artikel.id
                    inner join leverancier
                    on artikel.leverancier_id = leverancier.id
                    where status_id = 2
                    group by leveranciernaam;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $leverancier){
            array_push($Lijst, $leverancier);
        }
        $dbh = null;
        return $Lijst;
    }
    
    public function plaatsLeveranciersbestelling($leverancierid) {
        $sql = " update bestelling
        inner join artikel
        on bestelling.artikel_id = artikel.id
        inner join leverancier
        on artikel.leverancier_id = leverancier.id
        set status_id = 3
        where status_id = 2
        and
        leverancier_id = :leverancier_id;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':leverancier_id' => $leverancierid));
        $dbh= null;
    }
    
    public function statusstapterug($id){
        $sql = "update bestelling
               set status_id = (status_id - 1)
               where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh= null;
    }
    
    public function statusstapvooruit($id){
        $sql = "update bestelling
               set status_id = (status_id + 1)
               where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh= null;
    }
    
    public function LijstTeVerwittigen(){
            
        $sql = "SELECT bestelling.id, status_id, klant.email
                FROM bestelling
                INNER JOIN klant
                ON bestelling.klant_id = klant.id
                WHERE status_id = 4
                AND klant.email <> ''";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $leverancier){
            array_push($Lijst, $leverancier);
        }
        $dbh = null;
        return $Lijst;    
    }
} 