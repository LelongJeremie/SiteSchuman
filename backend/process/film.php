<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';


try {




  $ad = new manager();

  $ad->film();                                  // INSTANCIER METHOD FILM 


} catch (Exception $e) {

$_SESSION["erreurcase"] = $e->getMessage();

 $_SESSION['stopfilm']=1;



}

if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] ='') {
   $_SESSION['stopfilm']=1;
    header("Location: ../../frontend/view/reservationfilm.php");
}

else {

 $_SESSION['stopfilm']=1;
  header("Location: ../../frontend/view/reservationfilm.php");}







 ?>
