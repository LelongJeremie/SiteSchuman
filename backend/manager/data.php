<?php   public function listeUtilisateur(){
    #Instancie la classe BDD
    $bdd = new BDD();
    $req = $bdd -> co_bdd()->prepare('SELECT * FROM utilisateur');
    $req -> execute([]);
    $listeUtilisateur = $req->fetchall();
    return $listeUtilisateur;
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
 ?>
