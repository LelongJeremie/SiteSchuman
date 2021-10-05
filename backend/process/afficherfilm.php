<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {






$user = new utilisateur([

  "filmnom" => $_POST["FilmNom"],                  //RENTRER LES VALEURS DANS LES SETTERS

  ]);


  $man = new manager();
 $_SESSION['stop']=4;
$man->afficherfilm($user);         //UTILISE METHOD QUI AFFICHE FILM CHOISIS



    } catch (Exception $e) {



   header("Location: ../../frontend/view/categoriefilm.php");

    }



   header("Location: ../../frontend/view/categoriefilm.php");

 ?>
