<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {



//Affichage de tous les utilisateurs pour l'admin

$user = new utilisateur([

  "idmodif" => $_POST["idmodif"],

  ]);


  $man = new manager();

$man->cmptrendu($user);


    } catch (Exception $e) {


header("Location: ../../backend/process/rdv.php");
    }


header("Location: ../../backend/process/rdv.php");

 ?>
