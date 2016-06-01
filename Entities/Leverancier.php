<?php
//Entities/Leverancier.php

class Leverancier {
    
    private static $mapId= array();
    
    private $id;
    private $leveranciernaam;
    private $email;
    
    public function __construct($id, $leveranciernaam, $email) {
        $this->id = $id;
        $this->leveranciernaam = $leveranciernaam;
        $this->email = $email;
    }
    
    public static function create($id, $leverancier, $email) {
        if(!isset(self::$mapId[$id])){
            self::$mapId[$id] = new Leverancier ($id, $leverancier, $email);
        }
        return self::$mapId[$id];
    }

        public function getId() {
        return $this->id;
    }

    public function getLeveranciernaam() {
        return $this->leveranciernaam;
    }

    public function getEmail() {
        return $this->email;
    }


    public function setLeveranciernaam($leveranciernaam) {
        $this->leveranciernaam = $leveranciernaam;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


}