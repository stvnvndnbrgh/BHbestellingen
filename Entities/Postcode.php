<?php
//Entities/Postcode.php

class Postcode {
    
    private static $mapId = array();
    
    private $id;
    private $postcode;
    private $gemeente;
    
    public function __construct($id, $postcode, $gemeente) {
        $this->id = $id;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
    }
    
    public static function create($id, $postcode, $gemeente) {
        if(!isset(self::$mapId[$id])){
            self::$mapId[$id] = new Postcode($id, $postcode, $gemeente);
        }
        return self::$mapId[$id];
    }
    //getters
    public function getId() {
        return $this->id;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getGemeente() {
        return $this->gemeente;
    }
    //setters
    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function setGemeente($gemeente) {
        $this->gemeente = $gemeente;
    }
}