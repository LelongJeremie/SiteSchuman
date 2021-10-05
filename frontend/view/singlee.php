<!DOCTYPE php>
<php lang="en">
  <head>
    <!-- Demarrage session-->
    <?php session_start(); ?>
    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque de Dugny</title>
    <!-- include de php redondant -->
    <?php include '../include_frontends/styles.php';  ?>

  </head>

  <body class="body-wrapper">


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light navigation">
              <a class="navbar-brand" href="../../index.php">
                <img src="../../style/images/logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto main-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="../../index.php">Accueil</a>
                </li>
                <!--  test pour savoir si on est connecté -->
                <?php if (isset($_SESSION["id"])){   ?>
                  <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                      Profile<span><i class="fa fa-angle-down"></i></span>
                    </a>

                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="user-profile.php">Ton profile</a>
                      <a class="dropdown-item" href="reservation.php">Tes reservations</a>
                    </div>
                  </li>
                <?php } ?>
                <li class="nav-item dropdown dropdown-slide">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                    Nos livres<span><i class="fa fa-angle-down"></i></span>
                  </a>

                  <!-- Dropdown list -->
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="categorieCD.php">Categorie CD</a>
                    <a class="dropdown-item" href="categoriefilm.php">Categorie Film</a>
                    <a class="dropdown-item" href="categorielivre.php">Categorie Livre</a>
                  </div>
                </li>
                <li class="nav-item dropdown dropdown-slide">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pages <span><i class="fa fa-angle-down"></i></span>
                  </a>

                  <!-- Dropdown list -->
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="about-us.php">A propos</a>
                    <a class="dropdown-item" href="contact-us.php">Contact</a>

                  </div>
                </li>
                <!--  test pour savoir si on est admin -->
                <?php if (isset($_SESSION['role']) and $_SESSION['role']==1) {

                  ?>

                  <li class="nav-item dropdown dropdown-slide">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Admin <span><i class="fa fa-angle-down"></i></span>
                    </a>


                    <!-- Dropdown list -->
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="admin.php">Admin  </a>
                      <a class="dropdown-item" href="adminajout.php">Admin ajout  </a>
                      <a class="dropdown-item" href="adminajoutlivre.php">Admin ajout livre </a>
                      <a class="dropdown-item" href="adminajoutfilm.php">Admin ajout film </a>
                      <a class="dropdown-item" href="adminajoutcd.php">Admin ajout cd </a>
                    </div>
                  </li>

                <?php }  ?>
              </ul>
              <ul class="navbar-nav ml-auto mt-10">
                <?php if (isset($_SESSION["id"])){   ?>

                  <li class="nav-item">
                    <a class="nav-link login-button" href="backend/process/deconnexion.php">Deconnexion</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white add-button" href="reservation.php"><i class="fa fa-plus-circle"></i> Ajouter au panier </a>
                  </li>
                <?php }  else {  ?>

                  <li class="nav-item">
                    <a class="nav-link login-button" href="login.php">Connection</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link login-button" href="register.php">Inscription</a>
                  </li>

                  <!--  <li class="nav-item">
                  <a class="nav-link login-button" href="user-profile.php"><i class="fa fa-plus-circle"></i> Mon compte</a>
                </li>-->
              <?php } ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>
<section class="page-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Advance Search -->
        <div class="advance-search">
          <form>
            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="Titre">
              </div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Categorie">
              </div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Auteur">
              </div>
              <div class="form-group col-md-2">

                <button type="submit" class="btn btn-primary">Rechercher</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-8">
        <div class="product-details">
          <h1 class="product-title">L'étranger </h1>
          <div class="product-meta">
            <ul class="list-inline">
              <li class="list-inline-item"><i class="fa fa-user-o"></i> De :<a href="">Albert Camus</a></li>
              <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Categorie :<a href="">Roman</a></li>
              <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location :<a href="">France</a></li>
            </ul>
          </div>

          <!-- product slider -->
          <div class="product-slider">
            <div class="product-slider-item my-4" data-image="../../style/images/products/products-1.jpg">
              <img class="img-fluid w-100" src="../../style/images/products/products-1.jpg" alt="product-img">
            </div>
            <div class="product-slider-item my-4" data-image="../../style/images/products/products-2.jpg">
              <img class="d-block img-fluid w-100" src="../../style/images/products/products-2.jpg" alt="Second slide">
            </div>
            <div class="product-slider-item my-4" data-image="../../style/images/products/products-3.jpg">
              <img class="d-block img-fluid w-100" src="../../style/images/products/products-3.jpg" alt="Third slide">
            </div>
            <div class="product-slider-item my-4" data-image="../../style/images/products/products-1.jpg">
              <img class="d-block img-fluid w-100" src="../../style/images/products/products-1.jpg" alt="Third slide">
            </div>
            <div class="product-slider-item my-4" data-image="../../style/images/products/products-2.jpg">
              <img class="d-block img-fluid w-100" src="../../style/images/products/products-2.jpg" alt="Third slide">
            </div>
          </div>
          <!-- product slider -->

          <div class="content mt-5 pt-5">
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                aria-selected="true">Details du produit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                aria-selected="false">Specificité</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h3 class="tab-title">Description du produit</h3>
                <p>L'Étranger est le premier roman d’Albert Camus, paru en 1942.
                  Il prend place dans la tétralogie que Camus nommera « cycle de l’absurde » qui décrit les fondements de la philosophie camusienne : l’absurde.
                  Cette tétralogie comprend également l’essai intitulé Le Mythe de Sisyphe ainsi que les pièces de théâtre Caligula et Le Malentendu.  </p>

                  <iframe width="100%" height="400" src="https://fr.wikipedia.org/wiki/L'Étranger#/media/Fichier:Camus23.jpg"
                  frameborder="0" allowfullscreen></iframe>
                  <p></p>
                  <p>Le roman met en scène un personnage-narrateur nommé Meursault, vivant à Alger en Algérie française. Le roman est découpé en deux parties.
                    Au début de la première partie,
                    Meursault reçoit un télégramme annonçant que sa mère, qu'il a internée à l’hospice de Marengo,
                    vient de mourir. Il se rend en autocar à l’asile de vieillards, situé près d’Alger. Veillant la morte toute la nuit,
                    il assiste le lendemain à la mise en bière et aux funérailles, sans avoir l'attitude attendue d’un fils endeuillé ;
                    le protagoniste ne pleure pas, il ne veut pas simuler un chagrin qu'il ne ressent pas.</p>

                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h3 class="tab-title">Specificité du produit</h3>
                    <table class="table table-bordered product-table">
                      <tbody>
                        <tr>
                          <td>Prix</td>
                          <td>4€</td>
                        </tr>
                        <tr>
                          <td>Ajouté le :</td>
                          <td>26th Decembre</td>
                        </tr>
                        <tr>
                          <td>Pays</td>
                          <td>France</td>
                        </tr>
                        <tr>
                          <td>Editeur</td>
                          <td>Baudelair</td>
                        </tr>
                        <tr>
                          <td>Condition</td>
                          <td>Neuf</td>
                        </tr>
                        <tr>
                          <td>Modele</td>
                          <td>2017</td>
                        </tr>
                        <tr>
                          <td>Lieux:</td>
                          <td>Dugny</td>
                        </tr>
                        <tr>
                          <td>Temps d'emprunt</td>
                          <td>23 jours</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="sidebar">
              <div class="widget price text-center">
                <h4>Disponibilité :</h4>
                <p>Disponible</p>
              </div>
              <!-- User Profile widget -->
              <div class="widget user text-center">
                <img class="rounded-circle img-fluid mb-5 px-5" src="../../style/images/user/Albert_Camus_en_1957__Bettmann-CORBIS.jpg" alt="">
                <h4><a href="">Albert Camus</a></h4>
                <p class="member-time">Date de publication originale : 19 mai 1942</p>
                <!--<a href="">See all ads</a>-->
                <ul class="list-inline mt-20">
                  <!--<li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>-->
                  <li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Reserver</a></li>
                </ul>
              </div>
              <!-- Rate Widget -->
              <div class="widget rate">
                <!-- Heading -->
                <h5 class="widget-header text-center">Noter
                  <br>
                  ce produit</h5>
                  <!-- Rate -->
                  <div class="starrr"></div>
                </div>
                <!-- Safety tips widget -->
                <!--	<div class="widget disclaimer">
                <h5 class="widget-header">Safety Tips</h5>
                <ul>
                <li>Meet seller at a public place</li>
                <li>Check the item before you buy</li>
                <li>Pay only after collecting the item</li>
                <li>Pay only after collecting the item</li>
              </ul>
            </div>-->
            <!-- Coupon Widget -->


          </div>
        </div>

      </div>
    </div>
    <!-- Container End -->
  </section>
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

</php>
