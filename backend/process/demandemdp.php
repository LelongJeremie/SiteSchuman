<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';


try {

  $user = new utilisateur([
    "mail" => $_POST["mail"],             //RENTRER LES VALEURS DANS LES SETTERS

  ]);



  $man = new manager();

  $man->demandemdp($user);        //utilise la method connexion


} catch (Exception $e) {

$_SESSION["erreurcase"] = $e->getMessage();





}

if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] !='') {
    header("Location: ../../frontend/view/demandemdp.php");
}

else {


  header("Location: ../../index.php");
}







 ?>
