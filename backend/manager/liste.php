<?php

public function deleteUtilisateur(utilisateur $utilisateur) {
  $bdd = new BDD();
  $req = $bdd->co_bdd()->prepare('DELETE FROM utilisateur
    WHERE nom = :nom
  ');
  $res = $req->execute([
    'nom' => $user->getnom()
  ]);

  if ($res) {
    header("Location: ../index.php");
  }
  else {
    header("Location: ../vue/Accueil.php");
    throw new Exception("Suppression échouée !");
  }
}
 ?>
