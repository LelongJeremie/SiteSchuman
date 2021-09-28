<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


//Modification prenom par utilisateur

  $user = new utilisateur([


    "nom" => $_POST["nom"],
    "prenom" => $_POST["prenom"],

    ]);


//instantiation
    $man = new manager();

    $man->modificationnomprenom($user);




} catch (Exception $e) {

  $_SESSION["erreurcase"] = $e->getMessage();




  header("Location: ../../frontend/view/user-profile.php");
}

header("Location: ../../frontend/view/user-profile.php");










 ?>
