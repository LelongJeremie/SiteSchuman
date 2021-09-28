<?php

require_once '../model/bdd.php';
require_once '../manager/manager.php';




$man = new manager();

$man->deconnexion();        //utilisr la method deconnexion




header("Location: ../../index.php");




 ?>
