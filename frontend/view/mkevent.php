<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Demarrage session avec un test pour savoir si on est connecté -->

  <?php include '../../frontend/include_frontends/nav.php';  ?>
<!-- contact us end -->
<?php

 if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurmkevent") {
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
                <h6 class="py-2">Erreur, un élève ne peut pas créer d'evenement exterieur ! </h6>


              </div>
              <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

              </div>
            </div>
        </div>
      </div>
      <?php } ?>
<?php
      if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurevenementexistant") {
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
                     <h6 class="py-2">Erreur, évènement déjà existant ! </h6>


                   </div>
                   <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                     <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                   </div>
                 </div>
             </div>
           </div>
           <?php } ?>

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
                  <h3 class="bg-gray p-4">Créer un évenement</h3>
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
                            <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Créer</button>
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

include('../include_frontends/footers.php'); ?>
  <!-- Container End -->
  <!-- To Top -->

</footer>

<?php include('../include_frontends/plugins.php'); ?>
</body>

</html>
