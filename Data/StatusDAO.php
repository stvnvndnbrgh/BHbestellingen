<?php
//Data/StatusDAO.php
require_once 'DBConfig.php';
require_once 'Entities/Status.php';

class StatusDAO {
    public function getAll() {
        $sql = "select id, stati from stati";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $status = Status::create($rij['id'], $rij['stati']);
            array_push($lijst, $status);
        }
        $dbh = null;
        return $lijst;        
    }
    
    public function getById($id) {
        $sql = "select id, stati from stati where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $leverancier = Status::create($rij['id'], $rij['stati']);
        $dbh = null;
        return $status;
    }
}