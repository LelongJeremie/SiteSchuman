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
                        <h3 class="bg-gray p-4">Evenement crée avec succès</br> >Crée un autre Evenement : </h3>
                      <?php }  else {?>
                      <h3 class="bg-gray p-4">Crée un autre Evenement: </h3>
                    <?php }?>
                        <form action="../../backend/process/adminajout.php" method= "post">
                            <fieldset class="p-4">
                              titre:
                              <input type="text" name="titre" placeholder="" class="border p-3 w-100 my-2" />
                              lieu:
                              <input type="text" name="lieu" placeholder="" class="border p-3 w-100 my-2"/>
                              Date :
                              <input type="date" name="date" class="border p-3 w-100 my-2"/>
                              resume:
                              <input type="text" name="resume" placeholder="" class="border p-3 w-100 my-2"/>

                            </br> </br>


  <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Crée l'evenement</button>
                                </div>
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

    </footer>

<?php include('../include_frontends/plugins.php'); ?>
    </body>
<?php $_SESSION["erreurcase"] = ''; } else {

  header("Location: 404.php");
}?>

</PHP>
