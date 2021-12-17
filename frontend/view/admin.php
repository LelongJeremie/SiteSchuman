<!DOCTYPE PHP>
<PHP lang="fr">
  <head>

    <?php session_start();
     ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role']) and $_SESSION['role'] == 1 ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==1) {    $res=$_SESSION["res"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                            //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=1; header("Location: ../../backend/process/admin.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

       ?>

 <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>



     <div class="modal" id="test" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel">
       <div class="modal-dialog modal-dialog modal-lg" role="document">
         <div class="modal-content">

           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>

             <div class="widget welcome-message text-center">
               <h2>Modifier le profile de l'utilisateur choisis</h2>
               <p>Vous pouvez modifier les informations personnels de l'utilisateur choisis</p>
             </div>


           <div class="modal-body text-center">
             <div class="widget personal-info">
               <h3 class="widget-header user">Modifier les informations personnels d'un utilisateur en tant qu'admin</h3>
               <form method="post" action="../../backend/process/modificationnomprenomadmin.php">
                 <!-- First Name -->
                 <div class="form-group">
                   <label for="first-name">Prénom actuel de l'utilisateur : <?php  if (isset( $_SESSION["prenomadminmodif"]) ){ ?></label>
                   <input type="text" name = "prenom"
                   <?php

                   if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "caseprenomvide"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                   else { echo 'value='.$_SESSION["prenomadminmodif"].' class="form-control  p-3 w-100 my-2 " ';}} ?> />


                 </div>
                 <!-- Last Name -->
                 <div class="form-group">
                   <label for="last-name">Nom actuel de l'utilisateur : <?php  if (isset( $_SESSION["nomadminmodif"])) { ?></label>
                   <input type="text" name = "nom"
                   <?php
                   if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "caseprenomvide"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                   else { echo 'value='.$_SESSION["nomadminmodif"].' class="form-control  p-3 w-100 my-2 " ';}} ?> />



                 </div>

                 <!-- Submit button -->
                 <button name="typemodif" value="changernomprenom" type="submit" class="btn btn-transparent">Sauvegarder les modifications</button>
               </form>
             </div>
           </div>

                                      <!-- Change Email Address -->
                                      <div class="modal-body text-center">
                                      <div class="widget change-email mb-0">
                                        <h3 class="widget-header user">Changer l'adresse mail</h3>
                                        <form action="../../backend/process/modificationmailadmin.php" method="post">
                                          <!-- Current Password -->
                                          <div class="form-group">
                                            <label for="current-email">Mail actuel de l'utilisateur : <?php  if (isset( $_SESSION["mailadminmodif"]) ){  ?></label>
                                            <input type="email" name="mail"
                                            <?php

                                            if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasemailvide"){ echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                            if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                            else { echo 'value='.$_SESSION["mailadminmodif"].' class="form-control  p-3 w-100 my-2 " ';} }?> />

                                          </div>

                                          <!-- Submit Button -->
                                          <button name="typemodif" value="changermail" type="submit" class="btn btn-transparent">Changer le mail</button>

                                        </form>
                                      </div>

                                        <!-- Change Email Address -->
                                        <div class="widget change-email mb-0">
                                          <h3 class="widget-header user">Changer le Username de l'utilisateur</h3>

                                          <form action="../../backend/process/modificationusernameadmin.php" method="post">
                                            <!-- Current Password -->
                                            <div class="form-group">
                                              <label for="current-email">Username de l'utilisateur : <?php  if (isset( $_SESSION["usernameadminmodif"]) ){  ?></label>
                                              <input type="username" name="username"
                                              <?php

                                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecaseusernamevide"){ echo'placeholder="Veuillez rentrer un username valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                              if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un username valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                              else { echo 'value='.$_SESSION["usernameadminmodif"].' class="form-control  p-3 w-100 my-2 " ';} }?> />

                                            </div>

                                            <!-- Submit Button -->
                                            <button name="typemodif" value="changermail" type="submit" class="btn btn-transparent">Changer le Username</button></form>
                                          </div></div>
                                          <!-- Change Password -->

                                          <div class="widget change-password">
                                            <div class="modal-body text-center">
                                            <h3 class="widget-header user">Modifier le mot de passe </h3>
                                            <form method="post" action="../../backend/process/modificationpasswordadmin.php">
                                              <!-- Current Password -->
                                              <div class="form-group">
                            <label for="Mot de passe"> Mot de passe : <?php  if (isset( $_SESSION["nomadminmodif"])) { ?></label>
                                                <input type="password" name="password"  <?php

                                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasepasswordvide"){ echo'placeholder="Veuillez rentrer un mot de passe valide *"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwpordvide") { echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                                                if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "correspondpas") { echo'placeholder="Les mots de passe rentrés ne sont pas identiques*"'; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                                                else { echo 'placeholder="Mot de passe " class="form-control  p-3 w-100 my-2"';} }?> />
                                              </div>

                                              <!-- Submit Button -->
                                              <button name="typemodif" value="changermotdepasse" type="submit" class="btn btn-transparent">Modifier le mot de passe</button>
                                            </form>
                                          </div>
                                          </br>
                                        </br>
                                        <!-- Change Password -->
                                        <div class="modal-body text-center">
                                        <h3 class="widget-header user">Modifier le role </h3>


                                        <form method="post" action="../../backend/process/modificationroleadmin.php">
                                          <!-- Current Password -->
                                          <div class="form-group">
                                            <label for="current-password">ROLE actuel de l'utilisateur : <?php  if (isset( $_SESSION["roleadminmodif"])  and $_SESSION["roleadminmodif"] ==1 ) {echo "ADMINISTRATEUR ";} if (isset( $_SESSION["roleadminmodif"])  and $_SESSION["roleadminmodif"] ==2 ) {echo "PROFESSEUR  " ;}
                                            if (isset( $_SESSION["roleadminmodif"])  and $_SESSION["roleadminmodif"] ==3 ) {echo "PARENT ";} if (isset( $_SESSION["roleadminmodif"])  and $_SESSION["roleadminmodif"] ==4 ) {echo "ELEVE";}?>
                                          </br></br>CHOISIR ADMINISTRATEUR : </>
                                          </br>     </br>     </br>
                                          <input  type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="1"
                                          checked></BR>

                                          CHOISIR Professeur :  </br>
                                          <input type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="2"
                                          checked></BR>
                                        CHOISIR Parent  :  </br>
                                          <input type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="3">
</BR>
CHOISIR eleve  :  </br>
  <input type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="4">
</BR>

                                        </div>

                                        <!-- Submit Button -->
                                        <button name="typemodif" value="changermotdepasse" type="submit" class="btn btn-transparent">Modifier le role</button>
                                      </form>
                                    </DIV>
                                  </div>
                                  </br>
                                  <div class="modal-body text-center">


                                    <form action= "../../backend/process/desactivationutilisateur.php" method= "post">
                                          <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


                                          <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idadminmodif']?> " class="btn btn-danger">desactivé l'utilisateur </button> </form>

                                          <form action= "../../backend/process/activationutilisateur.php" method= "post">
                                                <input type="hidden" name="id" value="<?php echo  $_SESSION['id']; ?>" </>


                                                <button name="idevent" style="margin-bottom: 50px" type="submit" value= " <?php echo $_SESSION['idadminmodif']?> " class="btn btn-success">activé l'utilisateur </button> </form>


                        </div>
                        <div class="modal-body text-center"style="margin-bottom: 5px">

                          <button type="button" class="btn btn-transparent" data-dismiss="modal">Fermer</button>
                        </div>



         </div>
       </div>
     </div>


              <form action= "../../backend/process/proadmin.php" method= "post">

      <table id="aze" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>
                    <th>Nom</th>
                   <th>Prenom</th>
                   <th>Pseudo</th>
                   <th>Date de Naissance</th>
                   <th>Role</th>
                   <th>Id famille</th>
                   <th>Classe</th>
                   <th>Mail</th>
                   <Th>Validation</th>
                    <th></>
    	            </tr>

                </br>
    	        </thead>

    	        <tbody>

                    <?php foreach ($res as $value) { ?>
                    <tr>
    	                <td><?php echo $value['nom'];?></td>
    	                <td><?php echo $value['prenom'];?></td>
                      <td><?php echo $value['username']; ?></td>
                      <td><?php $date = date_parse($value['date_naissance']);
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
    	                <td><?php if ($value['role'] =="1") {
                        echo "Admin";
                      }
                      if ($value['role'] =="2") {
                        echo "Professeur";
                      }
                      if ($value['role'] =="3") {
                        echo "parent";
                      }

                      if ($value['role'] =="4") {
                        echo "Eleve";
                      } ?></td>
                      <td><?php echo $value['id_famille'];?></td>
    	                <td><?php echo $value['classe'];?></td>
    	                <td><?php echo $value['mail'];?></td>

                      <td><?php  if($value['validation']==0){ echo ' Utilisateur non-valider : ❌';}
                         elseif($value['validation']==1) {
                      echo ' Utilisateur valider : ✔️';
                    }   elseif($value['validation']==2) { echo ' Utilisateur desactivé : ❌';  } elseif($_SESSION['connect']=="annuleruser") { echo ' Utilisateur desactivé : ❌';  } ?></td>



                      <input type="hidden" name="nom" value="<?php $value['nom']; ?>" </>
                      <input type="hidden" name="prenom" value="<?php $value['prenom']; ?>" </>
                      <input type="hidden" name="username" value="<?php $value['username']; ?>" </>
                      <input type="hidden" name="date_naissance" value="<?php $value['date_naissance']; ?>" </>
                      <input type="hidden" name="role" value="<?php $value['role']; ?>" </>
                      <input type="hidden" name="classe" value="<?php $value['classe']; ?>" </>
                      <input type="hidden" name="mail" value="<?php $value['mail']; ?>" </>

                    <td>

                    <?php if ( isset($_SESSION['idadminmodif']) AND $_SESSION['idadminmodif'] == $value['id'] ) {  ?>

                      <button type="button" style="margin-left:100px" class="d-block py-4 px-1 bg-success text-white border-0 rounded font-weight-bold" data-toggle="modal" data-target="#test">ㅤModifier l'utilisateurㅤ</button></td>

    	            </tr>
  <?php  } else  {    ?> <button name="idmodif" style="margin-left:100px" type="submit" value= <?php echo $value['id']; ?> class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">ㅤChoisir l'utilisateurㅤ</button> <?php }} ?>
    	        </tbody>

    	        <thead>
    	            <tr>
                    <th>Nom</th>
                   <th>Prenom</th>
                   <th>Pseudo</th>
                   <th>Date de Naissance</th>
                   <th>Role</th>
                   <th>Id famille</th>
                   <th>Classe</th>
                   <th>Mail</th>
                   <th>Validation</th>
                   <th></>
    	            </tr>
    	        </thead>
    	    </table>



      <?php if (isset($_SESSION["idadminmodif"]) and $_SESSION["idadminmodif"] > 0 ){ ?>





</div>
</div>
</div>
</div>
</section>

<?php }?>


</br> </br></br>


<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "activation") {
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
              <h6 class="py-2">Compte activé !</h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>



    <?php  } ?>

    <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "activation2") {
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
                  <h6 class="py-2">Compte déjà activé !</h6>


                </div>
                <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                </div>
              </div>
            </div>
          </div>



        <?php  } ?>

<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "desactivation") {
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
              <h6 class="py-2">Compte desactivé !</h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>



    <?php  } ?>



<?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "desactivation2") {
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
              <h6 class="py-2">Compte déjà desactivé !</h6>


            </div>
            <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

              <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

            </div>
          </div>
        </div>
      </div>



    <?php  } ?>

    <?php if ( isset($_SESSION["connect"]) and $_SESSION["connect"] == "modificationadminreussis") {
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
                  <h6 class="py-2">Modification effectué!</h6>


                </div>
                <div class="modal-footer border-top-0 mb-2 mx-4 justify-content-center">

                  <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer le pop-up</button>

                </div>
              </div>
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
    $('#aze').DataTable();
} );


</script>


</PHP>
