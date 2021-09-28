<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


    $pass_hache = crypt($_POST["password"], 'rl');




  $user = new utilisateur([
    "username" => $_POST["username"],
    "password" => $pass_hache ,                                                 //METTRE LES VALEUR DANS LE SETTER
    "nom" => $_POST["nom"],
    "prenom" => $_POST["prenom"],
    "mail" => $_POST["mail"],
    "role"=>$_POST["role"],
    ]);



    $man = new manager();


    $man->adminajout($user);                //UTILISER LA METHOD ADMIN AJOUT POUR AJOUTER UN UTTILISATEUR EN TANT QU'ADMIN


} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();

  if ($_SESSION["erreurcase"] == '') {
    header("Location: ../../frontend/view/adminajout.php");
    $_SESSION["erreurcase"] = "reussis";
  }



}
header("Location: ../../frontend/view/adminajout.php");


















 ?>
