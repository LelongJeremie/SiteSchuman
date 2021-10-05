<?php

require_once '../model/UTILISATEUR.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {

      $pass_hache = crypt($_POST["password"], 'rl');
      $passmodif_hache = crypt($_POST["passwordmodif"], 'rl');
      $passconf_hache = crypt($_POST["passwordmodifconf"], 'rl');


//modification du mot de passe par l'utilisateur


  $user = new utilisateur([

    "typemodif" => $_POST["typemodif"],
    "password" => $pass_hache,
    "passwordmodif" => $passmodif_hache,
    "passwordmodifconf" =>   $passconf_hache,



    ]);

  //instantiation
    $man = new manager();

    $man->modificationpassword($user);



} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();


 header("Location: ../../frontend/view/user-profile.php");

}
header("Location: ../../frontend/view/user-profile.php");










 ?>
