<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {



//Affichage de tous les utilisateurs pour l'admin


$user = new utilisateur([

  "idmodif" => $_POST["modif"],
  ]);


  $man = new manager();

$man->selectadmin($user);



    } catch (Exception $e) {



    header("Location: ../../frontend/view/admin.php");

    }



    header("Location: ../../frontend/view/admin.php");

 ?>
