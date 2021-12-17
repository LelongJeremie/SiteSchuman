<?php

require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {


    $pass_hache = crypt($_POST["password"], 'rl');



  $user = new utilisateur([
    "username" => $_POST["username"],
    "password" => $pass_hache ,
    "nom" => $_POST["nom"],       //RENTRER VALEUR DANS LES SETTERS
    "prenom" => $_POST["prenom"],
    "mail" => $_POST["mail"],
    "date_naissance" => $_POST["date_naissance"],
    "role"=>$_POST["role"]
    ]);



    $man = new manager();
                                   //INSTANCIER

    $man->adminajout($user);



} catch (Exception $e) {

$_SESSION["connect"] ="erreuradminajout";

}

if (isset($_SESSION["connect"]) and $_SESSION["connect"] =="erreuradminajout") {

 header("Location: ../../frontend/view/adminajout.php");
}

else {

header("Location: ../../index.php");
}
 ?>















 ?>
