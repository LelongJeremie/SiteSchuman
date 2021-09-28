<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';


try {

$pass_hache = crypt($_POST["password"], 'rl');
  $user = new utilisateur([
    "username" => $_POST["username"],             //RENTRER LES VALEURS DANS LES SETTERS
    "password" =>$pass_hache ,
  ]);



  $man = new manager();

  $man->connexion($user);        //utilise la method connexion


} catch (Exception $e) {

$_SESSION["erreurcase"] = $e->getMessage();





}

if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] !='') {
    header("Location: ../../frontend/view/login.php");
}

else {


  header("Location: ../../index.php");
}







 ?>
