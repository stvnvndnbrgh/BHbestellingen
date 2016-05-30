<?php
//Entities/Leverancier.php

class Leverancier {
    
    private $id;
    private $leveranciernaam;
    private $email;
    
    public function __construct($id, $leveranciernaam, $email) {
        $this->id = $id;
        $this->leveranciernaam = $leveranciernaam;
        $this->email = $email;
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