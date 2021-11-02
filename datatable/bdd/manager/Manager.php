<?php
require_once 'C:\wamp64\www\datatable\bdd\bdd.php';


class Manager {
  private $titre;
private $date;
private $lieu;
private $createur;
private $resume;
private $nb_participant;






  public function listeEvenement(){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM evenement');
    $req -> execute([]);
    $listeEvenement= $req->fetchall();
    return $listeEvenement;
  }



  public function supprimer($nom){
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM utilisateur');
    $req = $bdd->getbdd()->prepare('DELETE FROM utilisateur WHERE nom = :nom');
    $res = $req->execute(array('nom'=>$nom));


    if ($res){
        $_SESSION['nom'] = $res['nom'];
        header('Location: ../index.php');
    }

}



}
