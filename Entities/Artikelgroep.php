<?php
//Entities/Artikelgroep.php

class Artikelgroep {
    
    private static $mapId = array();
    
    private $id;
    private $artikelgroepnaam;
    
    public function __construct($id, $artikelgroepnaam) {
        $this->id = $id;
        $this->artikelgroepnaam = $artikelgroepnaam;
    }
    
    public static function create($id, $artikelgroepnaam) {
        if(!isset(self::$mapId[$id])){
            self::$mapId[$id] = new Artikelgroep ($id, $artikelgroepnaam);
        }
        return self::$mapId[$id];
    }
    
    public function getId() {
        return $this->id;
    }

    public function getArtikelgroepnaam() {
        return $this->artikelgroepnaam;
    }

    public function setArtikelgroepnaam($artikelgroepnaam) {
        $this->artikelgroepnaam = $artikelgroepnaam;
    }
}