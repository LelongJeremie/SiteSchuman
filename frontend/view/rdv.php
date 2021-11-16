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
                        <h3 class="bg-gray p-4">rendez-vous pris avec succès </br> >prendre un autre rendez-vous : </h3>
                      <?php }  else {?>
                      <h3 class="bg-gray p-4">Prendre un rendez-vous: </h3>
                    <?php }?>
                        <form action="../../backend/process/adminajout.php" method= "post">
                            <fieldset class="p-4">
                              Nom du professeur:
                              <input type="text" name="nom_prof" placeholder="" class="border p-3 w-100 my-2" />
                              Nom du parent:
                              <input type="text" name="nom_parent" placeholder="" class="border p-3 w-100 my-2"/>
                              Date du rendez-vous:
                              <input type="date" name="date_rdv" class="border p-3 w-100 my-2"/>
                              Heure du rendez-vous:
                              <input type="text" name="heure_rdv" placeholder="" class="border p-3 w-100 my-2"/>
                              Mail:
                              <input type="email" name="mail" placeholder="" class="border p-3 w-100 my-2"/>

                            </br> </br>



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
