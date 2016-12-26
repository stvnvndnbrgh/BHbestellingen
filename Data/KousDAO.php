<?php
//Data/KousDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Leverancier.php';
require_once 'Entities/Kous.php';

class KousDAO {
    public function getKousByProperties($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden){
        $sql = "select kous_id, merk, kwaliteit, drukklasse, lengte, maat, kleur, voetgrootte, bijzonderheden,
            bestelcode,
            barcode
            from kous where merk = :merk
            and kwaliteit = :kwaliteit
            and drukklasse = :drukklasse
            and lengte =:lengte
            and maat = :maat
            and kleur = :kleur
            and voetgrootte = :voetgrootte
            and biijzonderheden = :bijzonderheden";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':merk' => $merk, ':kwaliteit' => $kwaliteit, ':drukklasse' => $drukklasse, ':lengte' => $lengte, ':maat' => $maat, ':kleur' => $kleur, ':voetgrootte' => $voetgrootte, ':bijzonderheden' => $bijzonderheden));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $kous = Kous::create($rij['kous_id'], $rij['merk'], $rij['kwaliteit'], $rij['drukklasse'], $rij['lengte'], $rij['maat'], $rij['kleur'], $rij['voetgrootte'], $rij['bijzonderheden'], $rij['bestelcode'], $rij['barcode']);
        $dbh = null;
        return $kous;
    }
    
    public function getAll() {
        $sql = "select kous_id, merk, kwaliteit, drukklasse, lengte, maat, kleur, voetgrootte, bijzonderheden, bestelcode, barcode from kousen order by Merk, Kwaliteit";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            //$leverancier = Leverancier::create($rij['leverancier_id'], $rij['leveranciernaam']); 
            $kous = Kous::create($rij['kous_id'], $rij['merk'], $rij['kwaliteit'], $rij['drukklasse'], $rij['lengte'], $rij['maat'], $rij['kleur'], $rij['voetgrootte'], $rij['bijzonderheden'], $rij['bestelcode'], $rij['barcode']);
            array_push($lijst,$kous);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getKousByBarcode($barcode) {
        $sql = "select kous_id, merk, kwaliteit, drukklasse, lengte, maat, kleur, voetgrootte, bijzonderheden, bestelcode, barcode from kousen where barcode = :barcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':barcode' => $barcode));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $kous = Kous::create($rij['kous_id'],$rij['merk'], $rij['kwaliteit'], $rij['drukklasse'], $rij['lengte'], $rij['maat'], $rij['kleur'], $rij['voetgrootte'], $rij['bijzonderheden'], $rij['bestelcode'], $rij['barcode']);
        $dbh = null;
        return $kous;
    }
    
    public function existBarcode($barcode) {
        $sql = "SELECT count(barcode) as bestaat from kousen where barcode = :barcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':barcode' => $barcode));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rij['bestaat'] == '1'){
            return true;
        }else{
            return FALSE;
        }
    }
    
    public function createKous($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode) {
        $sql = "insert into kousen (merk, kwaliteit, drukklasse, lengte, maat, kleur, voetgrootte, bijzonderheden, bestelcode, barcode) values (:merk, :kwaliteit, :drukklasse, :lengte, :maat, :kleur, :voetgrootte, :bijzonderheden, :bestelcode, :barcode)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':merk' => $merk, ':kwaliteit' => $kwaliteit, ':drukklasse' => $drukklasse, ':lengte' => $lengte, ':maat' => $maat, ':kleur' => $kleur, ':voetgrootte' => $voetgrootte, ':bijzonderheden' => $bijzonderheden, ':bestelcode' => $bestelcode, ':barcode' => $barcode));
        $dbh = null;
    }
    
    //functies voor form selectors te vullen
    public function getMerkUniek() {
        $sql = "select merk from kousen group by merk";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getKwaliteitUniek() {
        $sql = "select kwaliteit from kousen group by kwaliteit";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getDrukklasseUniek() {
        $sql = "select drukklasse from kousen group by drukklasse";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getLengteUniek() {
        $sql = "select lengte from kousen group by lengte";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getMaatUniek() {
        $sql = "select maat from kousen group by maat";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getKleurUniek() {
        $sql = "select kleur from kousen group by kleur";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getVoetgrootteUniek() {
        $sql = "select voetgrootte from kousen group by voetgrootte";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
    public function getBijzonderhedenUniek() {
        $sql = "select bijzonderheden from kousen group by bijzonderheden";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $Lijst = array();
        foreach ($resultSet as $result){
            array_push($Lijst,$result);
        }
        $dbh = null;
        return $Lijst;
    }
}