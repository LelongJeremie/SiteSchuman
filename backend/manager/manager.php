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



    $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username =:username AND password=:password");
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

    else {

      throw new Exception("toutecasevide",1);





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
var_dump($req);

    if ($req) {
        $_SESSION["connect"] = "3";

          $mail_hache = crypt($_GET["mail"], 'rl');

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
            //$mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'demandemdp ';
            $mail->Body    = 'demandemdp <b>Dugny!</b> http://localhost/TABTI/SiteSchuman/frontend/view/motdepasseoublie.php?mail='.$mail_hache."&nom=".$req["nom"]."&prenom=".$req["prenom"];
            $mail->AltBody = 'demandemdp!';

            $mail->send();
            echo 'Message has been sent';
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }


    }

    else {

      throw new Exception("vide",1);
      $_SESSION["connect"] = "5";
    }



  }

  public function paiement($a) //Ajouter la reservation a la base de donnée
  {
    session_start();






    $this->dbh = new bdd();
    $req = $this->dbh->getBase()->prepare("SELECT * from salle where salleid=:salleid ");
    $req->execute(array(
      'salleid'=> $_SESSION["salleid"],
    ));

    $res = $req->fetch();



    if ( $a->getTarif() =="etudiant") {

      $prixfin = $a->getPrix()*0.90;


    }

    else {
      $prixfin = $a->getPrix();

    }

    if ($res["salleplace"] < $a->getPlace() or $a->getPlace() <= 0  or $a->getCb() =="") {
      throw new Exception("Error place");
      $_SESSION["connect"] ="erreur";
      header("Location: ../../frontend/view/choixpaiement.php");

    }



    else {


  $_SESSION["connect"] ="4";

      $this->dbh = new bdd();
      $req = $this->dbh->getBase()->prepare("INSERT INTO reservation (RESnombre,idsalle, REStarif, utilisateurid) VALUES (:place, :salleid,:tarif,:id)");
      $req->execute(array(
        'place' => $a->getPlace(),
        'salleid' => $_SESSION["salleid"],
        'tarif' => $prixfin,
        'id' => $_SESSION["id"],



      ));


      $salleplacee =  $_SESSION["salleplace"] - $a->getPlace()  ;



      $reez = $this->dbh->getBase()->prepare("UPDATE salle set salleplace = :salleplace where salleid = :salleid ");
      $reez->execute(array(
        'salleid' => $_SESSION["salleid"],
        'salleplace' => $salleplacee,

      ));




      $_SESSION["connect"] ="4";
      $_SESSION["prixpayer"] = $prixfin;

      header("Location: ../../index.php");
    }
    $_SESSION["connect"] ="4";
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


    if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()=='' and $a->getPasswordconf()=="rlFROk.yJKhMM" ){
      throw new Exception("toutecasevide");

    }

    if($a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()==''){
      throw new Exception("toutecasevidesaufusername");

    }

    if($a->getUsername()=='' and  $a->getPassword()=="rlFROk.yJKhMM" and $a->getPrenom()=='' and $a->getMail()==''){            // VERIFIER SI LES CASES SONT VIDES
      throw new Exception("toutecasevidesaufnom");

    }

    if($a->getUsername()=='' and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()==''){
      throw new Exception("toutecasevidesaufpassword");

    }

    if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getMail()==''){
      throw new Exception("toutecasevidesaufprenom");

    }

    if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()==''){
      throw new Exception("toutecasevidesaufmail");

    }

    if($a->getPassword() =="rlFROk.yJKhMM" and $a->getMail() == ''){
      throw new Exception("passwordmailvide");
    }

    if($a->getNom() ==''){
      throw new Exception("nomvide");
    }

    if($a->getPrenom() ==''){
      throw new Exception("prenomvide");
    }
    if($a->getMail() ==''){
      throw new Exception("mailvide");
    }


    if($a->getUsername() ==''){
      throw new Exception("uservide");

    }

    if($a->getPassword() =="rlFROk.yJKhMM"){
      throw new Exception("passwordvide");
    }



    if ($a->getPassword()!=$a->getPasswordconf()){
      throw new Exception("correspondpas");
    }



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
      $req = $this->dbh->getBase()->prepare("INSERT INTO utilisateur (nom,prenom,username,password,role,mail) values (:nom,:prenom,:username,:password,2,:mail)");          // verifier si un utilisateur et l'inscrire si il existe
      $req->execute(array(
        'nom'=>$a->getNom(),
        'prenom'=>$a->getPrenom(),
        'username'=> $a->getUsername(),
        'password'=> $a->getPassword(),
        'mail' =>  $a->getMail(),
      ));

      $c = $this->mail($a);

      $_SESSION['connect'] ="2";


    }


  }


  public function mail($a){  //PHP MAILER
    //Instantiation and passing `true` enables exceptions
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
      //$mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Bienvenue ! ';
      $mail->Body    = 'Bienvenue sur le site du Cinema de <b>Dugny!</b> : https://www.google.fr';
      $mail->AltBody = 'Bienvenue sur le site du Cinema de Dugny!';

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
    var_dump($a);
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

      var_dump($a);
      $res = $req->fetch();

      if ($res) {

        $this->dbh = new bdd();
        $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set mail = :mail where id = :id ");
        $req->execute(array(
          'id'=> $_SESSION['id'],
          'mail'=> $a->getMailmodif(),


        ));

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
    var_dump($a);
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




      }

      else {

        throw new Exception("Erreur dans select admin",1);





      }}

      public function selectfilm($a){ //POUR AFFICHER LES UTILISATEURS POUR LES MODIFIER EN TANT QU'ADMIN
        session_start();
        $_SESSION['ok'] = 1;
        $this->dbh = new bdd();


        $req = $this->dbh->getBase()->prepare("SELECT * from salle where salleid = :salleid");
        $req->execute(array(
          'salleid' => $a->getSalleidmodif(),

        ));

        $res = $req->fetch();


        if ($res) {

          $_SESSION['reserv'] = $res["salleid"];
          $_SESSION['salleid'] = $res["salleid"];
          $_SESSION['SALLENomfilm'] = $res["SALLENomfilm"];
          $_SESSION['3D'] = $res["3D"];
          $_SESSION["description"] = $res["description"];
          $_SESSION["image"] = $res["image"];
          $_SESSION["lienfilm"] = $res["lienfilm"];
          $_SESSION['salleplace'] = $res["salleplace"];





        }

        else {

          throw new Exception("Erreur dans select film",1);


          var_dump( $a->getSalleidmodif());



        }}





        public function affichertoutfilm($a){ //POUR AFFICHER tout les films
          session_start();
          $_SESSION['ok'] = 6;
          $this->dbh = new bdd();


          $req = $this->dbh->getBase()->prepare("SELECT * FROM salle");
          $req->execute(array(


          ));

          $res = $req->fetchall();


          if ($res) {

            $_SESSION['film'] = $res;




          }

          else {

            throw new Exception("Erreur dans select film",1);





          }


        }



        public function afficherfilm($a){ //POUR AFFICHER LES films choisis
          session_start();
          $_SESSION['ok'] = 6;
          $this->dbh = new bdd();

          $c= $a->getFilmnom()."%";

          $_SESSION['$a->getCdnom()'] = $c;
          if ($c !="%") {
            // code...

            $req = $this->dbh->getBase()->prepare("SELECT * FROM film WHERE ucase(filmnom) LIKE ucase(:filmnom)");
            $req->execute(array(
              'filmnom' => $c,

            ));

            $res = $req->fetchall();


            if ($res) {

              $_SESSION['recherchefilm'] = $res;




            }

            else {

              throw new Exception("Erreur dans selectfilm",1);





            }}


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

            }

            elseif ($a->getPrenom()=='' ) {


              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set nom = :nom where id = :id ");
              $req->execute(array(
                'id'=> $_SESSION['idadminmodif'],
                'nom'=> $a->getNom(),

              ));
              $_SESSION['nomadminmodif'] = $a->getNom();
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
setcookie('nom',$a->getNom() , time() + 200)
setcookie('prenom',$a->getPrenom() , time() + 200)


  }

else { header("Location: ../../index.php");

}
}

          public function modificationpassword($a)           //modifier le mot de passe
          {
            session_start();







            if ($a->getPassword()=="rlFROk.yJKhMM" and $a->getPassword()=="rlFROk.yJKhMM"  and $a->getPasswordmodifconf()=="rlFROk.yJKhMM"  ) {
              throw new Exception("toutecasepasswordvide");
            }

            if ($a->getPassword()=="rlFROk.yJKhMM" ) {
              throw new Exception("passwordvide");
            }

            if ($a->getPasswordmodif()=="rlFROk.yJKhMM" ) {
              throw new Exception("passwordmodifvide");
            }

            if ($a->getPasswordmodifconf()=="rlFROk.yJKhMM" ) {
              throw new Exception("passwordmodifconfvide");
            }

            if ($a->getPasswordmodifconf() != $a->getPasswordmodif()  ) {
              throw new Exception("correspondpas");
            }

            if ($a->getPasswordmodifconf() == "rlFROk.yJKhMM" and $a->getPasswordmodif() == "rlFROk.yJKhMM"  ) {
              throw new Exception("passwmordmodifconfmodifvide");
            }



            else {

              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where password=:password ");
              $req->execute(array(
                'password'=> $a->getPassword(),
              ));

              $res = $req->fetch();
              if ($res) {


                $this->dbh = new bdd();
                $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set password = :password where id = :id ");
                $req->execute(array(
                  'id'=> $res['id'],
                  'password' => $a->getPassword(),


                ));



              }

              else {
                throw new Exception("mauvaispassword");

              }
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
              $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where prenom=:prenom and nom=:nom");
              $req->execute(array(
                'password'=> $a->getPassword(),
              ));

              $res = $req->fetch();
              if ($res) {


                $this->dbh = new bdd();
                $req = $this->dbh->getBase()->prepare("UPDATE utilisateur set password = :password where id = :id ");
                $req->execute(array(
                  'id'=> $res['id'],
                  'password' => $a->getPassword(),


                ));



              }

              else {
                throw new Exception("mauvaispassword");

              }
            }

          }




          public function adminajout($a) //AJOUTER EN TANT QU'ADMIN
          {
            session_start();


            if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM"  and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()==''){
              throw new Exception("toutecasevide");

            }

            if($a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()==''){
              throw new Exception("toutecasevidesaufusername");

            }

            if($a->getUsername()=='' and  $a->getPassword()=="rlFROk.yJKhMM" and $a->getPrenom()=='' and $a->getMail()==''){
              throw new Exception("toutecasevidesaufnom");

            }

            if($a->getUsername()=='' and $a->getNom()=='' and $a->getPrenom()=='' and $a->getMail()==''){
              throw new Exception("toutecasevidesaufpassword");

            }

            if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getMail()==''){
              throw new Exception("toutecasevidesaufprenom");

            }

            if($a->getUsername()=='' and $a->getPassword()=="rlFROk.yJKhMM" and $a->getNom()=='' and $a->getPrenom()==''){
              throw new Exception("toutecasevidesaufmail");

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




            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * from utilisateur where username=:username ");
            $req->execute(array(
              'username'=> $a->getUsername(),
            ));
            var_dump($a);
            $res = $req->fetch();

            if ($res) {
              throw new Exception("Error utilisateur deja existant");

            }


            else {
              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("INSERT INTO utilisateur (nom,prenom,username,password,role,mail) values (:nom,:prenom,:username,:password,:role,:mail)");
              $req->execute(array(
                'nom'=>$a->getNom(),
                'prenom'=>$a->getPrenom(),
                'username'=> $a->getUsername(),
                'password'=> $a->getPassword(),
                'mail' =>  $a->getMail(),
                'role' => $a->getRole(),
              ));




            }


          }







          public function supprimer($a){  //Supprimer UN UTILISATEUR

            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("DELETE from utilisateur where id=:id");
            $req->execute(array(
              'id'=> $a->getId(),

            ));
            var_dump($a);
            $res = $req->fetch();


            if ($res) {



              header("Location: ../../backend/process/deconnexion.php");
            }

            else {

              throw new Exception("Erreur",1);





            }

          }






          public function supprimeradmin($a){ //supprimer UN UTILISATEUR EN ETANT ADMIN

            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("DELETE from utilisateur where id=:id");
            $req->execute(array(
              'id'=> $_SESSION["idadminmodif"],

            ));
            var_dump($a);
            $res = $req->fetch();


            if ($res) {



              header("Location: ../../backend/process/admin.php");
            }

            else {

              throw new Exception("Erreur",1);





            }

          }


          public function adminajoutfilm($a) //AJOUTER UN FILM EN TANT QU'ADMIN
          {
            session_start();


            $this->dbh = new bdd();
            $req = $this->dbh->getBase()->prepare("SELECT * from salle where sallenomfilm=:sallenomfilm ");
            $req->execute(array(
              'sallenomfilm'=> $a->getSallenomfilm(),
            ));

            $res = $req->fetch();

            if ($res) {
              throw new Exception("Error film deja existant");

            }


            else {
              $this->dbh = new bdd();
              $req = $this->dbh->getBase()->prepare("INSERT INTO salle (sallenomfilm,salleplace,3D,description,image,theme) values (:sallenomfilm,:salleplace,:troisd,:description,:image,:theme)");
              $req->execute(array(
                'sallenomfilm' => $a->getSallenomfilm(),
                'salleplace' => $a->getSalleplace(),
                'troisd' => $a->getTroisd(),
                'description' => $a->getDescription(),
                'image' => $a->getImage(),
                'theme' => $a->getTheme(),
              ));

              $_SESSION["connect"] ="3";


            }


          }



          public function affichertoutreservation($a){ //POUR AFFICHER toutes les reservations
            session_start();
            $_SESSION['stop'] = 6;
            $this->dbh = new bdd();


            $req = $this->dbh->getBase()->prepare("SELECT * FROM reservation INNER JOIN salle ON salle.salleid = reservation.idsalle where utilisateurid = :id");
            $req->execute(array(

              "id"=>$a->getId(),


            ));

            $res = $req->fetchall();



            if ($res) {

              $_SESSION['reservation'] = $res;




            }

            else {

              throw new Exception("Erreur dans select res",1);





            }


          }


        }
