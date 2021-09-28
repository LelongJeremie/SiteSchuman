<!DOCTYPE PHP>
<PHP lang="fr">
  <head>
    <?php session_start();   ?>
    <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php




    if (isset($_SESSION['role']) and $_SESSION['role'] == 1 ){



      if (isset($_SESSION['stop']) and  $_SESSION['stop'] ==1) {    $res=$_SESSION["res"];    } // si stop == 1 on prend les valeurs donc les utilisateur de la base de donnée
                                                                            //Sinon on va dans le process pour recupérer ses valeurs
      else {
        $_SESSION['stop']=1; header("Location: ../../backend/process/admin.php");
      }
      ?>

      <?php include '../include_frontends/navh.php'; ?>
      <section class="login py-5 border-top-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-11 align-item-center">
              <div class="border">

                <h3 class="bg-gray p-4 ">Admin</h3>

                <fieldset class="p-4">
                  <form action= "../../backend/process/proadmin.php" method= "post">

                    <select class= "border p-1 w-100 my-1" name ="modif">
                      <?php


                      echo "<option value 0>utilisateur</option>";
                      foreach ($res as $value) {

                        if ( $value["role"] ==1 ){$role = "oui";} else {
                          $role = "non";
                        }
                        echo "<option value=".$value['id'].">" ." ID => ".$value["id"] ." //  nom => ".  $value["nom"] ." // prenom => ". $value["prenom"] ." //  email => ".
                        $value["mail"] ." // pseudo =>  ".$value["username"]."// admin : ".$role."  </option>";
                      }

                      ?>

                    </select>

                    <section class="login py-5 border-top-1"/>


                    <div class="loggedin-forgot">
                      <!--<input type="checkbox" id="keep-me-logged-in">-->

                    </div>

                    <br>
                    <button type="submit" class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Modifier un utilisateur</button>
                  </form>

                </fieldset>

              </div>
            </div>
          </div>
        </div>
      </section>


      <?php if (isset($_SESSION["idadminmodif"]) and $_SESSION["idadminmodif"] > 0 ){ ?>




        <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-2">
          <!-- Edit Profile Welcome Text -->
          <div class="widget welcome-message">
            <h2>Modifier le profile de l'utilisateur choisis</h2>
            <p>Vous pouvez modifier les informations personnels de l'utilisateur choisis</p>
          </div>
          <!-- Edit Personal Info -->
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="widget personal-info">
                <h3 class="widget-header user">Modifier les informations personnels d'un utilisateur en tant qu'admin</h3>
                <form method="post" action="../../backend/process/modificationnomprenomadmin.php">
                  <!-- First Name -->
                  <div class="form-group">
                    <label for="first-name">Prénom actuel de l'utilisateur : <?php  if (isset( $_SESSION["prenomadminmodif"]) ){echo  $method = ucfirst($_SESSION["prenomadminmodif"]); }  ?></label>
                    <input type="text" name = "prenom"
                    <?php

                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "caseprenomvide"){ echo'placeholder="Veuillez rentrer un prenom valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="" class="form-control  p-3 w-100 my-2 " ';} ?> />


                  </div>
                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="last-name">Nom actuel de l'utilisateur : <?php  if (isset( $_SESSION["nomadminmodif"])) {echo $method = ucfirst($_SESSION["nomadminmodif"]);} ?></label>
                    <input type="text" name = "nom"
                    <?php
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "caseprenomvide"){ echo'placeholder="Veuillez rentrer un nom valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="" class="form-control  p-3 w-100 my-2 " ';} ?> />



                  </div>

                  <!-- Submit button -->
                  <button name="typemodif" value="changernomprenom" type="submit" class="btn btn-transparent">Sauvegarder les modifications</button>
                </form>
              </div>


              <!-- Change Email Address -->
              <div class="widget change-email mb-0">
                <h3 class="widget-header user">Changer l'adresse mail</h3>
                <form action="../../backend/process/modificationmailadmin.php" method="post">
                  <!-- Current Password -->
                  <div class="form-group">
                    <label for="current-email">Mail actuel de l'utilisateur : <?php  if (isset( $_SESSION["mailadminmodif"]) ){echo  $method = ucfirst($_SESSION["mailadminmodif"]); }  ?></label>
                    <input type="email" name="mail"
                    <?php

                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasemailvide"){ echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                    if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                    else { echo 'placeholder="" class="form-control  p-3 w-100 my-2 " ';} ?> />

                  </div>

                  <!-- Submit Button -->
                  <button name="typemodif" value="changermail" type="submit" class="btn btn-transparent">Changer le mail</button>

                </form>


                <!-- Change Email Address -->
                <div class="widget change-email mb-0">
                  <h3 class="widget-header user">Changer le Username de l'utilisateur</h3>

                  <form action="../../backend/process/modificationusernameadmin.php" method="post">
                    <!-- Current Password -->
                    <div class="form-group">
                      <label for="current-email">Username de l'utilisateur : <?php  if (isset( $_SESSION["usernameadminmodif"]) ){echo  $method = ucfirst($_SESSION["usernameadminmodif"]); }  ?></label>
                      <input type="username" name="username"
                      <?php

                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecaseusernamevide"){ echo'placeholder="Veuillez rentrer un username valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                      if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "mailvide") { echo'placeholder="Veuillez rentrer un username valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                      else { echo 'placeholder=" Username* " class="form-control  p-3 w-100 my-2 " ';} ?> />

                    </div>

                    <!-- Submit Button -->
                    <button name="typemodif" value="changermail" type="submit" class="btn btn-transparent">Changer le Username</button></form>
                  </div></div></div>
                  <div class="col-lg-6 col-md-6">
                    <!-- Change Password -->
                    <div class="widget change-password">
                      <h3 class="widget-header user">Modifier le mot de passe </h3>
                      <form method="post" action="../../backend/process/modificationpasswordadmin.php">
                        <!-- Current Password -->
                        <div class="form-group">
                          <label for="current-password">Mot de passe actuel de l'utilisateur : <?php  if (isset( $_SESSION["passwordadminmodif"])) {echo $method = ucfirst($_SESSION["passwordadminmodif"]);} ?> (crypté)</label>
                          <input type="password" name="password"  <?php

                          if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "toutecasepasswordvide"){ echo'placeholder="Veuillez rentrer un mot de passe valide *"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                          if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "passwpordvide") { echo'placeholder="Veuillez rentrer un mail valide*"';  echo 'class="form-controlred  p-3 w-100 my-2"' ;}
                          if (isset($_SESSION["erreurcase"]) and $_SESSION["erreurcase"] == "correspondpas") { echo'placeholder="Les mots de passe rentrés ne sont pas identiques*"'; echo 'class="form-controlred p-3 w-100 my-2/>"';}
                          else { echo 'placeholder="" class="form-control  p-3 w-100 my-2"';} ?> />
                        </div>

                        <!-- Submit Button -->
                        <button name="typemodif" value="changermotdepasse" type="submit" class="btn btn-transparent">Modifier le mot de passe</button>
                      </form>

                    </br>
                  </br>
                  <!-- Change Password -->
                  <div class="widget change-password">
                    <h3 class="widget-header user">Modifier le role </h3>


                    <form method="post" action="../../backend/process/modificationroleadmin.php">
                      <!-- Current Password -->
                      <div class="form-group">
                        <label for="current-password">ROLE actuel de l'utilisateur : <?php  if (isset( $_SESSION["roleadminmodif"])  and $_SESSION["roleadminmodif"] ==1 ) {echo "ADMINISTRATEUR ";} else {
                          echo " NON-ADMINISTRATEUR ";
                        } ?> </br></br>CHOISIR ADMINISTRATEUR : </>
                      </br>     </br>     </br>
                      <input  type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="1"
                      checked></BR></BR></BR>

                      CHOISIR NON-ADMINISTRATEUR</> :
                      <input type="radio" name="roleadminmodif" class="form-controlred p-1 w-50 my-1" value="2"
                      ></BR></BR></BR>


                    </div>

                    <!-- Submit Button -->
                    <button name="typemodif" value="changermotdepasse" type="submit" class="btn btn-transparent">Modifier le role</button>
                  </form>
                </DIV>
              </br> </br>
              <a href="" data-toggle="modal" data-target="#deleteaccount"  class="btn btn-transparent">Supprimer le compte</a>

            </ul>
          </div>
          <!-- delete-account modal -->
          <!-- delete account popup modal start-->
          <!-- Modal -->
          <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
          <!-- delete account popup modal end-->
          <!-- delete-account modal -->


        </div>
      </div>
      <div class="col-lg-6 col-md-6">
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>

<?php }?>


</br> </br></br>




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
<?php $_SESSION['stop'] =0 ;         } else  {
  header("Location: 404.php ");
}?>

</PHP>
