<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Demarrage session-->

  <?php include '../include_frontends/nav.php';  ?>

<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mx-auto">
                <div class="404-img">
                    <img src="images/404/404.png" class="img-fluid" alt="">
                </div>
                <div class="404-content">
                    <h1 class="display-1 pt-1 pb-2">Oups</h1>
                    <p class="px-3 pb-2 text-dark">Quelque chose a mal tourné, nous ne trouvons pas la page que vous cherchez :(Mais il y en a beaucoup d'autre !</p>
                    <a href="../../index.PHP" class="btn btn-info"> ACCUEIL </a>
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
