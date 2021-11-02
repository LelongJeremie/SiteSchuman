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

          <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "5") {
           ?>
      <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
          <script type="text/javascript">
      $( document ).ready(function() {
          $('#myModal').modal('toggle')
      });
      </script>




                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Erreur! </h6>


                      </div>
                      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                      </div>
                    </div>
                  </div>
                </div>



              <?php $_SESSION["connect"] = "00000"; } ?>

          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
              <div class="border">

                <h3 class="bg-gray p-4"> Veuillez rentrer le mail du compte </h3>

                <fieldset class="p-4">

                  <form action= "../../backend/process/demandemdp.php" method= "get">

                    <input type="text" name="mail" placeholder="Veuillez entrer le mail" class="border p-3 w-100 my-2" />

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
