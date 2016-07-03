<?php
//mailerpage.php

require_once 'Vendor/vendor/autoload.php';

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
$m->addAddress('stvnvndnbrgh@gmail.com', 'Steven van den Berghe');

//$m->addAttachment('img/edit.png', 'prentje');

//$m->isHTML(true);
$lev = 'Distrac';
$m->Subject = 'Bestelling Bandagisterie Heverlee';
$m->Body = 'hallo ' . $lev;
$m->AltBody = 'Dit is een bestelling';

var_dump($m->send());