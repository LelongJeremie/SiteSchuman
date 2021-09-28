<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start(); include '../include_frontends/navh.php';  ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->




    <section class="login py-5 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-11 align-item-center">
            <div class="border">

              <h3 class="bg-gray p-4 ">Choix Film</h3>

              <fieldset class="p-4">
                <form action= "../../backend/process/profilm.php" method= "post">

                  <select class= "border p-1 w-100 my-1" name ="modif">
                    <?php
                    $res=$_SESSION["film"];


                    echo "<option value 0>Choix de votre film </option>";
                    foreach ($res as $value) {


                      echo "<option value=".$value['salleid'].">" ." Film disponible => ".$value["SALLENomfilm"] ."   =====> la salle du film  :  ".  $value["salleid"] ."   </option>";
                    }

                    ?>

                  </select>



                  <section class="login py-5 border-top-1"/>


                  <div class="loggedin-forgot">
                    <!--<input type="checkbox" id="keep-me-logged-in">-->

                  </div>

                  <br>
                  <button type="submit" class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Choisir un film</button>
                </form>

              </fieldset>

            </div>
          </div>
        </div>
      </div>
    </section>


    <?php if (isset($_SESSION["reserv"]) and $_SESSION["reserv"] > 0 ){ ?>




      <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-2">
        <!-- Edit Profile Welcome Text -->
        <div class="widget welcome-message">
          <h2>Reservation du film</h2>
          <p>Vous pouvez reserver le film choisis</p>
        </div>
        <!-- Edit Personal Info -->
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="widget personal-info">

              <form method="post" action="choixpaiement.php">
                <!-- First Name -->
                <div class="form-group">







                </div>
                <!-- Last Name -->
                <div class="form-group">



                  <div class="col-md-3 col-sm-6">
                    <ul class="store-list">
                      <li> 	<a href="<?php echo $_SESSION['lienfilm'];?>"> <?php echo $_SESSION['SALLENomfilm'];?> </a>Numéro de la salle :  <?php echo $_SESSION['salleid'];?> Place disponible dans la salle :  <?php echo $_SESSION['salleplace'];?>  </li>

                      <img class=" img-fluid mb-10 px-10" src="../../<?php echo $_SESSION['image'];?>" alt="">

                    </ul>
                  </div>


                </div>

                <!-- Submit button -->
                <button name="typemodif" value="changernomprenom" type="submit" class="btn btn-transparent">Reserver </button>
              </form>
            </div>




          </div>
        </div>
        <div class="col-lg-6 col-md-6">

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>

<?php }?>
</br></br></br>






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
<?php
?>

</PHP>
