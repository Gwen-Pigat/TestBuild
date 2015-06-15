<?php 

session_start();

include "../include/header.php"; 
include "../include/connexion.php"; 

if ($_SESSION['myusername'] == 'Admin') {

	//Ajout de + 10 crédits

	if (isset($_GET['addmoney'])) {
		$sql = "SELECT * FROM members WHERE username='Admin'";

		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$base = $row['credits'];
		$base = $base + 10;

		$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
	}



	//Retrait de 10 crédits

	elseif (isset($_GET['delmoney'])) {
		$sql = "SELECT * FROM members WHERE username='Admin'";

		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$base = $row['credits'];
		$base = $base - 10;

		$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
	}


	//Reset à 0 crédits

	elseif (isset($_GET['reset'])) {
		$sql = "SELECT * FROM members WHERE username='Admin'";

		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

		$base = $row['credits'];
		$base = 0;

		$sql = "UPDATE members SET credits='$base' WHERE username='Admin'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
	}
	else{
	header('Location: logout.php');
	}

}

header('Location: ../login_success.php');



?>