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
    "mail" => $_POST["mail"],
    "date_naissance" => $_POST["date_naissance"],
    "role"=>$_POST["role"]
    ]);



    $man = new manager();
                                   //INSTANCIER

    $man->inscription($user);
    $man->mail($user);



} catch (Exception $e) {

$_SESSION["connect"] ="7";

}

if (isset($_SESSION["connect"]) and $_SESSION["connect"] =="7") {

 header("Location: ../../frontend/view/register.php");
}




else {

header("Location: ../../index.php");
}








 ?>
