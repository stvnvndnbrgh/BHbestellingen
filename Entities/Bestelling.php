<?php
//Entities/Bestelling.php

class Bestelling {
    
    private $id;
    private $klant_id;
    private $artikel_id;
    private $aantal;
    private $status_id;
    private $createdate;
    private $editdate;
    
    public function __construct($id, $klant_id, $artikel_id, $aantal, $status_id, $createdate, $editdate) {
        $this->id = $id;
        $this->klant_id = $klant_id;
        $this->artikel_id = $artikel_id;
        $this->aantal = $aantal;
        $this->status_id = $status_id;
        $this->createdate = $createdate;
        $this->editdate = $editdate;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getKlant_id() {
        return $this->klant_id;
    }

    public function getArtikel_id() {
        return $this->artikel_id;
    }
    
    public function getAantal(){
        return $this->aantal;
    }

    public function getStatus_id() {
        return $this->status_id;
    }

    public function getCreatedate() {
        return $this->createdate;
    }

    public function getEditdate() {
        return $this->editdate;
    }


    public function setKlant_id($klant_id) {
        $this->klant_id = $klant_id;
    }

    public function setArtikel_id($artikel_id) {
        $this->artikel_id = $artikel_id;
    }
    
    public function setAantal($aantal) {
        $this->aantal = $aantal;
    }

    public function setStatus_id($status_id) {
        $this->status_id = $status_id;
    }

    public function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }

    public function setEditdate($editdate) {
        $this->editdate = $editdate;
    }



}