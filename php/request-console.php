<?php include "../include/header.php";  include "../include/connexion.php"; ?>


<title>Friends Request</title>


<?php

if (isset($_SESSION)) {


$myaccount = $_SESSION['myusername'];


	//Acceptation de la requête ami

	if (isset($_GET['accept_user'])) {

		$user = $_GET['accept_user'];

		$sql = "SELECT * FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$user = $row['username'];

		$sql = "UPDATE RequeteAmi SET Statut='Requête acceptée' WHERE Nom='$user' AND Invite='$myaccount'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$sql = "SELECT * FROM RequeteAmi WHERE Statut='Requête acceptée'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);


		if ($row['Statut'] == 'Requête acceptée') {
			$sql = "INSERT INTO Amis(Utilisateur_first, Utilisateur_second) VALUES ('$user', '$myaccount')";
			$result = mysqli_query($link, $sql);
			$row = mysqli_fetch_assoc($result);
		}

	?>

	<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-check-circle-o fa-2x'></i>Cet utilisateur est désormais votre ami
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
	</div>


	<?php }


	//Refus de la requête d'ami

	elseif (isset($_GET['refuse_user'])) {

		$user = $_GET['refuse_user'];

		$sql = "SELECT username FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$user = $row['username'];

		$ajout = date("Y-m-d H:i:s");

		mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$_SESSION[myusername]') AND (Invite='$user)");
		mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$user') AND (Invite='$_SESSION[myusername]')");

	?>

	<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Invitation refusée
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
	</div>

	<?php }


	//Supprimer un ami

	elseif (isset($_GET['delete_user'])) {

		$user = $_GET['delete_user'];

		$sql = "SELECT * FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$sql = mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$row[username]') OR (Invite='$row[username]')");
		$sql = mysqli_query($link, "DELETE FROM Amis WHERE (Utilisateur_second='$row[username]') OR (Utilisateur_first='$row[username]')");
		$result = mysqli_fetch_assoc($sql);

	?>

	<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Requête annulée
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
	</div>


	<?php }


	//Annuler une requête


	elseif (isset($_GET['cancel_user'])) {

		$user = $_GET['cancel_user'];

		$sql = "SELECT username FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$ajout = date("Y-m-d H:i:s");

		mysqli_query($link, "DELETE FROM RequeteAmi WHERE (Nom='$_SESSION[myusername]' AND Invite='$row[username]')");

	?>

	<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-exclamation-triangle fa-2x'></i> Requête annulée
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
	</div>


	<?php }


	//Envoyer une requête


	elseif (isset($_GET['send_user'])) {

		$user = $_GET['send_user'];

		$sql = "SELECT username FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);


		$ajout = date("Y-m-d H:i:s");

		mysqli_query($link, "INSERT INTO RequeteAmi(Nom, Invite, date) VALUES ('$_SESSION[myusername]', '$row[username]', '$ajout')");

		$sql = "SELECT username FROM members WHERE id='$user'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

	?>

	<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-check-circle-o fa-2x'></i> Requête envoyée
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
	</div>

	<?php } 
}

 header('refresh: 1; url=../liste-utilisateurs.php'); ?>