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





           <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurjoinrdv") {
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
                         <h6 class="py-2"> Erreur pour rejoindre le rendez-vous : Vous l'avez surement déja rejoint ! </h6>


                       </div>
                       <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                         <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                       </div>
                     </div>
                   </div>
                 </div>



               <?php  } ?>

               <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurdatejoinrdv") {
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
                             <h6 class="py-2"> Erreur pour rejoindre le rendez-vous : Vous n'avez pas entrer de date ! </h6>


                           </div>
                           <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                             <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                           </div>
                         </div>
                       </div>
                     </div>



                   <?php  } ?>


<form action= "../../backend/process/choixrdv.php" method= "post">

               <table id="myTable" class="ui celled table" style="width:100%">
             	        <thead>
             	            <tr>


                            <th>Nom du professeur</th>
                            <th>Prenom du professeur</th>

                            <th></>
             	            </tr>

                         </br>
             	        </thead>


             	        <tbody>
                        <?php foreach ($res as $value) {  ?>
                         <tr>

             	                <td><?php echo $value['nom'];?></td>
             	                <td><?php echo $value['prenom'];?></td>
                              <td><?php  if(isset($_SESSION["idevent"]) AND $_SESSION["connecte"]=="rdvmodal" AND $_SESSION["idevent"] == $value['0'] ) { ?>

                                <input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?> </>



                                <button type="button" style="margin-left:100px" class="d-block py-4 px-22 bg-success text-white border-0 rounded font-weight-bold" data-toggle="modal" data-target="#test"> Detail du Rendez-vous</button>
          <?php }


          else {
            ?>
                                  <button name="idevent" style="margin-left:100px" <?php if ($value['nom']=="Vide") {
                                    echo "disabled";
                                  } ?>  type="submit" value= <?php echo $value['0']; ?> class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Choisir le Rendez-vous</button>

                                </br>
          <?php } ?> </td>
</tbody>
         <?php  }?>
       </form>


             	        <thead>
             	            <tr>
                             <th>Nom du professeur</th>
                             <th>Prenom du professeur</th>
                             <th></>
             	            </tr>
             	        </thead>
             	    </table>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">








          </div>
        </div>
      </section>





</br> </br></br> </br> </br></br> </br></br>

<?php if ( isset($_SESSION["connecte"]) and $_SESSION["connecte"] == "rdvmodal") {
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
               <h2>Détails du RDV</h2>
               <p>Voici tous les détails du RDV</p>
             </div>


<div class="modal-body text-center">

<form action= "../../backend/process/joinrdv.php" method= "post">

<input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>
Date :</br> </br> <input required="required" type="date" name="date" value="" class="border p-3 w-5 my-2" </></br></br>

<button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="btn btn-primary">Rejoindre RDV</button>
</form>






</div>
<div class="modal-body text-center"style="margin-bottom: 5px">

<button type="button" class="btn btn-transparent" data-dismiss="modal">Fermer</button>
</div>
<!-- delete-account modal -->
<!-- delete account popup modal start-->
<!-- Modal -->
<div class="modal" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header border-bottom-0">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body text-center">
<img src="../../style/images/account/Account1.png" class="img-fluid mb-2" alt="">
<h6 class="py-2">Voulez vous vraiment supprimer ce compte?</h6>
<p>Ce procédé est irreversible.</p>

</div>
<div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">

<button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
<form   action="../../backend/process/supprimeradmin.php" method="post" >
<button type="submit" type="button" class="btn btn-danger">Supprimer</button></form>
</div>

</div>
</div>
</div>





                        </div>


                          <!-- delete-account modal -->
                          <!-- delete account popup modal start-->
                          <!-- Modal -->


         </div>
       </div>







    <?php  } ?>



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
