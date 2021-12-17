<!DOCTYPE PHP>
<PHP lang="en">
  <head>

    <?php include '../include_frontends/nav.php';  ?>

    <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "7") {
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
                  <h6 class="py-2">Erreur durant l'inscription </h6>


                </div>
                <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                </div>
              </div>
            </div>
          </div>



        <?php $_SESSION["connect"] = "00000"; } ?>
    <section class="login py-5 border-top-1">


      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8 align-item-center">
            <div class="border border">
              <h3 class="bg-gray p-4">Inscription</h3>
              <form action="../../backend/process/inscription.php" method= "post">
                <fieldset class="p-4">
                  Nom:
                  <input type="text" name="nom" required ="required" placeholder="" class="border p-3 w-100 my-2" />
                  Prénom:
                  <input type="text" name="prenom" required ="required" placeholder="" class="border p-3 w-100 my-2"/>
                  Date de naissance:
                  <input type="date" name="date_naissance" required ="required" class="border p-3 w-100 my-2"/>
                  Nom d'utilisateur:
                  <input type="text" name="username" required ="required" placeholder="" class="border p-3 w-100 my-2"/>
                  Mail:
                  <input type="email" name="mail" required ="required"placeholder="" class="border p-3 w-100 my-2"/>
                  Mot de passe:
                  <input type="password" required ="required" name="password" placeholder="" class="border p-3 w-100 my-2"/>
                  Confirmer le mot de passe:
                  <input type="password" required ="required" name="passwordconf" placeholder="" class="border p-3 w-100 my-2"/>

                </br> </br>
                <div class="form-group">
                  <label for="current-password">ROLE : </br>
                  </br>
                  Parent :
                  <input type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="3"
                  checked></BR>
                  Eleve :
                  <input type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="4">
                        </div>
                        <div class="loggedin-forgot d-inline-flex my-3">
                          <label for="registering" class="px-2">En vous inscrivant vous acceptez nos <a class="text-primary font-weight-bold">termes et conditions et politique de confidentialité</a></label>
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
