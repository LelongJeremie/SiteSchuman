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
        $_SESSION['stop']=1; header("Location: ../../backend/process/event.php");
      }
      ?>

      <?php include '../include_frontends/navadmin.php';

       ?>



<?php var_dump($_SESSION)?>


              <form action= "../../backend/process/joinevent.php" method= "post">

      <table id="myTable" class="ui celled table" style="width:100%">
    	        <thead>
    	            <tr>


                   <th>titre</th>
                   <th>date</th>
                   <th>lieu</th>
                   <th>createur</th>
                   <th>resume</th>
                   <th>nb_participant</th>
                   <th></>
    	            </tr>

                </br>
    	        </thead>

    	        <tbody>
    	            <tr>
                    <?php foreach ($res as $value) { ?>
    	                <td><?php echo $value['titre'];?></td>
    	                <td><?php echo $value['date_event'];?></td>
                      <td><?php echo $value['lieu']; ?></td>
    	                <td><?php echo $value['createur'];?></td>
    	                <td><?php echo $value['resume'];?></td>
    	                <td><?php echo $value['nb_participant'];?></td>

                      <input type="hidden" name="titre" value="<?php $value['titre']; ?>" </>
                      <input type="hidden" name="date" value="<?php $value['date_event']; ?>" </>
                      <input type="hidden" name="lieu" value="<?php $value['lieu']; ?>" </>
                      <input type="hidden" name="createur" value="<?php $value['createur']; ?>" </>
                      <input type="hidden" name="resume" value="<?php $value['resume']; ?>" </>
                      <input type="hidden" name="nb_participant" value="<?php $value['nb_participant']; ?>" </>
                      <input type="hidden" name="id" value="<?php $_SESSION['id']; ?>" </>



                    <td>  <button name="idmodif" style="margin-left:150px"  type="submit" value= <?php echo $value['id']; ?> class="d-block py-4 px-22 bg-primary text-white border-0 rounded font-weight-bold">Rejoindre l'evenement</button></td>

    	            </tr>

    	        </tbody>
  <?php  }?>
    	        <thead>
    	            <tr>
                    <th>titre</th>
                    <th>date</th>
                    <th>lieu</th>
                    <th>createur</th>
                    <th>resume</th>
                    <th>nb_participant</th>
                    <th></>
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


      <?php if (isset($_SESSION["idadminmodif"]) and $_SESSION["idadminmodif"] > 0 ){ ?>





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
    $('#myTable').DataTable();
} );

</script>


</PHP>
