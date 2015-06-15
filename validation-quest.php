<?php include "include/header.php"; include "include/connexion.php"; ?>

<title>Validation</title>

<?php 

$validation = $_GET['validation_quest'];


$sql = "SELECT * FROM quests WHERE id='$validation'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$row_quest = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM SendQuest WHERE id_quest='$validation'"));

 ?>

 	<div class="liste-defis">

<h2>Le Défi</h2>
<?php
echo "<ul><li>Défi de <strong><span class='user'>$row[Expediteur]</span></strong><br>
			Nom du défi : <strong><span class='user'>$row[Defi]</span></strong><br>
			Type : <strong><span class='user'>$row[Type]</span></strong><br>
			Description : <strong><span class='user'>$row[Description]</span></strong><br>
			id : <strong><span class='user'>$row[id]</span></strong><br>
			La prime est de : <strong><span class='user'>$row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span></strong><br>
			<button class='btn btn-custom'>Début : $row_quest[Start]</button>
			<button class='btn btn-custom'>Fin : $row_quest[End]</button></li></ul><br>
			<center><button class='btn btn-success'><i class='fa fa-list'></i> Date actuelle : <br>".date("d/m/Y"). " et il est " .date("H:i:s")."</button></center><br><br>
			<center><a href='validation-quest.php?validation_quest=$row[id]'><button style='margin: auto' class='btn btn-purple'>Vous avez fini ?</button></a></center>";

?>
 </div>