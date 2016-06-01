<?php
require_once 'Data/BestellingDAO.php';

$thing = new BestellingDAO;
$lev = $thing->getAll();
var_dump($lev);
print("<pre>");
print_r($lev);
print("</pre>");