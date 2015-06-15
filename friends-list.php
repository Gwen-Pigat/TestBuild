<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>FrenzyQuest | Liste d'amis</title>

<div class="liste-defis">

	<h2><i class="fa fa-users"></i> Mes amis</h2>

<?php

$account = $_SESSION ['myusername'];


$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM RequeteAmi WHERE Nom='$account' OR Invite='$account'"));

if ($row == 0) {
	echo "<center><a href='liste-utilisateurs.php'><button class='btn btn-success'><i class='fa fa-user-plus'></i> Pas d'ami ? Ajouter en un</button></a></center><br>";
}

else{

	$result = mysqli_query($link, "SELECT * FROM Amis WHERE Utilisateur_first!='$_SESSION[myusername]' AND Utilisateur_second='$_SESSION[myusername]'");

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li><strong>$row[Utilisateur_first]</strong></li>";
	}

	$result = mysqli_query($link, "SELECT * FROM Amis WHERE Utilisateur_first='$_SESSION[myusername]' AND Utilisateur_second!='$_SESSION[myusername]'");

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li><strong>$row[Utilisateur_second]</strong></li>";
	}
	
}

?>

</div>

<a class="text-center" href="login_success.php"><button class="btn btn-purple">Retour</button></a>