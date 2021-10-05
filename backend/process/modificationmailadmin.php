<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {

//modification mail par admin

  $user = new utilisateur([

    "mail" => $_POST["mail"],

    ]);

//instantiation

    $man = new manager();

    $man->modificationmailadmin($user);




} catch (Exception $e) {
  $_SESSION["erreurcase"] = $e->getMessage();



  header("Location: ../../frontend/view/admin.php");

}



  header("Location: ../../frontend/view/admin.php");








 ?>
