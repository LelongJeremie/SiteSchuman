<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start();
     ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role']) OR !isset($_SESSION['role'])  ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==1) {    $res=$_SESSION["rev"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                            //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=1; header("Location: ../../backend/process/event.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

       ?>

 <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>



<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurjoinevent") {
 ?>
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
        <h6 class="py-2">Erreur pour rejoindre l'evenement : Vous l'avez surement déja rejoint ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>

<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "event") {
 ?>
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
        <h6 class="py-2"> Evenement pas rejoint ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>

       <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "eventmodal") {
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
                      <h2>Détails de l'evenement</h2>
                      <p>Voici tout les détails de cet evenement</p>
                    </div>

                                             <div class="modal-body text-center">
                                               <?php if ($_SESSION['role']=="2" OR $_SESSION['role'] =="1" ) {
                                                  if($_SESSION['validationevent']==0){ echo ' <h3 class="widget-header user" > Evenement pas validé :  </h3> ❌';}
                                                 else {
                         echo '<h3 class="widget-header user" > Evenement pas validé :  </h3>✔️';
                       }}?> </h3>

                                               <h3 class="widget-header user">Prénom du créateur :</h3> <?php echo $_SESSION["createur"]; ?>
                                                <h3 class="widget-header user">Date de l'evenement :</h3> <?php $date = date_parse($_SESSION['date_event']);
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
                          ?>
                        <h3 class="widget-header user">Lieu de l'evenement : </h3> <?php if ($_SESSION['lieu'] != "Dugny" or $_SESSION['lieu'] != "dugny" ) {
                          echo "Externe : ".$_SESSION['lieu'];
                          } else {
                          echo "Interne : ".$_SESSION['lieu'];
                          }?></h3>

                          <h3 class="widget-header user">Description de l'evenement:</h3> <?php echo $_SESSION["resume"]; ?>
                          <h3 class="widget-header user">Nombre de participant à l'evenement :</h3> <?php echo $_SESSION["nb_participant"]; ?>
                                                        <h3 class="widget-header user">Nombre de participant maximum à l'evenement : </h3><?php echo $_SESSION["nb_parti_max"]; ?>

                                                            <form action= "../../backend/process/joinevent.php" method= "post">
                                                              <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


  <button name="idevent" style="margin-left:100px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Rejoindre l'evenement</button> </form>
                                         </br>

                               </div>

                               <div class="modal-body text-center"style="margin-bottom: 5px">


                               </div>
                                 <!-- delete-account modal -->
                                 <!-- delete account popup modal start-->
                                 <!-- Modal -->


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



               <?php  }  ?>

               <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "event") {
                ?>
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
                       <h6 class="py-2"> Evenement pas rejoint ! </h6>


                     </div>
                     <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                       <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                     </div>
                   </div>
                 </div>

               </div>
               <?php } ?>




              <form action= "../../backend/process/choixevent.php" method= "post">

      <table id="myTable" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>


                   <th>titre</th>
                   <th>date</th>
                   <th>lieu</th>
                   <th>resume</th>
                   <?php  if (isset($_SESSION['role']) AND $_SESSION['role']=="2" OR isset($_SESSION['role']) AND $_SESSION['role'] =="1" ) { ?>
                   <th>validation</th>
                   <?php } ?>
                     <?php if (isset($_SESSION["id"])) { ?>
                   <th></> <?php } ?>
    	            </tr>

                </br>
    	        </thead>

    	        <tbody>
    	            <tr>
                    <?php foreach ($res as $value) { ?>

    	                <td><?php echo $value['titre'];?></td>
    	                <td><?php $date = date_parse($value['date_event']);
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

                      <td><?php if ($value['lieu'] != "Dugny" or $value['lieu'] != "dugny" ) {
                      echo "Externe : ".$value['lieu'];
                    } else {
                      echo "Interne : ".$value['lieu'];
                    }?></td>

    	                <td><?php echo $value['resume'];?></td>

                      <?php  if (isset($_SESSION['role']) AND $_SESSION['role']=="2" OR isset($_SESSION['role']) AND $_SESSION['role'] =="1" ) { ?>
                        <td><?php if($value['validationevent']==0){ echo "Evenement pas validé : ❌";}
                          else {
  echo "Evenement validé : ✔️";
                          }?></td>
                      <?php } ?>



                      <input type="hidden" name="idevent" value="<?php $value['id']; ?>" </>

                      <input type="hidden" name="titre" value="<?php $value['titre']; ?>" </>
                      <input type="hidden" name="date" value="<?php $value['date_event']; ?>" </>
                      <input type="hiden" name="lieu" value="<?php $value['lieu']; ?>" </>
                      <input type="hidden" name="createur" value="<?php $value['createur']; ?>" </>
                      <input type="hidden" name="resume" value="<?php $value['resume']; ?>" </>
                      <input type="hidden" name="nb_participant" value="<?php $value['nb_participant']; ?>" </>
                  <?php if (isset($_SESSION["id"])) {  ?><td><?php  if(isset($_SESSION["idevent"]) AND $_SESSION["connect"]=="eventmodal" AND $_SESSION["idevent"] == $value['0'] ) { ?>
                      <input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?> </>
  <button type="button" style="margin-left:100px" class="d-block py-4 px-22 bg-success text-white border-0 rounded font-weight-bold" data-toggle="modal" data-target="#test"> Detail de l'evenement</button>
<?php } else {
  ?>
                        <button name="idevent" style="margin-left:100px" type="submit" value= <?php echo $value['0']; ?> class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Choisir l'evenement</button>
                      </br>
<?php } ?> </td>
<?php }?>
    	            </tr>

    	        </tbody>
  <?php  }?>
    	        <thead>
    	            <tr>
                    <th>titre</th>
                    <th>date</th>
                    <th>lieu</th>
                    <th>resume</th>
                    <?php  if (isset($_SESSION['role']) AND $_SESSION['role']=="2" OR isset($_SESSION['role']) AND $_SESSION['role'] =="1" ) { ?>
                    <th>validation</th>
                    <?php } ?>
                    <?php if (isset($_SESSION["id"])) { ?>
                  <th></> <?php } ?>
    	            </tr>
    	        </thead>
    	    </table>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">



              </form>



          </div>
        </div>
      </section>





</br> </br></br></br> </br></br></br> </br></br>




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
