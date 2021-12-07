<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {





  $user = new utilisateur([
    "id" => $_POST["id"],
    "nom" => $_POST["nom"],       //RENTRER VALEUR DANS LES SETTERS
    "prenom" => $_POST["prenom"],
    "date_naissance" => $_POST["date_naissance"],

    ]);



    $man = new manager();
                                   //INSTANCIER

    $man->liaison($user);



} catch (Exception $e) {



}

if (isset($_SESSION["connect"]) and $_SESSION["connect"] =="erreurfamille") {

 header("Location: ../../frontend/view/liaison.php");
}




else {

header("Location: ../../index.php");
}








 ?>
