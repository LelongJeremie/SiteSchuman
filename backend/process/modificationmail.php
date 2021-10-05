<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


//modification mail par utilisateur
  $user = new utilisateur([

    "mail" => $_POST["mail"],
    "mailmodif" => $_POST["mailmodif"]
    ]);

//instantiation
    $man = new manager();

    $man->modificationmail($user);




} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();



  header("Location: ../../frontend/view/user-profile.php");

}



  header("Location: ../../frontend/view/user-profile.php");








 ?>
