<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Demarrage session avec un test pour savoir si on est connecté -->

  <?php include '../../frontend/include_frontends/nav.php';  ?>
<!-- contact us end -->

	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
        <section class="login py-5 border-top-1">


          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border border">
                  <h3 class="bg-gray p-4">Inscription</h3>
                  <form action="../../backend/process/mkevent.php" method= "post">
                    <fieldset class="p-4">
                      Titre:
                      <input type="text" name="titre" placeholder="" class="border p-3 w-100 my-2" />
                      Date:
                      <input type="date" name="date_event" placeholder="" class="border p-3 w-100 my-2"/>
                      Lieu:
                      <input type="text" name="lieu" class="border p-3 w-100 my-2"/>
                      Nombre participant maximum:
                      <input type="number" name="nb_parti_max" placeholder="" class="border p-3 w-100 my-2"/>
                      Résumé:
                      <input type="text" name="resume" placeholder="" class="border p-3 w-100 my-2" />
                      <input type="hidden" name="createur" value="<?php echo $_SESSION["id"]; ?>"/>
                    </br></br></br>
                            <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">S'inscrire</button>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
		</div>
	</div>
</div>
  </br>
	<!-- Container End -->


<!--============================
=            Footer            =
=============================-->

<?php
var_dump($_SESSION["id"]);
include('../include_frontends/footers.php'); ?>
  <!-- Container End -->
  <!-- To Top -->

</footer>

<?php include('../include_frontends/plugins.php'); ?>
</body>

</html>
