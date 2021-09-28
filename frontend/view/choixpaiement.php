<!DOCTYPE PHP>
<PHP lang="en">
  <head>
    <?php include '../include_frontends/nav.php';  ?>
    <?php
    if (isset($_SESSION['role'])){  // Permet de verifier si on est connecté

      ?>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
              <div class="border border">
                <?php if ( $_SESSION["erreurcase"] == "reussis"){ ?>
                  <h3 class="bg-gray p-4">Ajout réussi </br> >Ajouter un autre film : </h3>
                <?php }  else {?>
                  <h3 class="bg-gray p-4"> Moyen de paiment :</h3>
                <?php }?>
                <form action="../../backend/process/paiementfin.php" method= "post">
                  <fieldset class="p-4">


                    <input type="number" name="place" type="text" SIZE="1" name="heuresI" id="heuresI" onblur="calcul()"
                    <?php


                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "placecasevide"){ echo'placeholder="Veuillez rentrer un nombre de place valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}



                    else { echo 'placeholder="Place à reserver*" class="border p-3 w-100 my-2" ';} ?> />

                    <div class="form-group">
                      <label for="current-password">

                        étudiant :
                        <br>
                        <input  type="radio" name="tarif" class="form-controlred p-1 w-3 my-1" value="etudiant"
                        checked/>
                        <br>
                        aucun tarif :
                        <br>
                        <input type="radio" name="tarif" class="form-controlred p-1 w-3 my-1" value="rien"
                        />

                      </div>



                      <script type="text/javascript">
                      function calcul(){
                        var prix = Number(document.getElementById("heuresI").value);

                        var quantite = 7;


                        var ttc = Number(prix * quantite);
                        document.getElementById("ttc").value = ttc;
                      }

                      </script>


                      <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreur") {
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
                                    <h6 class="py-2 danger" color="">Erreur durant la reservation ou le paiement !! <br> </h6>



                                  </div>
                                  <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer le pop-up</button>

                                  </div>
                                </div>
                              </div>
                            </div>



                          <?php $_SESSION["connect"] = "00000"; } ?>





                      <br>	<label>Prix total :</label><input type="text" SIZE="33" STYLE="text-decoration:none;;color: black;" name="prix" id="ttc">  (sans réduction)<br/><br/>


                      <label>Mode de paiment :</label><select name="mode">
                        <option value="cb"> carte bancaire</option>
                      </select><br/><br/>


                      <input type="number" name="cb"
                      <?php


                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "cbcasevide"){ echo'placeholder="Rentrer un Numero de carte bancaire valide*"';  echo 'class="form-controlred p-3 w-100 my-2"' ;}



                      else { echo 'placeholder="rentrer un Numero de carte bancaire" class="border p-3 w-100 my-2" ';} ?> />






                      <div class="loggedin-forgot d-inline-flex my-3">
                        <label for="registering" class="px-2">En vous inscrivant vous acceptez nos <a class="text-primary font-weight-bold" href="terms-condition.PHP">termes et conditions et politique de confidentialité</a></label>
                      </div>
                      <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Payer</button>
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
