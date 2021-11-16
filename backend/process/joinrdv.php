<?php


require_once '../model/utilisateur.php';
require_once '../model/bdd.php';
require_once '../manager/manager.php';

try {



//Affichage de tous les utilisateurs pour l'admin


$user = new utilisateur([

  "idmodif" => $_POST["idmodif"],
  'id'=>$_POST["id"],
    'nom'=>$_POST["nom"],
      'prenom'=>$_POST["prenom"],
      'date_event'=>$_POST["date"],
  ]);


  $man = new manager();

$man->selectrdv($user);




    } catch (Exception $e) {






    }
if (isset($_SESSION["connect"]) and $_SESSION["connect"] ='joinrdv') {


 header("Location: ../../frontend/view/rdv.php");
}

else{    header("Location: ../../frontend/view/rejoindrerdv.php");         }
 ?>
