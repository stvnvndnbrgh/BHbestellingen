<?php
//mailerpage.php

require_once 'Vendor/vendor/autoload.php';

$m = new PHPMailer();

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;

$m->Host = 'smtp.gmail.com';
$m->Username = 'stvnvndnbrgh@gmail.com';
$m->Password = 'josdenos';
$m->SMTPSecure = 'ssl';
$m->Port = 465;

$m->From = 'stvnvndnbrgh@gmail.com';
$m->FromName = 'Bandagisterie Heverelee';
$m->addReplyTo('info@bandagisterieheverlee.be','Reply address');
$m->addAddress('stvnvndnbrgh@gmail.com', 'Steven van den Berghe');
$m->addCC('stvnvndnbrgh@gmail.com', 'Steven van den Berghe');

$m->Subject = 'Bestelling Bandagisterie Heverlee';
$m->Body = 'Dit is een bestelling';
$m->AltBody = 'Dit is een bestelling';

var_dump($m->send());