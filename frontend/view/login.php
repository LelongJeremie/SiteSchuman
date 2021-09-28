<!DOCTYPE PHP>
<PHP lang="fr">
  <head>
    <!-- Demarrage session avec un test pour savoir si on est connecté -->
    <?php

    session_start();

    if (isset($_SESSION['id'])) {
      header("Location: 404.php ");
    }

    else{



      ?>
      <?php include '../include_frontends/navh.php';  ?>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
              <div class="border">

                <h3 class="bg-gray p-4">Se connecter</h3>

                <fieldset class="p-4">

                  <form action= "../../backend/process/connexion.php" method= "post">

                    <input type="text" name="username"
                    <?php
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide" ){ echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "uservide") { echo'placeholder="Veuillez rentrer un nom d\'utilisateur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="Utilisateur" class="border p-3 w-100 my-2" ';} ?> />
                    <input type="password" name="password"
                    <?php
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"  ){ echo'placeholder="Veuillez rentrer un mot de passe valide*"'  ; echo 'class="form-controlred p-3 w-100 my-2"';}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwordvide") { echo'placeholder="Veuillez rentrer un mot de passe valide*"'; echo 'class="form-controlred p-3 w-100 my-2"';}
                    else {
                      echo 'placeholder="Mot de passe" class="form-control p-3 w-100 my-2"';}
                      ?>/>




                      <div class="loggedin-forgot">
                        <input type="checkbox" id="keep-me-logged-in">
                        <label for="keep-me-logged-in" class="pt-3 pb-2">Rester connecter</label>
                      </div>
                      <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Se connecter</button>
                    </form>
                    <!-- <a class="mt-3 d-block  text-primary" href="#">Mot de passe oublié?</a>-->
                    <a class="mt-3 d-inline-block text-primary" href="register.PHP">S'inscrire</a>
                  </fieldset>

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
    <?php $_SESSION["erreurcase"] = ''; }?>

  </PHP>
