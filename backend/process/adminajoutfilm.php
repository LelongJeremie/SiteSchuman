<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {

  $user = new utilisateur([

    "SALLENomfilm" => $_POST["sallenomfilm"],
    "salleplace" => $_POST["salleplace"],               //RENTRER LES VALEURS DANS LES SETTERS
    "description" => $_POST["description"],
    "image" => $_POST["image"],
    "theme" => $_POST["theme"],
    "troisd" => $_POST["troisd"],

    ]);



    $man = new manager();


    $man->adminajoutfilm($user);      //UTILISE LA METHOD AJOUT FILM QUI AJOUTE UN FILM


} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();

  if ($_SESSION["erreurcase"] == '') {
    var_dump($user);
    header("Location: ../../frontend/view/adminajoutfilm.php");
    $_SESSION["erreurcase"] = "reussis";
  }



}

header("Location: ../../frontend/view/adminajoutfilm.php");




 ?>
