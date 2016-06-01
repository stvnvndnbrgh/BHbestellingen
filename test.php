<?php
require_once 'Data/StatusDAO.php';

$thing = new StatusDAO;
$lev = $thing->getAll();
var_dump($lev);
