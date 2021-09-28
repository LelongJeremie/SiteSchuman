<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Demarrage session-->

  <?php include '../include_frontends/nav.php';  ?>

  <!--================================
  =            Page Title            =
  =================================-->
  <section class="page-title">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
          <!-- Title text -->
          <h3>A propos de nous</h3>
        </div>
      </div>
    </div>
    <!-- Container End -->
  </section>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about-img">
            <img src="../../style/images/user/596-5961334_kono-dio-da-meme-template-hd-png-download.png" class="img-fluid w-100 rounded" alt="">
          </div>
        </div>
        <div class="col-lg-6 pt-5 pt-lg-0">
          <div class="about-content">
            <h3 class="font-weight-bold">Introduction</h3>
            <p>Retrouvez des milliard de livres comprenant <br> un grand nombre de thèmes littéraire différents</p>
            <h3 class="font-weight-bold">Que proposons nous</h3>
            <p>La Bibliothèque de Dugny propose un grand nombre de livres de plusieurs catégories différentes
              accessible simplement et rapidement en quelques cliques.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading text-center text-capitalize font-weight-bold py-5">
              <h2>Notre équipe</h2>
            </div>

          </div>

        </div>
        <div class="col-lg-6 col-sm-9">
          <div class="card my-3 my-lg-0">
            <img class="card-img-top" src="../../style/images/user/596-5961334_kono-dio-da-meme-template-hd-png-download.png" class="img-fluid w-100" alt="Card image cap">
            <div class="card-body bg-gray text-center">
              <h5 class="card-title">Yacine TABTI</h5>
              <p class="card-text">FONDATEUR/PDG</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-7 my-lg-2 my-4">

          <div class="counter-content text-center bg-light py-4 rounded">
            <i class="fa fa-user-o d-block"></i>
            <span class="counter my-2 d-block" data-count="1013">0</span>
            <h5>Membres actifs</h5>
          </div>
        </div>
        <div class="col-lg-4 col-sm-7 my-lg-1 my-4">
          <div class="counter-content text-center bg-light py-4 rounded">
            <i class="fa fa-bar-chart d-block"></i>
            <span class="counter my-2 d-block" data-count="2413">0</span>
            <h5>Nombre d'article</h5>
          </div>
        </div>
        <div class="col-lg-4 col-sm-7 my-lg-1 my-4">
          <div class="counter-content text-center bg-light py-4 rounded">
            <i class="fa fa-eur d-block"></i>
            <span class="counter my-2 d-block">Pas un rond</span>
            <h5>Revenue</h5>
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
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<?php include('../include_frontends/plugins.php'); ?>
</body>

</html>
