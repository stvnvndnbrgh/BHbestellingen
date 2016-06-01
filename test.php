<?php
require_once 'Data/ArtikelDAO.php';

$thing = new ArtikelDAO;
$lev = $thing->getAll();
var_dump($lev);
