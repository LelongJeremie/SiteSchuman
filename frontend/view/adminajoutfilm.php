<!DOCTYPE PHP>
<PHP lang="en">
  <head>

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
                  <h3 class="bg-gray p-4">Ajout réussi </br> >Ajouter un autre film : </h3>
                <?php }  else {?>
                  <h3 class="bg-gray p-4">Ajouter un film : </h3>
                <?php }?>
                <form action="../../backend/process/adminajoutfilm.php" method= "post">
                  <fieldset class="p-4">


                    <input type="text" name="sallenomfilm"
                    <?php


                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom de film valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufrefliv"){ echo'placeholder="Veuillez rentrer un nom de film valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesauffilmaut"){ echo'placeholder="Veuillez rentrer un nom de film valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufreflivetfilmaut") { echo'placeholder="Veuillez rentrer un nom de film valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="Veuillez rentrer un nom de film *" class="border p-3 w-100 my-2" ';} ?> />

                    <input type="text" name="salleplace"
                    <?php

                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufrefliv"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesauffilmnom"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufreflivetfilmnom") { echo'placeholder="Veuillez rentrer un nom d auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="Entrer le nombre de place de la salle *" class="border p-3 w-100 my-2" ';} ?> />

                    <input type="text" name="description"
                    <?php

                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufrefliv"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesauffilmnom"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufreflivetfilmnom") { echo'placeholder="Veuillez rentrer un nom d auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="Entrer la description du film *" class="border p-3 w-100 my-2" ';} ?> />

                    <input type="text" name="image"
                    <?php

                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevide"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufrefliv"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesauffilmnom"){ echo'placeholder="Veuillez rentrer un nom auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasevidesaufreflivetfilmnom") { echo'placeholder="Veuillez rentrer un nom d auteur valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="Entrer le nom de image *" class="border p-3 w-100 my-2" ';} ?> />
                    <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "3") {
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
                            <h6 class="py-2">Félicitation : Film ajouté à la base! </h6>


                          </div>
                          <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                          </div>
                        </div>
                      </div>
                    </div>



                    <?php $_SESSION["connect"] = "00000"; } ?>

                    <div class="form-group">
                      <label for="current-password">Theme :
                        CHOISIR action:
                      </br>     </br>     </br>
                      <input  type="radio" name="theme" class="form-controlred p-1 w-50 my-1" value="action"
                      checked></BR></BR></BR>
                      </>
                      CHOISIR AVENTURE :</>
                      <input type="radio" name="theme" class="form-controlred p-1 w-50 my-1" value="aventure"
                      ></BR></BR></BR>
                      CHOISIR Combat :</>
                      <input type="radio" name="theme" class="form-controlred p-1 w-50 my-1" value="combat"
                      ></BR></BR></BR>

                      CHOISIR SF :</>
                      <input type="radio" name="theme" class="form-controlred p-1 w-50 my-1" value="science fiction">
                    </BR></BR></BR>


                    3D? : </></BR>
                    <input type="checkbox" class="form-controlred p-1 w-50 my-1" name="troisd" value="1">



                  </div>



                  <div class="loggedin-forgot d-inline-flex my-3">
                    <label for="registering" class="px-2">En vous inscrivant vous acceptez nos <a class="text-primary font-weight-bold" href="terms-condition.PHP">termes et conditions et politique de confidentialité</a></label>
                  </div>
                  <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Ajouter le film</button>
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
<?php $_SESSION["erreurcase"] = ''; } ?>

</PHP>
