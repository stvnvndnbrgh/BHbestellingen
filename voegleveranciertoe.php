<?php
//voegleveranciertoe.php
session_start();
require_once 'Business/LeverancierService.php';

if(isset($_GET['action']) && $_GET['action'] == "nieuweleverancier"){
    $levSvc = new LeverancierService();
    $levSvc->voegLeverancierToe($_POST['txtLeverancier'], $_POST['txtEmail']);
    header("location:toonallebestellingen.php");
}
include("Presentation/nieuweLeverancierForm.php");

