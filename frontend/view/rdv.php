<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start();
     ?>



     <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "joinrdv") {
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
                   <h6 class="py-2"> Rendez-vous rejoint ! </h6>


                 </div>
                 <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                   <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                 </div>
               </div>
             </div>
           </div>



         <?php  } ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role'])  ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==2) {    $res=$_SESSION["reZ"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                            //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=2; header("Location: ../../backend/process/rdv.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

       ?>


      <table id="myTable" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>



                   <th>Date</th>
                   <th>Nom du participant</th>
                   <th>Nom de l'organisateur</th>
                    <th>Validation</th>
                      <th>Compte rendu / Description</th>
<th></th>

    	            </tr>

                </br>
    	        </thead>

    	        <tbody>
    	            <tr>
                    <?php foreach ($res as $value) {  ?>

    	                <td><?php $date = date_parse($value['date_rdv']);
    $jour = $date['day'];
    $mois = $date['month'];
    $annee = $date['year'];
echo $date['day'],' ';
    switch ($date['month']) {
      case 1:
          echo "Janvier ";
          break;
      case 2:
          echo "Fevrier ";
          break;
      case 3:
          echo "Mars ";
          break;
    case 4:
        echo "Avril ";
        break;
    case 5:
        echo "Ma i";
        break;

          case 6:
              echo "Juin ";
              break;
          case 7:
              echo "Juillet ";
              break;
              case 8:
                  echo "Aout ";
                  break;
                  case 9:
                      echo "Septembre ";
                      break;
                      case 10:
                          echo "Octobre ";
                          break;
                          case 11:
                              echo "Novembre ";
                              break;
                              case 12:
                                  echo "Decembre " ;
                                  break;


      } echo $date['year'] ,' ';
?></td>
                      <td><?php echo $value['nom']; ?></td>
    	                <td><?php echo $value['prenom'];?></td>

                      <td><?php  if($value['validationrdv']==0){ echo ' Rendez-vous annulé : ❌';}
                         elseif($value['validationrdv']==1) {
                      echo ' Rendez-vous validé : ✔️';
                    }   elseif($value['validationrdv']==2) { echo ' Rendez-vous annulé : ❌';  }  elseif($value['validationrdv']==4) { echo ' Rendez-vous passé: ❌';  }  elseif($_SESSION['connect']=="annuleredv") { echo ' Rendez-vousannulé : ❌';  } elseif($_SESSION['connect']=="annuleredv2")
                    { echo 'Rendez-vous annulé : ❌';  } ?></td>

 <td><?php echo $value['compterendu'];?></td>
<td>
   <?php  if(isset($_SESSION["idmesrdv"]) AND $_SESSION["connecte"]=="mesrdvmodal" AND $_SESSION["idmesrdv"] == $value['0'] ) { ?>

     <input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?> </>



     <button type="button" style="margin-bottom: 50px" class="btn btn-success" data-toggle="modal" data-target="#test"> Detail du Rendez-vous</button>
   <?php } else { ?>
   <form action= "../../backend/process/selectmesrdv.php" method= "post">
    <button name="idmodif" style="margin-bottom: 50px" type="submit" value= " <?php echo $value['0']; ?> " class="btn btn-primary">Choisir le RDV </button> </form> <?php } ?>
 </td>



    	        </tbody>
  <?php  }?>
    	        <thead>
    	            <tr>

                    <th>Date</th>
                    <th>Nom du participant</th>
                    <th>Nom de l'organisateur</th>
                     <th>Validation</th>
                  <th>Compte rendu / Description</th>

                    <th></th>
    	            </tr>
    	        </thead>
    	    </table>

      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">







          </div>
        </div>
      </section>





</br> </br></br> </br></br> </br></br> </br></br>

<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurannulerrdv") {
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
              <h6 class="py-2">Rendez-vous impossible à annuler ! </h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>


<?php } ?>

<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "annulerrdv") {
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
              <h6 class="py-2">Rendez-vous annuler ! </h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>


<?php } ?>

<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "annulerrdv2") {
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
              <h6 class="py-2">Rendez-vous déja annuler ! </h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>


<?php } ?>


        <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "compterendu") {
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
                      <h6 class="py-2">Compte rendu enregistrer ! </h6>


                    </div>
                    <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                      <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                    </div>
                  </div>
                </div>
              </div>



            <?php  } ?>

            <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurcompterendu") {
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
                          <h6 class="py-2">Compte rendu non enregistrer ! </h6>


                        </div>
                        <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                        </div>
                      </div>
                    </div>
                  </div>



                <?php  } ?>



       <?php if ( isset($_SESSION["connecte"]) and $_SESSION["connecte"] == "mesrdvmodal") {
        ?>

       <script type="text/javascript">
       $( document ).ready(function() {
       $('#myModal').modal('toggle')
       });
       </script>



            <div class="modal" id="test" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
              <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">



                    <div class="widget welcome-message text-center">
                      <h2>Détails du rendez-vous</h2>
                      <p>Voici tous les détails de ce rendez-vous</p>
                    </div>

                                             <div class="modal-body text-center">

<form action= "../../backend/process/compterendu.php" method= "post">

  <input type="text"  required="required" name="compterendu" value="" class="border p-3 w-50 my-2" placeholder="Rentrer un compte rendu"> <br> <br>
    <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idmesrdv'] ?> " class="btn btn-success">Rentrer votre compte rendu</button> </form>

</form>


<form action= "../../backend/process/annulerrdv.php" method= "post">
      <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


      <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idmesrdv'] ?> " class="btn btn-danger">Annuler le rdv </button> </form>
<?php }  ?>



</div>
<div class="modal-body text-center"style="margin-bottom: 5px">

<button type="button" class="btn btn-transparent" data-dismiss="modal">Fermer</button>
</div>
<!-- delete-account modal -->
<!-- delete account popup modal start-->
<!-- Modal -->




                               </div>

                               <div class="modal-body text-center"style="margin-bottom: 5px">


                               </div>
                                 <!-- delete-account modal -->
                                 <!-- delete account popup modal start-->
                                 <!-- Modal -->


                </div>
              </div>
            </div>












<!--============================
=            Footer            =
=============================-->
<?php include('../include_frontends/footersadmin.php'); ?>
<!-- Container End -->
<!-- To Top -->

</footer>
<?php include('../include_frontends/plugins.php'); ?>
</body>
<?php $_SESSION['stop'] =0 ;         } else  {
  header("Location: 404.php ");
}?>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#myTable').DataTable();

    $('#myTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

} );

</script>



</PHP>
