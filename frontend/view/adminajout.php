<!DOCTYPE PHP>
<PHP lang="fr">

      <!-- Demarrage session avec un test pour savoir si on est connecté et si on est admin -->
    <?php include '../include_frontends/nav.php';  ?>
    <?php
  if (isset($_SESSION['role']) and $_SESSION['role'] == 1 ){

     ?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                      <?php if ( $_SESSION["erreurcase"] == "reussis"){ ?>
                        <h3 class="bg-gray p-4">Ajout réussi </br> >Ajouter un autre utilisateur : </h3>
                      <?php }  else {?>
                      <h3 class="bg-gray p-4">Ajouter un utilisateur : </h3>
                    <?php }?>
                        <form action="../../backend/process/adminajout.php" method= "post">
                            <fieldset class="p-4">
                              Nom:
                              <input type="text" name="nom" placeholder="" class="border p-3 w-100 my-2" />
                              Prénom:
                              <input type="text" name="prenom" placeholder="" class="border p-3 w-100 my-2"/>
                              Date de naissance:
                              <input type="date" name="date_naissance" class="border p-3 w-100 my-2"/>
                              Nom d'utilisateur:
                              <input type="text" name="username" placeholder="" class="border p-3 w-100 my-2"/>
                              Mail:
                              <input type="email" name="mail" placeholder="" class="border p-3 w-100 my-2"/>
                              Mot de passe:
                              <input type="password" name="password" placeholder="" class="border p-3 w-100 my-2"/>
                            </br> </br>
                                <div class="form-group">
                                  <label for="current-password">ROLE : </br>
                                     </br>Admin: </br>
                              <input  type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="1" checked/></BR>
                                  professeur: </br>
                                <input  type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="2"/></BR>
                                      parent : </br>
                                <input type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="3"></BR>
                                      eleve : </br>
                                <input type="radio" name="role" class="form-controlred p-1 w-50 my-1" value="4"></BR>


                                </div>


                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <label for="registering" class="px-2">En vous inscrivant vous acceptez nos <a class="text-primary font-weight-bold" href="terms-condition.PHP">termes et conditions et politique de confidentialité</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">S'inscrire</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
    =            Footer            =
    =============================-->
<?php include('../include_frontends/footers.php'); ?>
      <!-- Container End -->
      <!-- To Top -->

    </footer>

<?php include('../include_frontends/plugins.php'); ?>
    </body>
<?php $_SESSION["erreurcase"] = ''; } else {

  header("Location: 404.php");
}?>

</PHP>
