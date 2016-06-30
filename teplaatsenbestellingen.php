<?php
//teplaatsenbestellingen.php
session_start();
require_once 'Business/BestellingService.php';

$bestelSvc = new BestellingService();
$lijst = $bestelSvc->getLeverancierTeBestellenLijst();
include 'Presentation/LeverancierLijstTePlaatsenBestellingen.php';