<!DOCTYPE PHP>
<PHP lang="fr">

      <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php include '../include_frontends/nav.php';  ?>
    <?php
  if (isset($_SESSION['role']) and $_SESSION['role'] == 1 ){

     ?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                      <?php if ( $_SESSION["erreurcase"] == "reussis"){ ?>
                        <h3 class="bg-gray p-4">Ajout réussi </br> >Ajouter un autre utilisateur : </h3>
                      <?php }  else {?>
                      <h3 class="bg-gray p-4">Ajouter un utilisateur : </h3>
                    <?php }?>
                        <form action="../../backend/process/adminajout.php" method= "post">
                            <fieldset class="p-4">

                              <input type="text" name="nom"
                              <?php
                    //permet de gerer les erreurs
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "nomvide") { echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                              else { echo 'placeholder="Nom*" class="border p-3 w-100 my-2" ';} ?> />

                              <input type="text" name="prenom"
                              <?php

                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}

                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "prenomvide") { echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                              else { echo 'placeholder="Prenom*" class="border p-3 w-100 my-2" ';} ?>/>

                              <input type="text" name="username"
                              <?php

                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "uservide") { echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}

                              else { echo 'placeholder="Utilisateur*" class="border p-3 w-100 my-2" ';} ?>/>

                              <input type="email" name="mail"
                              <?php
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un mail valide*"'; echo 'class="form-controlred p-3 w-100 my-2" />';}


                              else {
                                echo 'placeholder="Mail*" class="border p-3 w-100 my-2" ';}
                                ?>/>
                              <input type="password" name="password"
                              <?php
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasepasswordvide") { echo'placeholder="Veuillez rentrer un mot de passe valide*"'; echo 'class="form-controlred p-3 w-100 my-2" />';}


                              else {
                                echo 'placeholder="Mot de passe*" class="border p-3 w-100 my-2" ';}
                                ?>/>


                                <div class="form-group">
                                  <label for="current-password">ROLE :
                                    CHOISIR ADMINISTRATEUR :
                                                 </br>     </br>     </br>
                                                 <input  type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="1"
                                         checked></BR></BR></BR>
                                               </>
CHOISIR NON-ADMINISTRATEUR :</>
                                               <input type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="2"
                                               ></BR></BR></BR>


                                </div>





                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <label for="registering" class="px-2">En vous inscrivant vous acceptez nos <a class="text-primary font-weight-bold" href="terms-condition.PHP">termes et conditions et politique de confidentialité</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">S'inscrire</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
    =            Footer            =
    =============================-->
<?php include('../include_frontends/footers.php'); ?>
      <!-- Container End -->
      <!-- To Top -->
      <div class="top-to">
        <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
      </div>
    </footer>

<?php include('../include_frontends/plugins.php'); ?>
    </body>
<?php $_SESSION["erreurcase"] = ''; } else {

  header("Location: 404.php");
}?>

</PHP>
