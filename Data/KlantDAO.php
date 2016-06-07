<?php
//Data/KlantDAO.php
require_once 'DBConfig.php';
require_once 'Data/PostcodeDAO.php';
require_once 'Entities/Klant.php';
require_once 'Entities/Postcode.php';
require_once 'Exceptions/NoPostcodeexception.php';

class KlantDAO {
    public function getAll() {
        $sql = "select klant.id, voornaam, familienaam, adres, postcode_id, postcode, gemeente, telefoonnr, email, klant_createdate, klant_editdate from klant, postcode where postcode_id = postcode.id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $postcode = Postcode::create($rij['postcode_id'], $rij['postcode'], $rij['gemeente']);
            $klant = Klant::create($rij['id'], $rij['voornaam'], $rij['familienaam'], $rij['adres'], $postcode, $rij['telefoonnr'], $rij['email'], $rij['klant_createdate'], $rij['klant_editdate']);
            array_push($lijst, $klant);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getById($id) {
        $sql = "select klant.id, voornaam, familienaam, adres, postcode_id, postcode, gemeente, telefoonnr, email, klant_createdate, klant_editdate from klant, postcode where postcode_id = postcode.id and klant.id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $postcode = Postcode::create($rij['postcode_id'], $rij['postcode'], $rij['gemeente']);
        $klant = Klant::create($rij['id'], $rij['voornaam'], $rij['familienaam'], $rij['adres'], $postcode, $rij['telefoonnr'], $rij['email'], $rij['klant_createdate'], $rij['klant_editdate']);
        $dbh = null;
        return $klant;
    }
    
    public function createKlant($voornaam, $familienaam, $adres, $gemeente, $telefoonnr, $email) {
        $pc = new PostcodeDAO();
        $postcode = $pc->getByGemeente($gemeente);
        $postcodeId = $postcode->getId();
        if(!$postcodeId){
            throw new NoPostcodeException();
        }
        $sql = "insert into klant (voornaam, familienaam, adres, postcode_id, telefoonnr, email) values (:voornaam, :familienaam, :adres, :postcode_id, :telefoonnr, :email)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':voornaam' => $voornaam, ':familienaam' => $familienaam, ':adres' => $adres, ':postcode_id' => $postcodeId, ':telefoonnr' => $telefoonnr, ':email' => $email));
        $dbh = null;
    }
}