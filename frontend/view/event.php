<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start();
     ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role']) OR !isset($_SESSION['role'])  ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==1 ) {    $res=$_SESSION["rev"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                          //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=1; header("Location: ../../backend/process/event.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

       ?>

 <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>






              <form action= "../../backend/process/choixevent.php" method= "post">

      <table id="myTable" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>


                   <th>Titre</th>
                   <th>Date</th>
                   <th>Lieu</th>
                   <th>Place disponible</th>
                   <th>Resume</th>

                   <th>Validation</th>

                     <?php if (isset($_SESSION["id"])) { ?>
                   <th></> <?php } ?>
    	            </tr>

                </br>
    	        </thead>

    	        <tbody>
                  <?php foreach ($res as $value) { ?>
    	            <tr>


    	                <td><?php echo $value['titre'];?></td>
    	                <td><?php if ($_SESSION["reZdate"]=="aucun") { echo "aucun"; }
                      else {


                     $date = date_parse($value['date_event']);
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
}?></td>

                      <td><?php if ($_SESSION["reZdate"]=="aucun") {echo "aucun";} elseif ($value['lieu'] != "Dugny" or $value['lieu'] != "dugny" ) {
                      echo "Externe : ".$value['lieu'];
                    } else {
                      echo "Interne : ".$value['lieu'];
                    }?></td>

    	                <td><?php echo "Nombre de place restante : ".$value['nb_participant'];?></td>
                      <td><?php echo $value['resume'];?></td>


                        <td><?php   if ($_SESSION["reZdate"]=="aucun") {echo "aucun";} elseif($value['validationevent']==0){ echo '  Evenement pas validé : ❌';}
                           elseif($value['validationevent']==1) {
 echo ' Evenement validé : ✔️';
}   elseif($value['validationevent']==3) { echo ' Evenement annulé : ❌';  } elseif($_SESSION['connect']=="annulerevent") { echo ' Evenement annulé : ❌';  }?></td>





                      <input type="hidden" name="titre" value="<?php echo $value['titre']; ?>" </>
                      <input type="hidden" name="date" value="<?php echo $value['date_event']; ?>" </>
                      <input type="hidden" name="lieu" value="<?php echo $value['lieu']; ?>" </>
                      <input type="hidden" name="createur" value="<?php echo $value['createur']; ?>" </>
                      <input type="hidden" name="resume" value="<?php echo $value['resume']; ?>" </>
                      <input type="hidden" name="nb_participant" value="<?php echo $value['nb_participant']; ?>" </>



                  <?php if (isset($_SESSION["id"])) {  ?>

                    <td><?php  if(isset($_SESSION["idevent"]) AND $_SESSION["connecte"]=="eventmodal" AND $_SESSION["idevent"] == $value['0'] and $_SESSION["reZdate"]!="aucun"  ) { ?>

                      <input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?> </>



                      <button type="button" style="margin-left:100px" class="d-block py-4 px-22 bg-success text-white border-0 rounded font-weight-bold" data-toggle="modal" data-target="#test"> Detail de l'evenement</button>
<?php }


else {
  ?>
                        <button name="idevent" style="margin-left:100px" type="submit" value= <?php echo $value['0']; ?> class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Choisir l'evenement</button>


                      </br>
<?php } ?> </td>
<?php }?>
    	            </tr>
  <?php  }?>
    	        </tbody>

    	        <thead>
    	            <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Lieu</th>
                     <th>Place disponible</th>
                    <th>Resume</th>

                    <th>Validation</th>

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


<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurjoineventorg") {
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
        <h6 class="py-2">Erreur pour rejoindre l'evenement : Vous l'avez surement déja rejoint (en tant qu'organisateur) ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>

<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "evenementannuler") {
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
        <h6 class="py-2">Erreur pour rejoindre l'evenement : Evenement annulé ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>


<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurjoineventplace") {
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
        <h6 class="py-2">Erreur pour rejoindre l'evenement : evenement complet ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>


<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "annulerevent") {
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
        <h6 class="py-2"> Evenement annuler ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>

<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "annulerevent2") {
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
        <h6 class="py-2"> Evenement déjà annuler ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>

<?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "erreurannulerevent") {
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
        <h6 class="py-2"> Evenement impossible à annuler ! </h6>


      </div>
      <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

      </div>
    </div>
  </div>

</div>
<?php } ?>


       <?php if ( isset($_SESSION["connecte"]) and $_SESSION["connecte"] == "eventmodal") {
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
                                               <?php
                                                  if($_SESSION['validationevent']==0){ echo ' <h3 class="widget-header user" > Evenement pas validé :  </h3> ❌';}
                                                   if($_SESSION['validationevent']==1) {
                         echo '<h3 class="widget-header user" > Evenement validé :  </h3>✔️';
                       }   if($_SESSION['validationevent']==3) { echo ' <h3 class="widget-header user" > Evenement annulé :  </h3> ❌';}?> </h3>


<?php $rem = $_SESSION["participantevent"] ; if ($_SESSION["participantevent"] != 1) { ?>
                                               <table id="myTable2" class="ui celled table" style="width:100%">
                                                       <thead>
                                                           <tr>


                                                             <th>Nom</th>
                                                             <th>Prenom</th>



                                                           </tr>

                                                         </br>
                                                       </thead>

                                                       <tbody>
                                                           <tr>
                                                             <?php

                                                              foreach ($rem as $value) { ?>

                                                               <td><h3 class="widget-header user">Nom d'un participant :</h3> <?php echo $value["nom"]; ?></td>

                                                               <td>
                                                               <h3 class="widget-header user">Prénom d'un participant :</h3> <?php echo $value["prenom"]; ?></td>

                                                           </tr>

                                                       </tbody>
                                             <?php  }?>
                                                       <thead>
                                                           <tr>
                                                             <th>Nom</th>
                                                             <th>Prenom</th>

                                                           </tr>
                                                       </thead>
                                                   </table>
                                                 <?php } ?>

                                                   <table id="myTable2" class="ui celled table" style="width:100%">
                                                           <thead>
                                                               <tr>


                                                                 <th>Nom</th>
                                                                 <th>Prenom</th>



                                                               </tr>

                                                             </br>
                                                           </thead>

                                                           <tbody>
                                                               <tr>
                                                                 <?php $rem = $_SESSION["organisateurevent"] ; foreach ($rem as $value) { ?>

                                                                   <td><h3 class="widget-header user">Nom d'un organisateur :</h3> <?php echo $value["nom"]; ?></td>

                                                                   <td>
                                                                   <h3 class="widget-header user">Prénom d'un organisateur  :</h3> <?php echo $value["prenom"]; ?></td>

                                                               </tr>

                                                           </tbody>
                                                   <?php  }?>
                                                           <thead>
                                                               <tr>
                                                                 <th>nom</th>
                                                                 <th>prenom</th>

                                                               </tr>
                                                           </thead>
                                                       </table>


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
                          <h3 class="widget-header user">Nombre de place(s) restante(s) :</h3> <?php echo $_SESSION["nb_participant"]; ?>
                                                        <h3 class="widget-header user">Nombre de participant maximum à l'evenement : </h3><?php echo $_SESSION["nb_parti_max"]; ?>
</br></br></br></br></br></br>


<div class="modal-body text-center">

  <form action= "../../backend/process/joinevent.php" method= "post">
    <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


    <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="btn btn-primary">Rejoindre l'evenement en tant que participant</button> </form>

    <form action= "../../backend/process/joineventorg.php" method= "post">
      <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


      <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="btn btn-primary">Rejoindre l'evenement en tant qu'organisateur</button> </form>
<?php if (isset($_SESSION['role']) AND $_SESSION['role']=="2" OR isset($_SESSION['role']) AND $_SESSION['role'] =="1" ) {
?>
<form action= "../../backend/process/valideevent.php" method= "post">
      <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


      <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="btn btn-success">Valider l'event </button> </form>

<form action= "../../backend/process/annulerevent.php" method= "post">
      <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


      <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idevent']; ?> " class="btn btn-danger">Annuler l'event </button> </form>
<?php }  ?>



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

                               <div class="modal-body text-center"style="margin-bottom: 5px">


                               </div>
                                 <!-- delete-account modal -->
                                 <!-- delete account popup modal start-->
                                 <!-- Modal -->


                </div>
              </div>
            </div>






           <?php  } ?>

           <?php  if ( isset($_SESSION["connectn"]) and $_SESSION["connect"] == "erreurjoinevent") {
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



               <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "valideevent") {
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
                       <h6 class="py-2"> Evenement validé. </h6>


                     </div>
                     <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                       <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                     </div>
                   </div>
                 </div>

               </div>
               <?php } ?>

               <?php  if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "valideevent1") {
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
                       <h6 class="py-2"> Evenement déjà validé.</h6>


                     </div>
                     <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                       <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                     </div>
                   </div>
                 </div>

               </div>
               <?php } ?>


                       <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "eventcree") {
                        ?>
                   <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
                       <script type="text/javascript">
                   $( document ).ready(function() {
                       $('#myModal').modal('toggle')

                   });
                   </script>


                             <div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                                     <h6 class="py-2">Event créée : il sera validé par un professeur ou un admin </h6>


                                   </div>
                                   <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                                     <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                                   </div>
                                 </div>
                               </div>
                             </div>



                           <?php } ?>
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

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#myTable2').DataTable();

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

</script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#myTable3').DataTable();

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
