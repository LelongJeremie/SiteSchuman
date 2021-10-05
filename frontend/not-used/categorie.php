<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Demarrage session-->
<?php session_start(); ?>
<!-- SITE TITTLE -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bibliothèque de Dugny</title>
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
                <a class="dropdown-item" href="recherche.php">Recherche</a>
                <a class="dropdown-item" href="categorie.php">Categories</a>
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
    								<a class="nav-link text-white add-button" href="ad-listing.php"><i class="fa fa-plus-circle"></i> Ajouter au panier </a>
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
<!--===================================
=            Clients Section        =
====================================-->

<section class="client-slider-03">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Client Slider -->
			<div class="col-md-12">
				<!-- Client Slider -->
<div class="category-slider">
    <!-- Client 01 -->
    <div class="item">
        <a href="categorieCD.php">
            <!-- Slider Image -->
            <i class="fa fa-video-camera" ></i>
            <h4>CD</h4>
        </a>
    </div>
    <div class="item">
        <a href="categorielivre.php">
            <!-- Slider Image -->
            <i class="fa fa-book"></i>
            <h4>Livre</h4>
        </a>
    </div>
    <div class="item">
        <a href="categoriefilm.php">
            <!-- Slider Image -->
            <i class="fa fa-film"></i>
            <h4>Film</h4>
        </a>
    </div>



</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="stores section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Les auteurs</h2>
				</div>
				<!-- First Letter -->
				<div class="block">
					<!-- Store First Letter -->
					<h5 class="store-letter">CD</h5>
					<hr>
					<!-- Store Lists -->
					<div class="row">
						<!-- Store List 01 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 02 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 03 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 04 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
					</div>
				</div>
				<!-- Second Letter -->
				<div class="block">
					<!-- Store First Letter -->
					<h5 class="store-letter">Livres</h5>
					<hr>
					<!-- Store Lists -->
					<div class="row">
						<!-- Store List 01 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 02 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 03 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 04 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
					</div>
				</div>
				<!-- Third Letter -->
				<div class="block">
					<!-- Store First Letter -->
					<h5 class="store-letter">Film</h5>
					<hr>
					<!-- Store Lists -->
					<div class="row">
						<!-- Store List 01 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 02 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 03 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
						<!-- Store List 04 -->
						<div class="col-md-3 col-sm-6">
							<ul class="store-list">
								<li><a href="recherche.php">1 - 800 - Got - Junk?</a></li>

							</ul>
						</div>
					</div>
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
