<!DOCTYPE html>
<?php require_once 'bdd/bdd.php'

 ?>


<table id="myTable" class="ui celled table" style="width:100%">
            <thead>
                <tr>


                  <th>titre</th>
                 <th>date</th>
                 <th>lieu</th>
                 <th>createur</th>
                 <th>resume</th>
                 <th>nombre de participant</th>

                  <th></>
                </tr>

              </br>
            </thead>

            <tbody>
                <tr>
                  <?php foreach ($listeEvenement as $value) { ?>
                    <td><?php echo $value['titre'];?></td>
                    <td><?php echo $value['date'];?></td>
                    <td><?php echo $value['lieu']; ?></td>
                    <td><?php echo $value['createur'];?></td>
                    <td><?php echo $value['resume'];?></td>
                    <td><?php echo $value['nb_participant'];?></td>


                    <input type="hidden" name="titre" value="<?php $value['titre']; ?>" </>
                    <input type="hidden" name="date" value="<?php $value['date']; ?>" </>
                    <input type="hidden" name="lieu" value="<?php $value['lieu']; ?>" </>
                    <input type="hidden" name="createur" value="<?php $value['createur']; ?>" </>
                    <input type="hidden" name="resume" value="<?php $value['resume']; ?>" </>
                    <input type="hidden" name="nb_participant" value="<?php $value['nb_participant']; ?>" </>



                </tr>

            </tbody>
<?php  }?>
            <tfoot>
                <tr>
                  <th>titre</th>
                 <th>date</th>
                 <th>lieu</th>
                 <th>createur</th>
                 <th>Resume</th>
                 <th>nombre de participant</th>

                 <th></>
                </tr>
            </tfoot>
        </table>
    <section class="login py-5 border-top-1">
      <div class="container">
        <div class="row justify-content-center">



            </form>



        </div>
      </div>
    </section>

</html>
