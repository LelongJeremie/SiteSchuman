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



    } catch (Exception $e) {



    }

    if (  $_SESSION["connect"] =="erreurjoineventplace"  OR $_SESSION["connect"] =="erreurjoinevent" OR   $_SESSION["connect"] =="erreurjoineventorg" OR  $_SESSION["connect"] =="evenementannuler") {


header("Location: ../../frontend/view/event.php");
}

else {
  header("Location: ../../index.php");
}
 ?>
