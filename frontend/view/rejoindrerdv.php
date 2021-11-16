<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start();
     ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role'])  ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==3) {    $res=$_SESSION["reo"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                            //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=3; header("Location: ../../backend/process/afficherprof.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

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
                     <h6 class="py-2"> Evenement rejoint ! </h6>


                   </div>
                   <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                     <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                   </div>
                 </div>
               </div>
             </div>



           <?php  } ?>

           <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurjoinevent") {
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
                         <h6 class="py-2"> Erreur pour rejoindre l'evenement : Vous l'avez surement déja rejoint ! </h6>


                       </div>
                       <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                         <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                       </div>
                     </div>
                   </div>
                 </div>



               <?php  } ?>





      <table id="myTable" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>


<<<<<<< HEAD

                   <th>date</th>
                   <th>nom du participant</th>
                   <th>nom de l'organisateur</th>


=======
                   <th>Nom des professeurs</th>
                   <th></>
>>>>>>> ee02edf9487c441d18441f64cfef95991f634018
    	            </tr>

                </br>
    	        </thead>

    	        <tbody>
    	            <tr>
                    <?php foreach ($res as $value) { ?>
<<<<<<< HEAD

    	                <td><?php echo $value['date_rdv'];?></td>
                      <td><?php echo $value['nom']; ?></td>
    	                <td><?php echo $value['prenom'];?></td>
=======
    	                <td><?php echo $value['nomprof'];?></td>
>>>>>>> ee02edf9487c441d18441f64cfef95991f634018

                      <input type="hidden" name="nomprof" value="<?php $value['nomprof']; ?>" </>


                 </>





    	            </tr>

    	        </tbody>
  <?php  }?>
    	        <thead>
    	            <tr>
<<<<<<< HEAD

                    <th>date</th>
                    <th>nom du participant</th>
                    <th>nom de l'organisateur</th>

=======
                    <th>Nom des professeurs</th>
                    <th></>
>>>>>>> ee02edf9487c441d18441f64cfef95991f634018
    	            </tr>
    	        </thead>
    	    </table>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">







          </div>
        </div>
      </section>





</br> </br></br>




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
