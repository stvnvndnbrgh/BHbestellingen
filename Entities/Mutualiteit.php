<?php
//Entities/Mutualiteit.php

class Mutualiteit {
    
    private static $mapId = array();
    
    private $mut_id;
    private $mut_naam;
    private $mut_nummer;
    private $mut_adres;
    private $mut_postcode_id;
    private $mut_tel;
    private $mut_email;

    public function __construct($mut_id, $mut_naam, $mut_nummer, $mut_adres, $mut_postcode_id, $mut_tel, $mut_email) {
        $this->mut_id = $mut_id;
        $this->mut_naam = $mut_naam;
        $this->mut_nummer = $mut_nummer;
        $this->mut_adres = $mut_adres;
        $this->mut_postcode_id = $mut_postcode_id;
        $this->mut_tel = $mut_tel;
        $this->mut_email = $mut_email;
    }
    
    public static function create($mut_id, $mut_naam, $mut_nummer, $mut_adres, $mut_postcode_id, $mut_tel, $mut_email) {
        if(!isset(self::$mapId[$mut_id])){
            self::$mapId[$mut_id] = new Mutualiteit($mut_id, $mut_naam, $mut_nummer, $mut_adres, $mut_postcode_id, $mut_tel, $mut_email);
        }
        return self::$mapId[$mut_id];
    }
    
    //getters
   
    function getMut_id() {
        return $this->mut_id;
    }
    
    function getMut_naam() {
        return $this->mut_naam;
    }

    function getMut_nummer() {
        return $this->mut_nummer;
    }

    function getMut_adres() {
        return $this->mut_adres;
    }

    function getMut_postcode_id() {
        return $this->mut_postcode_id;
    }

    function getMut_tel() {
        return $this->mut_tel;
    }

    function getMut_email() {
        return $this->mut_email;
    }

    function setMut_naam($mut_naam) {
        $this->mut_naam = $mut_naam;
    }

    function setMut_nummer($mut_nummer) {
        $this->mut_nummer = $mut_nummer;
    }

    function setMut_adres($mut_adres) {
        $this->mut_adres = $mut_adres;
    }

    function setMut_postcode_id($mut_postcode_id) {
        $this->mut_postcode_id = $mut_postcode_id;
    }

    function setMut_tel($mut_tel) {
        $this->mut_tel = $mut_tel;
    }

    function setMut_email($mut_email) {
        $this->mut_email = $mut_email;
    }
}