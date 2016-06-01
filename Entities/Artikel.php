<?php
//Entities/Artikel.php

class Artikel {
    
    private static $mapId = array();

    private $id;
    private $artikelnaam;
    private $artikelgroep_id;
    private $barcode;
    private $leverancier_id;
    
    public function __construct($id, $artikelnaam, $artikelgroep_id, $barcode, $leverancier_id) {
        $this->id = $id;
        $this->artikelnaam = $artikelnaam;
        $this->artikelgroep_id = $artikelgroep_id;
        $this->barcode = $barcode;
        $this->leverancier_id = $leverancier_id;
    }
    
    public static function create($id, $artikelnaam, $artikelgroep_id, $barcode, $leverancier_id) {
        if(!isset(self::$mapId[$id])) {
            self::$mapId[$id] = new Artikel($id, $artikelnaam, $artikelgroep_id, $barcode, $leverancier_id);
        }
        return self::$mapId[$id];
    }

        public function getId() {
        return $this->id;
    }

    public function getArtikelnaam() {
        return $this->artikelnaam;
    }

    public function getArtikelgroep_id() {
        return $this->artikelgroep_id;
    }

    public function getBarcode() {
        return $this->barcode;
    }

    public function getLeverancier_id() {
        return $this->leverancier_id;
    }


    public function setArtikelnaam($artikelnaam) {
        $this->artikelnaam = $artikelnaam;
    }

    public function setArtikelgroep_id($artikelgroep_id) {
        $this->artikelgroep_id = $artikelgroep_id;
    }

    public function setBarcode($barcode) {
        $this->barcode = $barcode;
    }

    public function setLeverancier_id($leverancier_id) {
        $this->leverancier_id = $leverancier_id;
    }



}