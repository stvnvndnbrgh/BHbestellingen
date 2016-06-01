<?php
require_once 'Data/ArtikelDAO.php';

$thing = new ArtikelDAO;
$thing->createArtikel("Karo", 5, 123456789123457, 10);
//var_dump($lev);
