<?php
//Business/MailService.php
require_once 'Vendor/vendor/autoload.php';
require_once 'Data/LeverancierDAO.php';

class MailService {
    public function sendLeverancierBestelling($leverancier_id, $message){
        $levDao = new LeverancierDAO();
        $lev = $levDao->getById($leverancier_id);
        
        
        $m = new PHPMailer();

        $m->isSMTP();
        $m->SMTPAuth = true;
        //$m->SMTPDebug = 2;

        $m->Host = 'smtp.gmail.com';
        $m->Username = 'stvnvndnbrgh@gmail.com';
        $m->Password = 'josdenos';
        $m->SMTPSecure = 'ssl';
        $m->Port = 465;

        $m->From = 'stvnvndnbrgh@gmail.com';
        $m->FromName = 'Bandagisterie Heverlee';
        $m->addReplyTo('info@bandagisterieheverlee.be','Reply address');
        $m->addAddress($lev->getEmail(), $lev->getLeveranciernaam());

        //$m->addAttachment('img/edit.png', 'prentje');

        $m->isHTML(true);
        $m->Subject = 'Bestelling Bandagisterie Heverlee';
        $m->Body = $message;
        $m->AltBody = 'Dit is een bestelling';

        var_dump($m->send());
        
    }
    
    public function sendKlantBestellingGeleverd(){
        
    }
}

