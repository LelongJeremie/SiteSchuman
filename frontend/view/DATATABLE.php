<section class="about-section text-center" id="about">
          <div class="container px-4 px-lg-5">
              <div class="row gx-4 gx-lg-5 justify-content-center">
                  <div class="col-lg-8">
                      <h2 class="text-white mb-4">TOUS NOS UTILISATEUR</h2>
                  </div>
              </div>
          </div>
      </section>
      <!-- Projects-->
      <section class="projects-section bg-light" id="projects">
          <div class="container px-4 px-lg-5">
              <!-- Featured Project Row-->

              <div class="featured-text text-center text-lg-left">
                  <h4>stock total</h4>
                  <p class="text-black-50 mb-0">le stock total de notre materiel.</p>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <?php
                            require_once 'manager/Manager.php';
                            $listeUtilisateur = new Manager();
                            $res = $listeutilisateur->listeUtilisateur();
                            ?>

                            <body>
                              <table id="example" class="display" style="width:100%">
                                <thead>
                                  <tr>

                                    <th>nom </th>
                                    <th>PRENOM</th>

                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($res as $value) {

                                  echo '<tr>

                                    <td name="id" value="nom_materiel">'.$value['nom_materiel'].'</td>
                                    <td name="nom" value="quantite_total">'.$value['quantite_total'].'</td>




                                    <td>
                                      <form method="post" action="vue/supprimer.php">
                                        <input name="nom_materiel" value="'.$value['nom_materiel'].'" hidden />
                                        <input name="quantite_total" value="'.$value['quantite_total'].'" hidden />

                                        <input type="submit" value="supprimer" />
                                      </form>
                                    </td>
                                    <td>

                                    </td>

                                  </tr>';
                                } ?>
                                </tbody>
                                <tfoot>
                                  <tr>

                                    <th>nom materiel</th>
                                    <th>quantite total</th>
                                    <?php
                                    echo' <th><form method="post" action="vue/ajout.php">
                                      <input name="nom_materiel" value="'.$value['nom_materiel'].'" hidden />
                                        <input name="quantite_total" value="'.$value['quantite_total'].'" hidden />
                                        <input name="quantite_dispo" value="'.$value['quantite_dispo'].'" hidden />
                                          <input name="quantite_utilise" value="'.$value['quantite_utilise'].'" hidden />
                                          <input name="fournisseur" value="'.$value['fournisseur'].'" hidden />

                                      <input type="submit" value="ajouter" />
                                    </form>
                                    </th> '?>
                                  </tr>
                                </tfoot>
                              </table>
                            </body>
                          </tbody>
                      </table>
                    </div>
              </div>
