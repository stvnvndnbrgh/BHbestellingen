<?php
//Entities/Aankoop.php

class Aankoop {
    private static $mapId = array();
    
    private $aankoop_id;
    private $klant_id;
    private $kous_id;
    private $aankoopdatum;
    
    
    
    function __construct($aankoop_id, $klant_id, $kous_id, $date){
        $this->aankoop_id = $aankoop_id;
        $this->klant_id = $klant_id;
        $this->kous_id = $kous_id;
        $this->aankoopdatum = $date;
    }
    
    public static function create($aankoop_id, $klant_id, $kous_id, $date){
         if(!isset(self::$mapId[$aankoop_id])) {
            self::$mapId[$aankoop_id] = new Aankoop($aankoop_id, $klant_id, $kous_id, $date);
         }
         return self::$mapId[$aankoop_id];
    }
    
    static function getMapId() {
        return self::$mapId;
    }

    function getAankoop_id() {
        return $this->aankoop_id;
    }

    function getKlant_id() {
        return $this->klant_id;
    }

    function getKous_id() {
        return $this->kous_id;
    }

    function getAankoopdatum() {
        return $this->aankoopdatum;
    }

    static function setMapId($mapId) {
        self::$mapId = $mapId;
    }

    function setKlant_id($klant_id) {
        $this->klant_id = $klant_id;
    }

    function setKous_id($kous_id) {
        $this->kous_id = $kous_id;
    }

    function setAankoopdatum($aankoopdatum) {
        $this->aankoopdatum = $aankoopdatum;
    }
}