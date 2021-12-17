<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


  $user = new utilisateur([
    "titre" => $_POST["titre"],
    "date_event" => $_POST["date_event"],       //RENTRER VALEUR DANS LES SETTERS
    "lieu" => $_POST["lieu"],
    "nb_parti_max"=>$_POST["nb_parti_max"],
    "createur"=>$_POST["createur"],
    "resume"=>$_POST["resume"],
    ]);

    $man = new manager();
                                   //INSTANCIER

    $man->mkevent($user);



} catch (Exception $e) {



}


if (isset($_SESSION["connect"]) and $_SESSION["connect"] =="erreurmkevent" or $_SESSION["connect"] =="erreurevenementexistant" ){

 header("Location: ../../frontend/view/mkevent.php");
}


else {

  header("Location: ../../frontend/view/event.php");
}



 ?>
