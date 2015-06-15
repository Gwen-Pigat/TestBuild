<?php include "include/header.php"; include "include/connexion.php"; include "include/functions.php";


if ($_SESSION['myusername'] != 'Admin') {
	header('Location: index.html');
}

?>

<div class="liste-defis">

<h2>A valider</h2>

<?php Admin_rights(); ?>

</div>

<center>
<a href="login_success.php"><button class="btn btn-purple">Retour</button></a>
</center>	