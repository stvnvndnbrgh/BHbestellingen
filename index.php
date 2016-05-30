<?php
require_once 'Data/ArtikelgroepDAO.php';

$thing = new ArtikelgroepDAO;
$groep = $thing->createArtikelgroep("Wandelstokken");
print_r($groep);