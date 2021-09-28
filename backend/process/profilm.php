<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {



//Affichage de tous les utilisateurs pour l'admin


$user = new utilisateur([

  "salleidmodif" => $_POST["modif"],
  ]);


  $man = new manager();

$man->selectfilm($user); // instancie la method qui permet de selectionner le film a reserver



    } catch (Exception $e) {



    header("Location: ../../frontend/view/reservationfilm.php");

    }



  header("Location: ../../frontend/view/reservationfilm.php");

 ?>
