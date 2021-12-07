<!DOCTYPE PHP>
<PHP lang="en">
  <head>

    <?php include '../include_frontends/nav.php';  ?>





    <section class="login py-5 border-top-1">


      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-8 align-item-center">
            <div class="border border">
              <h3 class="bg-gray p-4">Se lier son enfant</h3>
              <form action="../../backend/process/liaison.php" method= "post">
                <fieldset class="p-4">
                  Nom de votre enfant:
                  <input type="text" required ="required" name="nom" placeholder="" class="border p-3 w-100 my-2" />
                  Prénom de votre enfant:
                  <input type="text" name="prenom" required ="required" placeholder="" class="border p-3 w-100 my-2"/>
                  Date de naissance de votre enfant :
                  <input type="date" name="date_naissance" class="border p-3 w-100 my-2"/>
  <input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?> />

                </br> </br>


                        <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Se lier</button>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurfamille") {
           ?>
      <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
          <script type="text/javascript">
      $( document ).ready(function() {
          $('#myModal').modal('toggle')
      });
      </script>




                <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <h6 class="py-2">Erreur dans la Liaison avec votre enfant : assurez-vous que toute les données soit correct ! </h6>


                      </div>
                      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                      </div>
                    </div>
                  </div>
                </div>



              <?php  } ?>
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
