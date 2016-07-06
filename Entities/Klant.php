<?php
//Entities/Klant.php

class Klant {
    
    private static $mapId = array();
    
    private $id;
    private $voornaam;
    private $familienaam;
    private $adres;
    private $postcode_id;
    private $telefoonnr;
    private $email;
    private $createdate;
    private $editdate;
    
    public function __construct($id, $voornaam, $familienaam, $adres, $postcode_id, $telefoonnr, $email, $createdate, $editdate) {
        $this->id = $id;
        $this->voornaam = $voornaam;
        $this->familienaam = $familienaam;
        $this->adres = $adres;
        $this->postcode_id = $postcode_id;
        $this->telefoonnr = $telefoonnr;
        $this->email = $email;
        $this->createdate = $createdate;
        $this->editdate = $editdate;
    }

    public static function create($id, $voornaam, $familienaam, $adres, $postcode_id, $telefoonnr, $email, $createdate, $editdate) {
        if(!isset(self::$mapId[$id])){
            self::$mapId[$id] = new Klant($id, $voornaam, $familienaam, $adres, $postcode_id, $telefoonnr, $email, $createdate, $editdate);
        }
        return self::$mapId[$id];
    }
    
    //getters
    public function getId() {
        return $this->id;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getFamilienaam() {
        return $this->familienaam;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function getPostcode_id() {
        return $this->postcode_id;
    }

    public function getTelefoonnr() {
        return $this->telefoonnr;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getCreatedate() {
        return $this->createdate;
    }

    public function getEditdate() {
        return $this->editdate;
    }
    
    //setters
    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    public function setFamilienaam($familienaam) {
        $this->familienaam = $familienaam;
    }

    public function setAdres($adres) {
        $this->adres = $adres;
    }

    public function setPostcode_id($postcode_id) {
        $this->postcode_id = $postcode_id;
    }

    public function setTelefoonnr($telefoonnr) {
        $this->telefoonnr = $telefoonnr;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }

    public function setEditdate($editdate) {
        $this->editdate = $editdate;
    }
}