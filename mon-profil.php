<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>

<div class="liste-defis">

	<h2>Mon profil</h2>

<?php

$sql = "SELECT * FROM members WHERE username='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
	echo "<ul><li>Nom d'utilisateur : <strong>'$row[username]'</strong><br /></li>
			  <li>E-mail : <strong>'$row[email]'</strong><br /></li>
			  <li>Téléphone : <strong>'$row[telephone]'</strong><br /></li>
			  <li>Nombre de crédits : <strong>'$row[credits] C'</strong><br /></li>";
}

?>

</div>

