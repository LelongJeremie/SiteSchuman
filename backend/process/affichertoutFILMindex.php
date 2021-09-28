<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {






$user = new utilisateur([

  "nomfilm" => $_POST["nomfilm"],            //RENTRER LES VALEURS DANS LES SETTERS

  ]);



  $man = new manager();
 $_SESSION['stop']=4;
$man->affichertoutfilm($user);        //UTILISE METHOD QUI TOUT LES FILMS



    } catch (Exception $e) {



    header("Location: ../../index.php");

    }



    header("Location: ../../index.php");

 ?>
