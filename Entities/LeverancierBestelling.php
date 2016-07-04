<?php
//Entities/LeverancierBestelling.php

Class LeverancierBestelling {
    
    private static $mapId = array();
    
    private $id;
    private $leverancier_id;
    private $besteldatum;
    
    public function __construct($id, $leverancier_id, $besteldatum) {
        $this->id = $id;
        $this->leverancier_id = $leverancier_id;
        $this->besteldatum = $besteldatum;
    }
    
    public static function create($id, $leverancier_id, $besteldatum) {
        if(!isset(self::$mapId[$id])){
            self::$mapId[$id] = new LeverancierBestelling($id, $leverancier_id, $besteldatum);
        }
        return self::$mapId[$id];
    }
    //getters
    public function getId() {
        return $this->id;
    }

    public function getLeverancier_id() {
        return $this->leverancier_id;
    }

    public function getBesteldatum() {
        return $this->besteldatum;
    }

    //setters
    public function setLeverancier_id($leverancier_id) {
        $this->leverancier_id = $leverancier_id;
    }

    public function setBesteldatum($besteldatum) {
        $this->besteldatum = $besteldatum;
    }


    
}