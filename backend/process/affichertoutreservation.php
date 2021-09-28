<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


session_start();



$user = new utilisateur([

  "id" => $_SESSION["id"],            //RENTRER LES VALEURS DANS LES SETTERS

  ]);



  $man = new manager();

$man->affichertoutreservation($user);        //UTILISE METHOD QUI TOUT LES FILMS



    } catch (Exception $e) {



    header("Location: ../../frontend/view/reservation.php");

    }



   header("Location: ../../frontend/view/reservation.php");

 ?>
