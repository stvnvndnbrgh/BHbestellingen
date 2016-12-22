<?php
//Entities/Kous.php

class Kous {
    private static $mapId = array();
    
    private $kous_id;
    private $merk;
    private $kwaliteit;
    private $drukklasse;
    private $lengte;
    private $maat;
    private $kleur;
    private $voetgrootte;
    private $bijzonderheden;
    private $bestelcode;
    private $barcode;
    
    
    function __construct($kous_id, $merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode) {
        $this->kous_id = $kous_id;
        $this->merk = $merk;
        $this->kwaliteit = $kwaliteit;
        $this->drukklasse = $drukklasse;
        $this->lengte = $lengte;
        $this->maat = $maat;
        $this->kleur = $kleur;
        $this->voetgrootte = $voetgrootte;
        $this->bijzonderheden = $bijzonderheden;
        $this->bestelcode = $bestelcode;
        $this->barcode = $barcode;
        
    }
    
    public static function create($kous_id, $merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode) {
        if(!isset(self::$mapId[$kous_id])) {
            self::$mapId[$kous_id] = new Kous($kous_id, $merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode);
        }
        return self::$mapId[$kous_id];
    }
    

    function getKous_id() {
        return $this->kous_id;
    }

    function getMerk() {
        return $this->merk;
    }

    function getKwaliteit() {
        return $this->kwaliteit;
    }

    function getDrukklasse() {
        return $this->drukklasse;
    }

    function getLengte() {
        return $this->lengte;
    }

    function getMaat() {
        return $this->maat;
    }

    function getKleur() {
        return $this->kleur;
    }

    function getVoetgrootte() {
        return $this->voetgrootte;
    }

    function getBijzonderheden() {
        return $this->bijzonderheden;
    }

    function getBestelcode() {
        return $this->bestelcode;
    }

    function getBarcode() {
        return $this->barcode;
    }


    static function setMapId($mapId) {
        self::$mapId = $mapId;
    }


    function setMerk($merk) {
        $this->merk = $merk;
    }

    function setKwaliteit($kwaliteit) {
        $this->kwaliteit = $kwaliteit;
    }

    function setDrukklasse($drukklasse) {
        $this->drukklasse = $drukklasse;
    }

    function setLengte($lengte) {
        $this->lengte = $lengte;
    }

    function setMaat($maat) {
        $this->maat = $maat;
    }

    function setKleur($kleur) {
        $this->kleur = $kleur;
    }

    function setVoetgrootte($voetgrootte) {
        $this->voetgrootte = $voetgrootte;
    }

    function setBijzonderheden($bijzonderheden) {
        $this->bijzonderheden = $bijzonderheden;
    }

    function setBestelcode($bestelcode) {
        $this->bestelcode = $bestelcode;
    }

    function setBarcode($barcode) {
        $this->barcode = $barcode;
    }

}

