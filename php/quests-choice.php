<?php session_start(); if (isset($_SESSION['myusername']) && !empty($_SESSION['myusername'])) { 

extract($_POST);
$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/alertify.default.css">

<title>Friends Request</title>


<?php

if (isset($_SESSION['myusername'])) {

	if (isset($_GET['accept_quest'])) { 

		$id = $_GET['accept_quest'];
		$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM quests WHERE id='$id'"));

		?>

		<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-cog fa-4x'></i><br>24 Heures vous seront attribuées pour réaliser ce défi. Au dela de ce délai, celui-ci ne pourra plus être validé, vous devrez alors verser <?php echo "<span class='user'>".($row['Bounty'] * 2)." <i class='fa fa-jpy'></i></span>"; ?>  !!<br><br>
			Voulez-vous continuer ?<br><br>
			<?php 
			echo "<a href='quests-choice.php?quest_yes=$row[id]'>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Oui</button></a>
	  		<a href='../quests-console.php?quest_receive=$_SESSION[myusername]'>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Non</button></a></li></ul>
		</div>";

		}

		elseif (isset($_GET['refuse_quest'])) {

			$id = $_GET['refuse_quest'];
			$sql = "UPDATE SendQuest SET Statut='Refusé' WHERE id_quest='$id'";
			$result = mysqli_query($link, $sql); ?>

			<div class="container text-center">

			<br><br><br>
			<h3><i class='fa fa-ban fa-2x'></i>Quête refusée
			<br><br><br><br><br>
				<i class='fa fa-spinner fa-pulse fa-5x'></i>
			
			</div>

<?php 

		header("Refresh: 2; url=../quests-console.php");

		}

	elseif (isset($_GET['quest_yes'])) {

		$id = $_GET['quest_yes'];
		$sql = "UPDATE SendQuest SET Statut='En cours' WHERE id_quest='$id'";
		$result = mysqli_query($link, $sql); ?>

		<div class="container text-center">

		<br><br><br>
		<h3><i class='fa fa-ban fa-2x'></i>La quête commence dès maintenant !!
		<br><br><br><br><br>
			<i class='fa fa-spinner fa-pulse fa-5x'></i>
		
		</div>

<?php 

		header("Refresh: 2; url=../quests-console.php");

		}

		else{
			echo "Erreur, veuillez recommencer";
		}
	}
}

?>