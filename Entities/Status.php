<?php
//Entities/Status.php

class Status {
    
    private static $mapId = array();

    private $id;
    private $status;
    private $color;
    
    public function __construct($id, $status, $color) {
        $this->id = $id;
        $this->status = $status;
        $this->color = $color;
    }
    
    public static function create($id, $status, $color) {
        if(!isset(self::$mapId[$id])) {
            self::$mapId[$id] = new Status($id, $status, $color);
        }
        return self::$mapId[$id];
    }
    
    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getColor() {
        return $this->color;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setColor($color) {
        $this->color = $color;
    }



    
}