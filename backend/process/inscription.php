<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


    $pass_hache = crypt($_POST["password"], 'rl');
    $passconf_hache = crypt($_POST["passwordconf"], 'rl');


  $user = new utilisateur([
    "username" => $_POST["username"],
    "password" => $pass_hache ,
    "nom" => $_POST["nom"],       //RENTRER VALEUR DANS LES SETTERS
    "prenom" => $_POST["prenom"],
    "passwordconf" => $passconf_hache,
    "mail" => $_POST["mail"]
    ]);



    $man = new manager();
                                   //INSTANCIER

    $man->inscription($user);


} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();


}

if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] !='') {

  header("Location: ../../frontend/view/register.php");
    }




else {

  header("Location: ../../index.php");
}








 ?>
