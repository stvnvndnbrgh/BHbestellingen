<?php
require_once 'Data/PostcodeDAO.php';

$thing = new PostcodeDAO;
$lijst = $thing->getById(66);
var_dump($lijst);
$lijst = $thing->getByPostcode(1360);
var_dump($lijst);
$lijst = $thing->getByGemeente('Thorembais-Saint-Trond');
var_dump($lijst);
$lijst = $thing->getCountOfPC(280);
var_dump($lijst);