<?php

require_once '../model/bdd.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require LES Fonction de php mailer
// Load Composer's autoloader
require '../../vendor/autoload.php';

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

class manager{
  private $dbh;

  public function connexion($a){
    session_start();
    $this->dbh = new bdd();

    if($a->getUsername() =='' and $a->getPassword() =="rlFROk.yJKhMM" ){
      throw new Exception("toutecasevide",1);

    }

    if($a->getUsername() ==''){                                   //VERIFIER SI LES CASES SONT VIDES
      throw new Exception("uservide",1);

    }

    if($a->getPassword() =="rlFROk.yJKhMM"){
      throw new Exception("passwordvide",1);

    }



    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username =:username AND password=:password AND validation =1");
    $req->execute(array(
      'username'=> $a->getUsername(),
      'password'=> $a->getPassword()
    ));                                          //VOIR SI UN UTILISATEUR EXISTE ET LE CONNECTER

    $res = $req->fetch();


    if ($res) {

      $_SESSION['id'] = $res["id"];
      $_SESSION['nom'] = $res["nom"];
      $_SESSION['prenom'] = $res["prenom"];
      $_SESSION['role'] = $res["role"];
      $_SESSION['username'] = $res["username"];


      $_SESSION['connect'] ="1";

    }


if (!$res) {
  $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username =:username AND password=:password AND validation =0");
  $req->execute(array(
    'username'=> $a->getUsername(),
    'password'=> $a->getPassword()
  ));                                          //VOIR SI UN UTILISATEUR EXISTE ET LE CONNECTER

  $rev = $req->fetch();


  $_SESSION["connect"]="comptepasactive";


  if (!$rev) {
    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username =:username AND password=:password AND validation =2");
    $req->execute(array(
      'username'=> $a->getUsername(),
      'password'=> $a->getPassword()
    ));                                          //VOIR SI UN UTILISATEUR EXISTE ET LE CONNECTER

    $reb = $req->fetch();

    $_SESSION["connect"]="comptedesactive";


    if (!$reb) {

echo "string";
     throw new Exception("toutecasevide",1);




    }

  }


}






  }

  public function demandemdp($a){
    session_start();
    $this->dbh = new bdd();


    if($a->getMail() ==''){                                   //VERIFIER SI LES CASES SONT VIDES
      throw new Exception("mail",1);

    }


    $res = $this->dbh->getBase()->prepare("SELECT * from utilisateur where mail =:mail");
    $res->execute(array(
      'mail'=> $a->getMail(),

    ));                                          //VOIR SI UN UTILISATEUR EXISTE ET LE CONNECTER

     $res->fetch();


    if ($res) {



  $_SESSION['connect'] ="3";
    }

    else {

      throw new Exception("vide",1);
      $_SESSION["erreurmail"] = "1";
    }

  }

  public function mailmdp($a){
session_start();
    //PHP MAILER
    //Instantiation and passing `true` enables exceptions

    $this->dbh = new bdd();


    if($a->getMail() ==''){                                   //VERIFIER SI LES CASES SONT VIDES
      throw new Exception("casemailvide",1);

    }


    $res = $this->dbh->getBase()->prepare("SELECT * from utilisateur where mail =:mail");
    $res->execute(array(
      'mail'=> $a->getMail(),

    ));                                          //VOIR SI UN UTILISATEUR EXISTE ET LE CONNECTER

  $req= $res->fetch();


$token=rand(222,5432134564321);

$token_hache = crypt($token, 'rl');

$rem = $this->dbh->getBase()->prepare("UPDATE utilisateur SET token= :token WHERE mail =:mail");
$rem->execute(array(
  'mail'=> $a->getMail(),
  'token' => $token_hache,

));


    if ($rem) {
        $_SESSION["connect"] = "3";



          $mail = new PHPMailer(true);

          try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'phpmailerdugny@gmail.com';                     // SMTP username
            $mail->Password   = 'Mailer1234';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above

            //Recipients
            $mail->setFrom('phpmailerdugny@gmail.com', 'NE PAS REPONDRE');
            $mail->addAddress( $a->getMail() , $a->getNom());     // Add a recipient
            $mail->addReplyTo('phpmailerdugny@gmail.com', 'NE PAS REPONDRE');

            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            //$mail->isHTML(true);           ""<a href=\"http://localhost/LELONG_PHP/SiteSchuman/SiteSchuman/index.php\" class='button'>Lien du site</a>";                       // Set email format to HTML
            $mail->Subject = 'demandemdp ';
            $mail->Body   = "<a href=\"http://localhost/TABTI/SiteSchuman/frontend/view/motdepasseoublie.php?token=".$token_hache."\" class='button'>Changer votre mot de passe</a>";
            $mail->AltBody = 'demandemdp!';

            $mail->send();
            echo "Message has been sent";
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }


    }

    else {

      throw new Exception("vide",1);
      $_SESSION["connect"] = "5";
    }



  }


  public function deconnexion()
  {
    session_start();

    session_destroy();                //DETRUITE LA SESSION DONC Deconnexion

    header("Location: ../../index.php");
  }


  public function inscription($a)
  {
    session_start();



    $this->dbh = new bdd();
    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username=:username or mail = :mail ");
    $req->execute(array(
      'username'=> $a->getUsername(),
      'mail'=>$a->getMail(),
    ));

    $res = $req->fetch();


    if ($res) {
      throw new Exception("util");

    }



    else {
      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("INSERT INTO utilisateur (nom,prenom,username,password,role,mail,date_naissance,validation) values (:nom,:prenom,:username,:password,:role,:mail,:date_naissance,0)");          // verifier si un utilisateur et l'inscrire si il existe
      $req->execute(array(
        'nom'=>$a->getNom(),
        'prenom'=>$a->getPrenom(),
        'username'=> $a->getUsername(),
        'password'=> $a->getPassword(),
        'mail' =>  $a->getMail(),
        'date_naissance' => $a->getDate_naissance(),
        'role'=>$a->getRole(),
      ));



      $_SESSION['connect'] ="2";

    }


  }



  public function mail($a){  //PHP MAILER
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->CharSet = 'UTF-8';
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'phpmailerdugny@gmail.com';                     // SMTP username
      $mail->Password   = 'Mailer1234';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above

      //Recipients
      $mail->setFrom('phpmailerdugny@gmail.com', 'NE PAS REPONDRE');
      $mail->addAddress( $a->getMail() , $a->getNom());     // Add a recipient
      $mail->addReplyTo('phpmailerdugny@gmail.com', 'NE PAS REPONDRE');
      // Attachments
      //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      //$mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Bienvenue ! ';
      $mail->Body   = "<a href=\"http://localhost/TABTI/SiteSchuman/index.php\" class='button'>Lien du site</a>";
      $mail->AltBody = 'Bienvenue sur le site du Lycée de Dugny!';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }





  public function modification($a)
  {
    session_start();

    if($a->getTypemodif()=='changermail'){

      if ($a->getMail()=='' and $a->getMailmodif()=='' ) {
        throw new Exception("toutecasemailvide");       //VERIFIER SI UNE case VIDE
      }

      if ($a->getMail()=='' ) {
        throw new Exception("casemailvide");
      }

      if ($a->getMailmodif()=='' ) {
        throw new Exception("casemailmodifvide");
      }

      else {

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where mail=:mail ");
        $req->execute(array(
          'mail'=> $a->getMail(),
        ));

        $res = $req->fetch();

        if ($res) {

          $this->dbh = new bdd();
          $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set mail = :mailmodif where where mail = :mail ");
          $req->execute(array(
            'mail'=> $a->getMail(),
            'mailmodif'=> $a->getMailmodif(),

          ));



        }

      }

    }

    if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()=='' and  $a->getPasswordconf()=='' ){
      throw new Exception("toutecasevide");

    }
    if($a->getNom() ==''){
      throw new Exception("nomvide");
    }

    if($a->getPrenom() ==''){
      throw new Exception("prenomvide");
    }


    if($a->getUsername() ==''){
      throw new Exception("uservide");

    }

    if($a->getPassword() ==''){
      throw new Exception("passwordvide");
    }

    if($a->getPasswordconf() ==''){
      throw new Exception("passwordconfvide");
    }

    if ($a->getPassword()!=$a->getPasswordconf()){
      throw new Exception("correspondpas");
    }



    $this->dbh = new bdd();
    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username=:username ");
    $req->execute(array(
      'username'=> $a->getUsername(),
    ));

    $res = $req->fetch();

    if ($res) {
      throw new Exception("Error utilisateur deja existant");

    }


    else {

      $this->dbh = new bdd();






    }


  }






  public function modificationnomprenom($a)
  {
    session_start();


    if ($a->getNom()=='' and $a->getPrenom()=='' ) {           //MODIFIER LE PRENOM ET LE NOM
      throw new Exception("caseprenomvide");
    }

    if ($a->getNom()=='' ) {

      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set prenom = :prenom where id = :id ");
      $req->execute(array(
        'id'=> $_SESSION['id'],
        'prenom'=> $a->getPrenom(),


      ));

      $_SESSION['prenom'] = $a->getPrenom();

    }

    elseif ($a->getPrenom()=='' ) {


      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set nom = :nom where id = :id ");
      $req->execute(array(
        'id'=> $_SESSION['id'],
        'nom'=> $a->getNom(),

      ));
      $_SESSION['nom'] = $a->getNom();
    }





    else {

      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set nom = :nom , prenom = :prenom where id = :id ");
      $req->execute(array(
        'id'=> $_SESSION['id'],
        'prenom'=> $a->getNom(),
        'nom' => $a->getPrenom(),
      ));
      $_SESSION['prenom'] = $a->getPrenom();
      $_SESSION['nom'] = $a->getNom();
    }

  }




  public function modificationmail($a)  //MODIFIER LE MAIL
  {
    session_start();


    if ($a->getMail()=='' and $a->getMailmodif()=='' ) {
      throw new Exception("toutecasemailvide");
    }

    if ($a->getMailmodif()=='' ) {
      throw new Exception("mailmodifvide");
    }

    if ($a->getMail()=='') {
      throw new Exception("mailvide");
    }

    else {

      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where mail=:mail ");
      $req->execute(array(
        'mail'=> $a->getMail(),
      ));


      $res = $req->fetch();

      if ($res) {

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set mail = :mail where id = :id ");
        $req->execute(array(
          'id'=> $_SESSION['id'],
          'mail'=> $a->getMailmodif(),


        ));
$_SESSION['connect'] ="modif";
      }


      else {
        throw new Exception("mailvide");
      }

    }

  }


  public function modifadmin($a)  //MODIFIER LE ROLE ADMIN D'UN UTILISATEUR
  {
    session_start();


    $this->dbh = new bdd();
    $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set role = :role where id = :id ");
    $req->execute(array(
      'id'=> $a->getIdmodif(),
      'role' => $a->getRole(),


    ));



  }







  public function admin(){          //POUR AFFICHER LES UTILISATEURS
    session_start();
    $this->dbh = new bdd();


    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur");
    $req->execute(array());

    $res = $req->fetchall();


    if ($res) {

      $_SESSION["res"] = $res;


    }

    else {

      throw new Exception("Erreur",1);





    }}



    public function selectadmin($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id");
      $req->execute(array(
        'id' => $a->getIdmodif(),

      ));

      $res = $req->fetch();


      if ($res) {

        $_SESSION['idadminmodif'] = $res["id"];
        $_SESSION['nomadminmodif'] = $res["nom"];
        $_SESSION['prenomadminmodif'] = $res["prenom"];
        $_SESSION['roleadminmodif'] = $res["role"];
        $_SESSION['usernameadminmodif'] = $res["username"];
        $_SESSION['passwordadminmodif'] = $res["password"];
        $_SESSION['mailadminmodif'] = $res["mail"];

        $_SESSION["connect"] = "adminmodal";



      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }

    }

      public function annulerevent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $this->dbh = new bdd();
$today = date("Y-m-d");
      $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      if ($res["validationevent"] == "3" ) {
        $_SESSION["connect"] = "annulerevent2";

      }

    elseif ($today != $res["date_event"] ) {

      $rea = $this->dbh->getBase()->prepare("UPDATE evenement SET validationevent = 3 WHERE id=:id_evenement");
      $rea->execute(array(
        'id_evenement'=>$a->getIdmodif(),

      ));

$_SESSION["connect"] = "annulerevent";
      }

      else {
        $_SESSION["connect"] = "erreurannulerevent";
      }

    }

    public function desactivationutilisateur($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
    session_start();
    $this->dbh = new bdd();

    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id");
    $req->execute(array(
        'id' => $a->getIdmodif(),
      ));

    $res = $req->fetch();

    if ($res["validation"] == "2" ) {
      $_SESSION["connect"] = "desactivation2";

    }

  else  {

    $rea = $this->dbh->getBase()->prepare("UPDATE utilisateur SET validation = 2 WHERE id=:id_modif");
    $rea->execute(array(
      'id_modif'=>$a->getIdmodif(),

    ));

$_SESSION["connect"] = "desactivation";
    }


  }


  public function activationutilisateur($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
  session_start();
  $this->dbh = new bdd();

  $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id");
  $req->execute(array(
      'id' => $a->getIdmodif(),
    ));

  $res = $req->fetch();

  if ($res["validation"] == "1" ) {
    $_SESSION["connect"] = "activation2";

  }

else  {

  $rea = $this->dbh->getBase()->prepare("UPDATE utilisateur SET validation = 1 WHERE id=:id_modif");
  $rea->execute(array(
    'id_modif'=>$a->getIdmodif(),

  ));

$_SESSION["connect"] = "activation";
  }


}

    public function annulerrdv($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
    session_start();
    $this->dbh = new bdd();
  $today = date("Y-m-d");
  $ntoday = strtotime($today);


    $req = $this->dbh->getBase()->prepare("SELECT * from rdv where id = :id");
    $req->execute(array(
        'id' => $a->getIdmodif(),
      ));

    $res = $req->fetch();

    $vdate = strtotime($res["date_rdv"]);


    if ($res["validationrdv"] == "0" ) {
      $_SESSION["connect"] = "annulerrdv2";

    }

  elseif ($ntoday > $vbase ) {

    $rea = $this->dbh->getBase()->prepare("UPDATE rdv SET validationrdv = 4 WHERE id=:id_evenement");
    $rea->execute(array(
      'id_evenement'=>$a->getIdmodif(),

    ));

  $_SESSION["connect"] = "annulerrdv";
    }

    else {
      $_SESSION["connect"] = "erreurannulerrdv";
    }

  }


    public function valideevent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
    session_start();
    $this->dbh = new bdd();

    $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
    $req->execute(array(
        'id' => $a->getIdmodif(),
      ));

    $res = $req->fetch();

    if ($res["validationevent"] == "1" ) {
      $_SESSION["connect"] = "valideevent1";

    }

  else {

    $rea = $this->dbh->getBase()->prepare("UPDATE evenement SET validationevent = 1 WHERE id=:id_evenement");
    $rea->execute(array(
      'id_evenement'=>$a->getIdmodif(),

    ));

$_SESSION["connect"] = "valideevent";
    }


  }

    public function selectevent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      $rem = $this->dbh->getBase()->prepare("SELECT DISTINCT nom,prenom FROM utilisateur INNER JOIN participant ON participant.id_participant = utilisateur.id WHERE id_evenement = :id");
      $rem->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $rel = $rem->fetchall();

      $rej = $this->dbh->getBase()->prepare("SELECT DISTINCT nom,prenom FROM utilisateur INNER JOIN organisateur ON organisateur.id_utilisateur = utilisateur.id WHERE id_event = :id");
      $rej->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $ren = $rej->fetchall();



if ($rel == NULL) {
 $rel = 1;
}

      if ($res AND $ren AND $rel) {


                $_SESSION['idevent'] = $res["id"];
                $_SESSION["date_event"] = $res["date_event"];
                $_SESSION["lieu"] = $res["lieu"];
                $_SESSION["createur"] = $res["createur"];
                $_SESSION["resume"] = $res["resume"];
                $_SESSION["validationevent"] = $res["validationevent"];
                $_SESSION["nb_participant"] = $res["nb_participant"];
                $_SESSION["nb_parti_max"] = $res["nb_parti_max"];
                $_SESSION["participantevent"] =$rel;
                $_SESSION["organisateurevent"] = $ren;






        $_SESSION["connecte"] = "eventmodal";



      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }}

      public function selectrdv2($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
        session_start();
        $_SESSION['ok'] = 1;
        $this->dbh = new bdd();


        $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id");
        $req->execute(array(
            'id' => $a->getIdmodif(),
          ));

        $res = $req->fetch();

        if ($res ) {


                  $_SESSION['idevent'] = $res["id"];








          $_SESSION["connecte"] = "rdvmodal";



        }

        else {

          throw new Exception("Erreur dans select admin",1);



        }

    }

    public function compterendu($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from rdv where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      if ($res ) {

        $req = $this->dbh->getBase()->prepare("UPDATE rdv SET compterendu = :texte WHERE rdv.id = :id");
        $req->execute(array(
            'id' => $a->getIdmodif(),
            'texte' => $a->getTexte(),
          ));



                $_SESSION['idmesrdv'] = $res["id"];




if ($req) {
  $_SESSION["connect"] = "compterendu";
}

else {
    $_SESSION["connect"] = "erreurcompterendu";
}

      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }

  }



    public function selectmesrdv($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from rdv where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      if ($res ) {


                $_SESSION['idmesrdv'] = $res["id"];



        $_SESSION["connecte"] = "mesrdvmodal";



      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }

  }

    public function selectrdv2parent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      if ($res ) {


                $_SESSION['idevent'] = $res["id"];








        $_SESSION["connecte"] = "rdvmodal";



      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }

  }


    public function deletevent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
      $req->execute(array(
          'id' => $a->getIdmodif(),
        ));

      $res = $req->fetch();

      if ($res) {

        $rem = $this->dbh->getBase()->prepare("DELETE FROM participant WHERE id = :id");
        $rem->execute(array(
            'id' => $a->getIdmodif(),
          ));


        $_SESSION["connect"] = "deleteevent";



      }

      else {

        throw new Exception("Erreur dans select admin",1);



      }

    }

    public function joinevent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
      $req->execute(array(
        'id' => $a->getIdmodif(),

      ));

      $res = $req->fetch();


 if ($res) {   $rel = $this->dbh->getBase()->prepare("SELECT * from participant where id_participant = :id_participant and
    id_organisateur = :id_organisateur and id_evenement = :id_evenement");
    $rel->execute(array(
      'id_participant' => $a->getId(),
      'id_evenement' => $a->getIdmodif(),
      'id_organisateur' => $res["createur"],

    ));

    $rem = $rel->fetch();


   $ret = $this->dbh->getBase()->prepare("SELECT * from organisateur where id_utilisateur = :id_participant and id_event = :id_evenement");
      $ret->execute(array(
        'id_participant' => $a->getId(),
        'id_evenement' => $a->getIdmodif(),

      ));

      $rey = $ret->fetch();




 }

      if (isset($rem) AND !$rem AND $res["nb_participant"] !="0" AND $res["validationevent"] !="3" AND (isset($rey) AND !$rey)) {

        $_SESSION["connect"] ="event";

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("INSERT INTO participant (id_participant, id_organisateur, id_evenement) VALUES ( (select id from utilisateur where id =:id_participant),(select createur from evenement where id =:id_evenement ),(select id from evenement where id =:id_evenement  ))");
        $req->execute(array(
          'id_participant'=> $a->getId(),
          'id_evenement'=>$a->getIdmodif(),
        ));
  $reo = $req->fetch();
                $this->dbh = new bdd();
                $rea = $this->dbh->getBase()->prepare("UPDATE evenement SET nb_participant = (SELECT nb_participant WHERE id=:id_evenement)-1 WHERE id=:id_evenement");
                $rea->execute(array(
                  'id_evenement'=>$a->getIdmodif(),
                ));

  echo "string";



      }


      if ($res["nb_participant"] == "0") {
        $_SESSION["connect"] ="erreurjoineventplace";

      }

        if (isset($rem) AND $rem) {
$_SESSION["connect"] ="erreurjoinevent";
        throw new Exception("Erreur dans select admin",1);
      }

      if (isset($rey) AND $rey) {
$_SESSION["connect"] ="erreurjoineventorg";
      throw new Exception("Erreur dans select admin",1);
    }

      if ($res["validationevent"] =="3") {
$_SESSION["connect"] ="evenementannuler";
      throw new Exception("Erreur dans select admin",1);
    }




    }


    public function joineventorg($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from evenement where id = :id");
      $req->execute(array(
        'id' => $a->getIdmodif(),

      ));

      $res = $req->fetch();


      if ($res) {   $rel = $this->dbh->getBase()->prepare("SELECT * from participant where id_participant = :id_participant and
         id_organisateur = :id_organisateur and id_evenement = :id_evenement");
         $rel->execute(array(
           'id_participant' => $a->getId(),
           'id_evenement' => $a->getIdmodif(),
           'id_organisateur' => $res["createur"]

         ));

         $rem = $rel->fetch();


        $ret = $this->dbh->getBase()->prepare("SELECT * from organisateur where id_utilisateur = :id_participant and id_event = :id_evenement");
           $ret->execute(array(
             'id_participant' => $a->getId(),
             'id_evenement' => $a->getIdmodif(),

           ));

           $rey = $ret->fetch();




      }



           if (isset($rem) AND !$rem AND $res["nb_participant"] !="0" AND $res["validationevent"] !="3"  AND (isset($rey) AND !$rey) ){
        $_SESSION["connect"] ="eventorg";

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("INSERT INTO organisateur (id_utilisateur, id_event) VALUES ( (select id from utilisateur where id =:id_participant),(select id from evenement where id =:id_evenement  ))");
        $req->execute(array(
          'id_participant'=> $a->getId(),
          'id_evenement'=>$a->getIdmodif(),
        ));
  $reo = $req->fetch();



                $this->dbh = new bdd();
                $rea = $this->dbh->getBase()->prepare("UPDATE evenement SET nb_participant = (SELECT nb_participant WHERE id=:id_evenement)-1 WHERE id=:id_evenement");
                $rea->execute(array(
                  'id_evenement'=>$a->getIdmodif(),
                ));



      }


      if ($res["nb_participant"] == "0") {
        $_SESSION["connect"] ="erreurjoineventplace";

      }

        if (isset($rem) AND $rem) {
  $_SESSION["connect"] ="erreurjoinevent";
        throw new Exception("Erreur dans select admin",1);
      }

      if (isset($rey) AND $rey) {
$_SESSION["connect"] ="erreurjoineventorg";
      throw new Exception("Erreur dans select admin",1);
    }

      if ($res["validationevent"] =="3") {
  $_SESSION["connect"] ="evenementannuler";
      throw new Exception("Erreur dans select admin",1);
    }




    }

    public function selectrdv($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where role = 2 and id = :id");
      $req->execute(array(
        'id' => $a->getIdmodif(),

      ));

      $res = $req->fetch();



    if ($res) {   $rel = $this->dbh->getBase()->prepare("SELECT * from rdv where id_participant = :id_participant and
    id_organisateur = :id_organisateur and date_rdv = :date_rdv  ");
    $rel->execute(array(
     'id_participant' => $a->getId(),
      'id_organisateur' => $a->getIdmodif(),
     'date_rdv' => $a->getDate_event(),

  ));

   $rem = $rel->fetch();



    }


      if (!$rem) {

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("INSERT INTO rdv (id_participant, id_organisateur, date_rdv,validationrdv) VALUES ( (select id from utilisateur where id =:id_participant),(select id from utilisateur where id =:id_modif ), :date_rdv,1)");
        $req->execute(array(
          'id_participant'=> $a->getId(),
          'id_modif'=>$a->getIdmodif(),
          'date_rdv'=>$a->getDate_event(),



        ));

        $_SESSION["connect"] ="joinrdv";
      }

      if ($rem) {


        $_SESSION["connect"] ="erreurjoinrdv";
      }

      if ($a->getDate_event() == '') {


        $_SESSION["connect"] ="erreurdatejoinrdv";
      }





    }

    public function selectrdvparent($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
      session_start();
      $_SESSION['ok'] = 1;
      $this->dbh = new bdd();


      $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where role = 3 and id = :id");
      $req->execute(array(
        'id' => $a->getIdmodif(),

      ));

      $res = $req->fetch();



    if ($res) {   $rel = $this->dbh->getBase()->prepare("SELECT * from rdv where id_participant = :id_participant and
    id_organisateur = :id_organisateur and date_rdv = :date_rdv  ");
    $rel->execute(array(
     'id_participant' => $a->getId(),
      'id_organisateur' => $a->getIdmodif(),
     'date_rdv' => $a->getDate_event(),

    ));

    $rem = $rel->fetch();



    }


      if (!$rem) {

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("INSERT INTO rdv (id_participant, id_organisateur, date_rdv,validationrdv) VALUES ( (select id from utilisateur where id =:id_participant),(select id from utilisateur where id =:id_modif ), :date_rdv,1)");
        $req->execute(array(
          'id_participant'=> $a->getId(),
          'id_modif'=>$a->getIdmodif(),
          'date_rdv'=>$a->getDate_event(),



        ));

        $_SESSION["connect"] ="joinrdv";
      }

      if ($rem) {


        $_SESSION["connect"] ="erreurjoinrdv";
      }

      if ($a->getDate_event() == '') {


        $_SESSION["connect"] ="erreurdatejoinrdv";
      }





    }



          public function modificationnomprenomadmin($a) //MODIFIER NOM PRENOM EN TANT QU'ADMIN
          {
            session_start();


            if ($a->getNom()=='' and $a->getPrenom()=='' ) {
              throw new Exception("caseprenomvide");
            }

            if ($a->getNom()=='' ) {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set prenom = :prenom where id = :id ");
              $req->execute(array(
                'id'=>   $_SESSION['idadminmodif'],
                'prenom'=> $a->getPrenom(),


              ));

              $_SESSION['prenomadminmodif'] = $a->getPrenom();
  $_SESSION['connect'] ="modificationadminreussis";
            }

            elseif ($a->getPrenom()=='' ) {


              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set nom = :nom where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'nom'=> $a->getNom(),

              ));
              $_SESSION['nomadminmodif'] = $a->getNom();
              $_SESSION['connect'] ="modificationadminreussis";
            }





            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set nom = :nom , prenom = :prenom where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'nom'=> $a->getNom(),
                'prenom'=> $a->getPrenom(),

              ));
              $_SESSION['prenomadminmodif'] = $a->getPrenom();
              $_SESSION['nomadminmodif'] = $a->getNom();
              $_SESSION['connect'] ="modificationadminreussis";
            }

          }




          public function modificationmailadmin($a)  //MODIFICATION MAIL EN TANT QU'ADMIN
          {
            session_start();


            if ($a->getMail()=='' ) {
              throw new Exception("casemailvide");
            }



            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set mail = :mail where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'mail'=> $a->getMail(),


              ));
                $_SESSION['connect'] ="modificationadminreussis";
              $_SESSION['mailadminmodif'] = $a->getMail();

            }

          }

          public function modificationusernameadmin($a) //modification username en tant qu'admin
          {
            session_start();


            if ($a->getUsername()=='' ) {
              throw new Exception("toutecaseusernamevide");
            }



            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set username = :username where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'username'=> $a->getUsername(),


              ));
                $_SESSION['connect'] ="modificationadminreussis";
              $_SESSION['usernameadminmodif'] = $a->getUsername();

            }

          }


          public function modificationroleadmin($a) // modification role admin en tant qu'admin
          {
            session_start();



            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set role = :role where id = :id ");
            $req->execute(array(
              'id'=> $_SESSION['idadminmodif'],
              'role'=> $a->getRoleadminmodif(),


            ));
              $_SESSION['connect'] ="modificationadminreussis";
            $_SESSION['roleadminmodif'] = $a->getRoleadminmodif();

          }
          public function modificationpasswordadmin($a)
          {
            session_start();


            if ($a->getPassword()=="rlFROk.yJKhMM" ) {
              throw new Exception("toutecasepasswordvide");
            }



            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set password = :password where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'password' => $a->getPassword(),


              ));
                $_SESSION['connect'] ="modificationadminreussis";
              $_SESSION['passwordadminmodif'] = $a->getPassword();

            }

          }

public function verifmail($a)
{
  session_start();

  $this->dbh = new bdd();
  $req = $this->dbh->getBase()->prepare("SELECT mail from utilisateur where nom = :nom and prenom = :prenom");
  $req->execute(array(
    'nom'=> $a->getNom(),
    'prenom'=> $a->getPrenom(),
  ));


  $res = $req->fetch();

  $mail_hache = crypt($req["mail"], 'rl');

  if ($mail_hache == $a->getVerifmail() )
   {



  }

else { header("Location: ../../index.php");

}
}

          public function modificationpassword($a)           //modifier le mot de passe
          {
            session_start();
              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where password=:password");
              $req->execute(array(
                'password'=> $a->getPassword(),
              ));

              $res = $req->fetch();



              if ($a->getPasswordmodif() != $a->getPasswordmodifconf()) {
                  throw new Exception("correspondpas");
              }
              elseif ($res) {


                $this->dbh = new bdd();
                $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set password=:password where id=:id");
                $req->execute(array(
                  'id'=> $res['id'],
                  'password' => $a->getPasswordmodif(),


                ));
$_SESSION['connect'] ="modifpassword";

              }

              else {
                throw new Exception("mauvaispassword");

              }


          }


          public function modificationpasswordoublie($a)           //modifier le mot de passe
          {
            session_start();


            if ($a->getPassword()=="rlFROk.yJKhMM" and $a->getPassword()=="rlFROk.yJKhMM"  and $a->getPasswordmodifconf()=="rlFROk.yJKhMM"  ) {
              throw new Exception("toutecasepasswordvide");
            }

            if ($a->getPassword()=="rlFROk.yJKhMM" ) {
              throw new Exception("passwordvide");
            }



            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where token = :token");
              $req->execute(array(
                'token'=> $a->getToken(),

              ));

              $res = $req->fetch();

              if ($res ) {


                $this->dbh = new bdd();
                $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set token=NULL, password = :password where id = :id ");
                $req->execute(array(
                  'id'=> $res['id'],
                  'password' => $a->getPassword(),



                ));




                $_SESSION["connect"]="6";

              }

              else {
                throw new Exception("mauvaispassword");

              }
            }

          }




          public function adminajout($a)
          {
            session_start();



            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username=:username or mail = :mail ");
            $req->execute(array(
              'username'=> $a->getUsername(),
              'mail'=>$a->getMail(),
            ));

            $res = $req->fetch();


            if ($res) {
              throw new Exception("util");
                $_SESSION['connect'] ="erreuradminajout";

            }



            else {
              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("INSERT INTO utilisateur (nom,prenom,username,password,role,mail,date_naissance,validation) values (:nom,:prenom,:username,:password,:role,:mail,:date_naissance,1)");          // verifier si un utilisateur et l'inscrire si il existe
              $req->execute(array(
                'nom'=>$a->getNom(),
                'prenom'=>$a->getPrenom(),
                'username'=> $a->getUsername(),
                'password'=> $a->getPassword(),
                'mail' =>  $a->getMail(),
                'date_naissance' => $a->getDate_naissance(),
                'role'=>$a->getRole(),
              ));



              $_SESSION['connect'] ="adminajout";

            }


          }

          public function datatablesss(){
            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * FROM utilisateur");
            $req->execute();
            $res = $req->fetchall();
            return $res;

          }

            public function listeEvenement(){
            #Instancie la classe BDD
            $this->dbh = new bdd();
            $req = $this->dbh -> co_bdd()->prepare('SELECT * FROM evenement');
            $req -> execute([]);
            $listeUtilisateur= $req->fetchall();
            return $listeEvenement;
          }

          public function afficherevent(){

            session_start();
            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("SELECT * FROM evenement INNER JOIN utilisateur ON evenement.createur = utilisateur.id and evenement.createur != 4 ");
            $req->execute(array());

            $res = $req->fetchall();


            if ($res) {

              $_SESSION["rev"] = $res;
              $_SESSION["reZdate"]="";


            }

            else {

                          $req = $this->dbh->getBase()->prepare("SELECT * FROM evenement WHERE createur = 4");
                          $req->execute(array());

                          $res = $req->fetchall();
    $_SESSION["rev"] = $res;
    $_SESSION["reZdate"]="aucun";
              throw new Exception("Erreur",1);

$_SESSION["vide"] = "videevent";
            }

          }




          public function afficherrdv(){

            session_start();
            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("SELECT * FROM rdv INNER JOIN utilisateur ON rdv.id_participant = utilisateur.id WHERE RDV.id_participant = :id_participant or RDV.id_organisateur = :id_organisateur ");
            $req->execute(array(
                'id_organisateur'=>$_SESSION["id"],
                'id_participant'=>$_SESSION["id"],

            ));

            $res = $req->fetchall();


            if ($res) {

              $_SESSION["reZ"] = $res;


            }

            else {


                          $req = $this->dbh->getBase()->prepare("SELECT * FROM rdv INNER JOIN utilisateur ON rdv.id_participant = utilisateur.id WHERE RDV.id_participant = 1 or RDV.id_organisateur = 1 ");
                          $req->execute(array(


                          ));

                          $reh = $req->fetchall();



  $_SESSION["reZ"]=$reh;
    $_SESSION["vide"]="viderdv";
              throw new Exception("Erreur",1);


            }

          }

          public function afficherprof(){

            session_start();
            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where role=2 and validation =1");
            $req->execute(array());

            $res = $req->fetchall();


            if ($res) {

              $_SESSION["reo"] = $res;
$_SESSION["vide"] = "";


            }

            else {

              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id=4");
              $req->execute(array());

              $res = $req->fetchall();
  $_SESSION["reo"] = $res;
  $_SESSION["vide"] = "videprof";

              throw new Exception("Erreur",1);


            }

          }

          public function afficherparent(){

            session_start();
            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where role=3 and validation =1");
            $req->execute(array());

            $res = $req->fetchall();


            if ($res) {

              $_SESSION["reoo"] = $res;

$_SESSION["vide"] = "";

            }

            else {
              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id=4");
              $req->execute(array());

              $res = $req->fetchall();
              $_SESSION["reoo"] = $res;
              $_SESSION["vide"] = "videparent";
              throw new Exception("Erreur",1);


            }

          }


          public function liaison($a)
          {
            session_start();



            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * FROM `utilisateur` WHERE nom = :nom AND prenom = :prenom AND date_naissance = :date_naissance AND role = 4");
            $req->execute(array(
              'nom'=> $a->getNom(),
              'prenom'=>$a->getPrenom(),
              'date_naissance'=>$a->getDate_naissance(),

            ));

            $res = $req->fetch();

if(!$res){


$_SESSION["connect"]="erreurfamille";

}


            if ($res) {

              $this->dbh = new bdd();
              $rem = $this->dbh->getBase()->prepare("SELECT * from utilisateur where id = :id ");
              $rem->execute(array(
                'id'=> $a->getId(),));
  $rel = $rem->fetch();



  if ($rel['id_famille'] == null and $res["id_famille"]== null) {

    $famille_hache= crypt($a->getNom(), 'rl');
    $famille = $a->getId()."$famille_hache";

    $this->dbh = new bdd;
    $rek = $this->dbh->getBase()->prepare("UPDATE utilisateur SET id_famille = :id_famille where id = :id ");
    $rek->execute(array(
      'id'=> $a->getId(),
      'id_famille'=> $famille,
    ));



    $this->dbh = new bdd;
    $rej = $this->dbh->getBase()->prepare("UPDATE utilisateur SET id_famille = :id_famille where id = :id ");
    $rej->execute(array(
      'id'=> $res["id"],
      'id_famille'=> $famille,
    ));


$_SESSION["connect"]="famille";
  }

if ($rel['id_famille'] == null AND  $res["id_famille"] != null ) {


      $this->dbh = new bdd;
      $rej = $this->dbh->getBase()->prepare("UPDATE utilisateur SET id_famille = :id_famille where id = :id ");
      $rej->execute(array(
        'id'=> $a->getId(),
        'id_famille'=> $res["id_famille"],
      ));


  $_SESSION["connect"]="famille";


}
  else {

    $this->dbh = new bdd;
    $rek = $this->dbh->getBase()->prepare("UPDATE utilisateur SET id_famille = :id_famille where id = :id ");
    $rek->execute(array(
      'id'=> $a->getId(),
      'id_famille'=> $res['id_famille'],
    ));





$_SESSION["connect"]="famille";
  }

} }








          public function mkevent($a){
            session_start();


            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT role from utilisateur where id=:createur");
            $req->execute(array(
              'createur'=> $a->getCreateur(),
            ));

            $res = $req->fetch();


            if ($res) {

              if($res["role"]=="4" and $a->getLieu()!="Dugny"){
                $_SESSION["connect"] = "erreurmkevent";

              }
              else {



            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * from evenement where titre=:titre");
            $req->execute(array(
              'titre'=> $a->getTitre(),
            ));

            $res = $req->fetch();


            if ($res) {
              $_SESSION["connect"] = "erreurevenementexistant";

            }



            else {
              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("INSERT INTO evenement (titre,date_event,lieu,createur,resume,nb_participant,nb_parti_max,validationevent) values (:titre,:date_event,:lieu,:createur,:resume,:nb_participant,:nb_parti_max,0)");          // verifier si un utilisateur et l'inscrire si il existe
              $req->execute(array(
                'titre'=>$a->getTitre(),
                'date_event'=>$a->getDate_event(),
                'lieu'=> $a->getLieu(),
                'createur'=> $a->getCreateur(),
                'resume' =>  $a->getResume(),
                'nb_participant' => $a->getNb_parti_max(),
                'nb_parti_max' => $a->getNb_parti_max(),
              ));


              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("INSERT INTO organisateur (id_utilisateur, id_event) VALUES ( (select id from utilisateur where id =:id_participant),(select id from evenement where titre=:titre  ))");
              $req->execute(array(
                'id_participant'=> $a->getCreateur(),

                'titre'=>$a->getTitre(),


              ));
        $reo = $req->fetch();
$_SESSION["connect"] = "eventcree";

            }



      }
    }
  }





}
