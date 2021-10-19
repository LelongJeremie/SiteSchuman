<!DOCTYPE php>
<php lang="fr">
<head>
  <!-- Demarrage session -->
<?php session_start() ?>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Robert Schuman</title>
<!-- include de php redondant -->
  <?php include 'frontend/include_frontends/stylesindex.php';  ?>
</head>

  <?php include 'frontend/include_frontends/navindex.php';  #if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==4) {    $res=$_SESSION["film"];   }

#  else {
     #$_SESSION['stop']=4;?>
     <!--
     <script type="text/javascript">
       window.location.href =   "backend/process/affichertoutFILMindex.php";
     </script> -->
  <?php   ?>


<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Robert Schuman </h1>
					<p>Site en construction </p>
				</div>


			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- Header Contetnt -->
      <div class="content-block">
        <h1> Liste des evenements  </h1>

      </div>


    </div>
  </div>
</div>
<table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>


                <th>Evenement</th>
                <th>date</th>
                <th>lieu</th>
                <th>Createur</th>
                <th>Resume</th>
                <th>Nombre de participant</th>

            </tr>

          </br>
        </thead>
        <tbody>
            <tr>
              <?php foreach ($res as $value) { ?>
                <td><?php echo $value['titre'];?></td>
                <td><?php echo $value['date'];?></td>
                <td><?php echo $value['lieu'];?></td>
                <td><?php echo $value['createur'];?></td>
                <td><?php echo $value['resume'];?></td>
                <td><?php echo $value['nb_participant'];?></td>

            </tr>
<?php  }?>
        </tbody>

        <tfoot>
            <tr>
              <th>Evenement</th>
              <th>date</th>
              <th>lieu</th>
              <th>Createur</th>
              <th>Resume</th>
              <th>Nombre de participant</th>
            </tr>
        </tfoot>
    </table>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">

    <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "1") {
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
                  <h6 class="py-2">Félicitation : Vous êtes connecté ! </h6>


                </div>
                <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                </div>
              </div>
            </div>
          </div>



        <?php $_SESSION["connect"] = "00000"; } ?>

        <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "4") {
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
                      <h6 class="py-2">Félicitation : Vous avez reservé vôtre/vos place(s) pour le film ! <br> Vous avez payé <?php echo $_SESSION["prixpayer"]; ?>€</h6>



                    </div>
                    <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                      <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                    </div>
                  </div>
                </div>
              </div>



            <?php $_SESSION["connect"] = "00000"; } ?>



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
                          <h6 class="py-2" color="red">Erreur durant la reservation ou le paiement !! <br> </h6>



                        </div>
                        <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                        </div>
                      </div>
                    </div>
                  </div>



                <?php $_SESSION["connect"] = "00000"; } ?>

        <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "2") {
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
                      <h6 class="py-2">Félicitation : Vous êtes inscrit (vérifié vos mails) ! </h6>


                    </div>
                    <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                      <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                    </div>
                  </div>
                </div>
              </div>



            <?php $_SESSION["connect"] = "00000"; } ?>


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
                          <h6 class="py-2">vérifié vos mails ! </h6>


                        </div>
                        <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                        </div>
                      </div>
                    </div>
                  </div>



                <?php $_SESSION["connect"] = "00000"; } ?>
          <!-- delete account popup modal end-->
    <!-- delete-account modal -
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">

						<!-- product card -->


					</div>


				</div>
			</div>


		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->


<!--============================
=            Footer            =
=============================-->
<!-- include de php redondant -->
<?php include('frontend/include_frontends/footersindex.php'); ?>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>
<!-- include de php redondant -->
<?php include('frontend/include_frontends/pluginsindex.php'); ?>
</body>

</php>
