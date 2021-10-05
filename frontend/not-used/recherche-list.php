<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Demarrage session -->
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
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
        <div class="advance-search">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 align-content-center">
                    <form  method="post" action="recherche-list.php">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="Titre">
                        </div>
                        <div class="form-group col-md-3">
                          <select class="w-100 form-control mt-lg-1 mt-md-2">
                            <option>Categories</option>
                            <option value="1">Action</option>
                            <option value="2">Aventure</option>
                            <option value="4">Mystère</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Auteur">
                        </div>
                        <div class="form-group col-md-2 align-self-center">
                          <button type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
          </div>
        </div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Resultat pour </h2>
					<p>123 Resultats le <script>


              // Return today's date and time
              var currentTime = new Date()

              // returns the month (from 0 to 11)
              var month = currentTime.getMonth() + 1

              // returns the day of the month (from 1 to 31)
              var day = currentTime.getDate()

              // returns the year (four digits)
              var year = currentTime.getFullYear()

              // write output MM/dd/yyyy
              document.write(day , "/" , month , "/" , year)


            </script></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
	<h4 class="widget-header">Toutes les catégories</h4>
	<ul class="category-list">
		<li><a href="recherche.php">Action <span>93</span></a></li>
		<li><a href="recherche.php">Mystère <span>233</span></a></li>
		<li><a href="recherche.php">Aventure  <span>183</span></a></li>
		<li><a href="recherche.php">Drama <span>343</span></a></li>
	</ul>
</div>

<div class="widget category-list">
	<h4 class="widget-header">Auteurs populaires</h4>
	<ul class="category-list">
		<li><a href="recherche.php">Albert Camus <span>93</span></a></li>
		<li><a href="recherche.php">William Shakespeare <span>233</span></a></li>
		<li><a href="recherche.php">Victor Hugo  <span>183</span></a></li>
		<li><a href="recherche.php">Jean de la Fontaine <span>120</span></a></li>
	</ul>
</div>

<div class="widget price-range w-100">
	<h4 class="widget-header">Echelle des prix</h4>
	<div class="block">
						<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[0,5000]">
				<div class="d-flex justify-content-between mt-2">
						<span class="value">10€ - 5000€</span>
				</div>
	</div>
</div>

<div class="widget product-shorting">
	<h4 class="widget-header">Par condition</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Neuf
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Neuf
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Neuf
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Neuf
	  </label>
	</div>
</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="recherche.php"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="#" onclick="event.preventDefault();" class="text-info"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- ad listing list  -->
				<div class="ad-listing-list mt-20">
    <div class="row p-lg-3 p-sm-5 p-4">
        <div class="col-lg-4 align-self-center">
            <a href="single.php">
                <img src="../../style/images/products/81ovTNILQfL.jpg" class="img-fluid" alt="">
            </a>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="ad-listing-content">
                        <div>
                            <a href="single.php" class="font-weight-bold">Le Petit Chaperon Rouge</a>
                        </div>
                        <ul class="list-inline mt-2 mb-3">
                            <li class="list-inline-item"><a href="categorie.php"> <i class="fa fa-folder-open-o"></i> Contes</a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i> 26th Decembre</a></li>
                        </ul>
                        <p class="pr-5">Le Petit Chaperon rouge est un conte de tradition orale d'origine française.</p>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-ratings float-lg-right pb-3">
                        <ul class="list-inline">
                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ad-listing-list mt-20">
<div class="row p-lg-3 p-sm-5 p-4">
<div class="col-lg-4 align-self-center">
    <a href="single.php">
        <img src="../../style/images/products/81ovTNILQfL.jpg" class="img-fluid" alt="">
    </a>
</div>
<div class="col-lg-8">
    <div class="row">
        <div class="col-lg-6 col-md-10">
            <div class="ad-listing-content">
                <div>
                    <a href="single.php" class="font-weight-bold">Le Petit Chaperon Rouge</a>
                </div>
                <ul class="list-inline mt-2 mb-3">
                    <li class="list-inline-item"><a href="categorie.php"> <i class="fa fa-folder-open-o"></i> Contes</a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i> 26th Decembre</a></li>
                </ul>
                <p class="pr-5">Le Petit Chaperon rouge est un conte de tradition orale d'origine française.</p>
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="product-ratings float-lg-right pb-3">
                <ul class="list-inline">
                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                    <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>

				<!-- pagination -->
				<div class="pagination justify-content-center py-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Precedent</span>
								</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>

							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Suivant</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<!-- pagination -->
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
