<?php
//Business/KousService.php
require_once 'Data/KousDAO.php';

class KousService {
    public function getKousByProperties($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden){
        $KousDao = new KousDAO();
        $kous = $KousDao->getKousByProperties($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden);
        return $kous;
    }
    public function existBarcode($barcode) {
        $KousDao = new KousDAO();
        $lijst = $KousDao->existBarcode($barcode);
        return $lijst;
    }
    
    public function getKousenOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getAll();
        return $lijst;
    }
    
    public function getKousByBarcode($barcode) {
        $KousDao = new KousDAO();
        $kous = $KousDao->getKousByBarcode($barcode);
        return $kous;
    }
    
    public function voegKousToe($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode){
        $KousDao = new KousDAO();
        $KousDao->createKous($merk, $kwaliteit, $drukklasse, $lengte, $maat, $kleur, $voetgrootte, $bijzonderheden, $bestelcode, $barcode);
    }

    public function getMerkOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getMerkUniek();
        return $lijst;
    }
    
    public function getKwaliteitOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getKwaliteitUniek();
        return $lijst;
    }
    
    public function getDrukklasseOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getDrukklasseUniek();
        return $lijst;
    }
    
    public function getLengteOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getLengteUniek();
        return $lijst;
    }
    
    public function getMaatOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getMaatUniek();
        return $lijst;
    }
    
    public function getKleurOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getKleurUniek();
        return $lijst;
    }
    
    public function getVoetgrootteOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getVoetgrootteUniek();
        return $lijst;
    }
    
    public function getBijzonderhedenOverzicht(){
        $KousDao = new KousDAO();
        $lijst = $KousDao->getBijzonderhedenUniek();
        return $lijst;
    }
}

