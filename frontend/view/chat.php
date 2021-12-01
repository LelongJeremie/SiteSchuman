<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Demarrage session avec un test pour savoir si on est connecté -->

  <?php include '../include_frontends/nav.php';  ?>
<!-- contact us end -->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Vous voulez discuter ? </h1>
					<p> Inscrivez vous avec un compte différent pour utiliser notre chat en ligne et discuter avec l'ensemble des professeurs, et de parents inscrits </p>
					<div class="short-popular-category-list text-center">

					</div>

          <noscript>
      <meta http-equiv="refresh" content="0;URL=./script/no-js.html">
      </noscript>
          <script type="text/javascript">
          </script>

          <div id="login_form">
          <form method="post" action="../../chat/script/login.php">
          <center>
          <table>
          <tr><td>Pseudo :<input type="text" name="pseudo" required /></td></tr>
          <tr><td>Mot de passe :
      	<input type="password" name="password" placeholder="****" maxlength="255" size="35" required />
      	</td></tr>
          <tr><td><input type="submit" value="Se Connecter !" /></td></tr>
          </table>
          </center>
          </form>
          </div>
          <span>Pas de compte ?  <a href="../../chat/inscription.html"> Inscris-toi !</a></span>
        </br>
      	<span id="an"><a href="../../chat/anonymeChat/script/login.php">Version anonyme</A></span>
    

</div>
			</div>
		</div>
	</div>
  </br>
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

</html>
