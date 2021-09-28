<!DOCTYPE php>
<php lang="en">
	<head>

		<?php include '../include_frontends/nav.php'; ?>

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
							<h1 class="product-title">Iron Man </h1>
							<div class="product-meta">
								<ul class="list-inline">
									<li class="list-inline-item"><i class="fa fa-user-o"></i> Réalisation Taika Waititi</li>
									<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Categorie : action aventure</li>

								</ul>
							</div>

							<div class="content mt-5 pt-5">
								<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
										aria-selected="true">Details</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
										aria-selected="false">Specificite</a>
									</li>
									<?php if (isset($_SESSION["id"])){   ?>
										<li class="nav-item">
											<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
											aria-selected="false">Commentaire</a>
										</li>
									<?php } ?>
								</ul>
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<h3 class="tab-title">Description du film</h3>
										<p>Iron Man est un film américain réalisé par Jon Favreau, sorti en 2008. Il raconte les origines et les débuts du personnage éponyme issu du comics publié par Marvel. Il s'agit de la première étape de l'univers cinématographique Marvel, dont la première partie, appelée « Phase un » s'est terminée en 2012 avec Avengers de Joss Whedon.</p>

										<iframe width="100%" height="400" src="https://fr.wikipedia.org/wiki/Iron_Man_(film)#/media/Fichier:Iron_Man_(film)_Logo.png"
										frameborder="0" allowfullscreen></iframe>
										<p></p>


									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<table class="table table-bordered product-table">
											<tbody>
												<tr>
													<td>Seller Price</td>
													<td>$450</td>
												</tr>
												<tr>
													<td>Added</td>
													<td>26th December</td>
												</tr>
												<tr>
													<td>State</td>
													<td>Dhaka</td>
												</tr>
												<tr>
													<td>Brand</td>
													<td>Apple</td>
												</tr>
												<tr>
													<td>Condition</td>
													<td>Used</td>
												</tr>
												<tr>
													<td>Model</td>
													<td>2017</td>
												</tr>
												<tr>
													<td>State</td>
													<td>Dhaka</td>
												</tr>
												<tr>
													<td>Battery Life</td>
													<td>23</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
										<h3 class="tab-title">Commentaire</h3>
										<div class="product-review">
											<div class="media">
												<!-- Avater -->
												<img src="../../style/images/user/user-thumb.jpg" alt="avatar">
												<div class="media-body">
													<!-- Ratings -->
													<div class="ratings">
														<ul class="list-inline">
															<li class="list-inline-item">
																<i class="fa fa-star"></i>
															</li>
															<li class="list-inline-item">
																<i class="fa fa-star"></i>
															</li>
															<li class="list-inline-item">
																<i class="fa fa-star"></i>
															</li>
															<li class="list-inline-item">
																<i class="fa fa-star"></i>
															</li>
															<li class="list-inline-item">
																<i class="fa fa-star"></i>
															</li>
														</ul>
													</div>
													<div class="name">
														<h5>Jessica Brown</h5>
													</div>
													<div class="date">
														<p>Mar 20, 2018</p>
													</div>
													<div class="review-comment">
														<p>
															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
															riamipsa eaque.
														</p>
													</div>
												</div>
											</div>
											<div class="review-submission">
												<h3 class="tab-title">Submit your review</h3>
												<!-- Rate -->
												<div class="rate">
													<div class="starrr"></div>
												</div>
												<div class="review-submit">
													<form action="#" class="row">
														<div class="col-lg-6">
															<input type="text" name="name" id="name" class="form-control" placeholder="Name">
														</div>
														<div class="col-lg-6">
															<input type="email" name="email" id="email" class="form-control" placeholder="Email">
														</div>
														<div class="col-12">
															<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
														</div>
														<div class="col-12">
															<button type="submit" class="btn btn-main">Sumbit</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sidebar">
							<div class="widget price text-center">
								<h4>Salle :</h4>
								<p> <?php    echo $_SESSION["film"][2][0];?>  </p>
							</div>
							<!-- User Profile widget -->
							<div class="widget user text-center">
								<img class="rounded-circle img-fluid mb-5 px-5" src="../../style/images/products/IRONMAN.jpg" alt="">
								<h4><a href="">IronMan</a></h4>

								<?php if (isset($_SESSION["id"])){   ?>
									<ul class="list-inline mt-20">
										<li class="list-inline-item"><a href="reservationfilm.php" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Reserver</a></li>
									</ul>
								<?php }
								else {  ?>
									<ul class="list-inline mt-20">
										<li class="list-inline-item"><a href="login.php" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Reserver</a></li>
									</ul>
								<?php  } ?>
							</div>


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
