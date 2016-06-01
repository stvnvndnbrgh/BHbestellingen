<?php
require_once 'Data/LeverancierDAO.php';

$thing = new LeverancierDAO;
$lev = $thing->getByLeveranciernaam("Distrac");
var_dump($lev);
