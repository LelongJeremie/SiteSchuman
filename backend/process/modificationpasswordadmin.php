<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {

      $pass_hache = crypt($_POST["password"], 'rl');

//Changement mdp par admin

  $user = new utilisateur([



    "password" => $pass_hache




    ]);

//instantiation
    $man = new manager();

$man->modificationpasswordadmin($user);




} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();



  header("Location: ../../frontend/view/admin.php");

}
  header("Location: ../../frontend/view/admin.php");










 ?>
