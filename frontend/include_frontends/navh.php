<!-- SITE TITTLE -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>cinema de Dugny</title>
<?php  ?>
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
							<?php if (isset($_SESSION["id"])){    ?>
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
								à l'affiche <span><i class="fa fa-angle-down"></i></span>
							</a>

							<!-- Dropdown list -->
							<div class="dropdown-menu">

								<a class="dropdown-item" href="categoriefilm.php">Film</a>
								  <?php if (isset($_SESSION["id"])){   ?>
								<a class="dropdown-item" href="reservationfilm.php">reservation Film</a>   <?php }?>

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

															<a class="dropdown-item" href="adminajoutfilm.php">Admin ajout film </a>

													</div>
												</li>

							<?php }  ?>
						</ul>
					<ul class="navbar-nav ml-auto mt-10">
						 <?php if (isset($_SESSION["id"])){   ?>

							 <li class="nav-item">
								 <a class="nav-link login-button" href="../../backend/process/deconnexion.php">Deconnexion</a>
							 </li>
							 <li class="nav-item">
								<a class="nav-link text-white add-button" href="reservation.php">Mes reservations </a>
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
