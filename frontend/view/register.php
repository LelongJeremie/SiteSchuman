<!DOCTYPE PHP>
<PHP lang="en">
  <head>

    <?php include '../include_frontends/nav.php';  ?>

    <section class="login py-5 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8 align-item-center">
            <div class="border border">
              <h3 class="bg-gray p-4">Inscription</h3>
              <form action="../../backend/process/inscription.php" method= "post">
                <fieldset class="p-4">
                  <?php  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "util"){echo '<p><font color="red">Utilisateur deja existant</font></p>';}?>
                  <input type="text" name="nom"
                  <?php

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
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un mail valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un mail valide*"'; echo 'class="form-controlred p-3 w-100 my-2" ';}
                  if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordmailvide") { echo'placeholder="Veuillez rentrer un mail valide*"'; echo 'class="form-controlred p-3 w-100 my-2" ';}

                  else {
                    echo 'placeholder="Mail*" class="border p-3 w-100 my-2" ';}
                    ?>/>
                    <input type="password" name="password"
                    <?php
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordvide") { echo'placeholder="Veuillez rentrer un mot de passe valide*"'; echo 'class="form-controlred p-3 w-100 my-2" ';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "correspondpas") { echo'placeholder="Les mots de passe rentrés ne sont pas identiques*"'; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordmailvide") { echo'placeholder="Veuillez rentrer un password valide*"'; echo 'class="form-controlred p-3 w-100 my-2" ';}
                    else {


                      echo 'placeholder="Mot de passe*" class="border p-3 w-100 my-2" ';}
                      ?> />


                      <input type="password" name="passwordconf"
                      <?php

                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufmail"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufprenom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufnom"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufusername"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufpassword"){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordconfvide") { echo'placeholder="Veuillez rentrer un mot de passe valide*"'; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "correspondpas") { echo'placeholder="Les mots de passe rentrés ne sont pas identiques*"'; echo 'class="form-controlred p-3 w-100 my-2"';}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordmailvide") { echo'placeholder="Veuillez rentrer un password valide*"'; echo 'class="form-controlred p-3 w-100 my-2" ';}
                      else {
                        echo 'placeholder="Confirmer le mot de passe*" class="border p-3 w-100 my-2" ';}

                        ?>/>




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
      <?php $_SESSION["erreurcase"] = ''; ?>

    </PHP>
