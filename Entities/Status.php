<?php
//Entities/Status.php

class Status {
    
    private static $mapId = array();

    private $id;
    private $status;
    
    public function __construct($id, $status) {
        $this->id = $id;
        $this->status = $status;
    }
    
    public static function create($id, $status) {
        if(!isset(self::$mapId[$id])) {
            self::$mapId[$id] = new Status($id, $status);
        }
        return self::$mapId[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }



}