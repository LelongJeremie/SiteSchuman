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
      <?php include '../include_frontends/navadmin.php';  ?>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
              <div class="border">

                <h3 class="bg-gray p-4">Nouveau Mot de Passe </h3>

                <fieldset class="p-4">

                  <form action= "../../backend/process/modificationpasswordoublie.php" method= "post">



                    <input type="text" name="passwordoublie" placeholder="*********" class="border p-3 w-100 my-2" />
                    <input type="hidden" name="token" value="<?php echo $_GET["token"] ; ?>" />
                  


                      <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Valider </button>
                    </form>


                  </BR>
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
