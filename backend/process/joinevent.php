<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {



//Affichage de tous les utilisateurs pour l'admin

$user = new utilisateur([

  "idmodif" => $_POST["idevent"],
  'id'=>$_POST["id"],
  ]);


  $man = new manager();

$man->joinevent($user);


$_SESSION["connect"] = "event";

    } catch (Exception $e) {



   header("Location: ../../frontend/view/event.php");

    }



 header("Location: ../../frontend/view/event.php");

 ?>
