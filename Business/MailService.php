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
    
    public function sendKlantBestellingGeleverd($email){
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
        $m->addAddress($email);
        
        $message = "<p>Beste, </p></br>";
        $message .= "<p>Uw bestelling bij Bandagisterie Heverlee is toegekomen.</p>";
        $message .= "<p>U kan deze afhalen tijdens de openingsuren:</p>";
        $message .= "<table>";
        $message .= "<tr><td>maandag</td><td>Gesloten</td></tr>";
        $message .= "<tr><td>dinsdag</td><td>10:00 - 18:00</td></tr>";
        $message .= "<tr><td>woensdag</td><td>10:00 - 18:00</td></tr>";
        $message .= "<tr><td>donderdag</td><td>10:00 - 18:00</td></tr>";
        $message .= "<tr><td>vrijdag</td><td>10:00 - 18:00</td></tr>";
        $message .= "<tr><td>zaterdag</td><td>10:00 - 14:00</td></tr>";
        $message .= "<tr><td>zondag</td><td>9:00 - 13:00</td></tr>";
        $message .= "</table>";
        $message .= "<p>Met vriendelijke groeten,</p>";
        $message .= "<p>Elke Sleurs</p>";
        
        $m->isHTML(true);
        $m->Subject = 'Bestelling Bandagisterie Heverlee';
        $m->Body = $message;
        $m->AltBody = 'Uw bestelling is toegekomen bij Bandagisterie Heverlee';
        
        $m->send();
    }
}

