<?php
//Data/AankoopDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Klant.php';
require_once 'Entities/Kous.php';
require_once 'Entities/Aankoop.php';

class AankoopDAO {
    public function createAankoop($klant_id, $kous_id, $aankoopdatum){
        $sql = "insert into aankopen (klant_id, kous_id, aankoopdatum) values (:klant_id, :kous_id, :aankoopdatum)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':klant_id' => $klant_id, ':kous_id' => $kous_id, ':aankoopdatum' => $aankoopdatum));
        $dbh = null;
            
    }
    
    public function getAll() {
        $sql = "SELECT aankoop_id, klant_id, kous_id, aankoopdatum FROM bhbase.aankopen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $klant = Klant::create($rij['']);
        }
    }
    public function getAankopenPerKlant($klant_id) {
        $sql = "SELECT aankoop_id, klant_id, aankoopdatum, kousen.kous_id, merk, kwaliteit, drukklasse, lengte, maat, kleur, voetgrootte, bijzonderheden, bestelcode, barcode
                FROM aankopen
                inner join klant
                on aankopen.klant_id = klant.id
                inner join kousen
                on kousen.kous_id = aankopen.kous_id
                where klant.id = :id
                order by aankoopdatum desc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $klant_id));
        $lijst = array();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultSet as $rij) {
            $kous = Kous::create($rij['kous_id'],$rij['merk'], $rij['kwaliteit'], $rij['drukklasse'], $rij['lengte'], $rij['maat'], $rij['kleur'], $rij['voetgrootte'], $rij['bijzonderheden'], $rij['bestelcode'], $rij['barcode']);
            $aankoop = Aankoop::create($rij['aankoop_id'], $rij['klant_id'], $kous, $rij['aankoopdatum']);
            array_push($lijst, $aankoop);
        }
        $dbh = null;
        return $lijst;
    }  
}