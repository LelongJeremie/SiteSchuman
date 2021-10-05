<?php

require_once '../model/UTILISATEUR.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {

      $pass_hache = crypt($_POST["password"], 'rl');



//modification du mot de passe par l'utilisateur


  $user = new utilisateur([


    "password" => $pass_hache,




    ]);

  //instantiation
    $man = new manager();

    $man->modificationpasswordoublie($user);



} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();


 //header("Location: ../../index.php");

}
//header("Location: ../../index.php");










 ?>
