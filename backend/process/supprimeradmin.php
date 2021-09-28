<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';

//Suppression utilisateur par admin

try {

session_start();

  $user = new utilisateur([
    "id" =>   $_SESSION['idadminmodif'],

  ]);

//instantiation methode suppression
  $man = new manager();

  $man->supprimeradmin($user);


} catch (Exception $e) {


header("Location: ../../backend/process/admin.php");

}

header("Location: ../../backend/process/admin.php");







 ?>
