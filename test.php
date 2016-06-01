<?php
require_once 'Business/BestellingService.php';

$thing = new BestellingService();
$lev = $thing->getBestellingOverzicht();
var_dump($lev);
print("<pre>");
print_r($lev);
print("</pre>");