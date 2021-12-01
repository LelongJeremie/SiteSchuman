<?php
include('functions.php');
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Validation d'email</title>
      <meta charset="UTF-8" />
      <meta language="FR" />
    </head>
    <body>
    <?php
      $uuid = $_GET['uuid'];
      $pseudo = $_GET['pseudo'];
      $bdd = bdd_connect();
      $query = $bdd->prepare('SELECT uuid FROM mail_verif WHERE pseudo = :pseudo');
      $query->execute(array('pseudo' => $pseudo));
      $reponse_uuid = $query->fetchColumn();
      if ($uuid = $reponse_uuid) {
        $query_2 = $bdd->prepare('UPDATE chat_accounts SET mail_verif = 1 WHERE account_login = :pseudo')
        $query_2->execute(array('pseudo' => $pseudo));
        $query_3 = $bdd-prepare('DELETE FROM mail_verif WHERE pseudo = :pseudo');
        $query_3->execute(array('pseudo' => $pseudo));
        echo '<span id="mail_ok">Votre e-mail � bien �t� v�rifi�, Votre compte � �t� cr�e ! <a href="../../frontend/view/chat.php">Accueil</a></span>';
        }
       else {
        echo 'Erreur';
        }
      ?>
