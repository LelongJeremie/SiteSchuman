<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="3;URL=../../frontend/view/chat.php">
<meta charset="utf-8" />
</head>
<body>
<?php
require ('functions.php');
delete_user($_SESSION['ip']);
deconnexion();
?>
<p><h2><center>Déconnexion en cours ...<img src="./../image/ajax-loader(1).gif" /></center></h2></p>
</body>
</html>
