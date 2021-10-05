<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';


try {

  $user = new utilisateur([
    "mail" => $_GET["mail"],             //RENTRER LES VALEURS DANS LES SETTERS

  ]);

  $man = new manager();

  $mail_hache = crypt($_GET["mail"], 'rl');


  $man->mailmdp($user);        //utilise la method connexion


} catch (Exception $e) {




}



if (  $_SESSION["connect"] == "3") {
header("Location: ../../index.php");
} else {
  $_SESSION["connect"] = "5";

header("Location: ../../frontend/view/demandemdp.php");
}












 ?>
