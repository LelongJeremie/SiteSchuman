<?php

require_once '../model/utilisateur.php';

require_once '../model/bdd.php';
require_once '../manager/manager.php';


try {




  $ad = new manager();

  $ad->afficherprof();                                  // INSTANCIER METHOD ADMIN


} catch (Exception $e) {

$_SESSION["erreurcase"] = $e->getMessage();

 $_SESSION['stop']=3;



}

if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] ='') {
   $_SESSION['stop']=3;
    header("Location: ../../frontend/view/rejoindrerdv.php");
}

else {

 $_SESSION['stop']=3;
 header("Location: ../../frontend/view/rejoindrerdv.php");}







 ?>
