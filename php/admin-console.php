<?php

session_start();

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "quests";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

if (isset($_SESSION['myusername']) && $_SESSION['myusername'] == 'Admin') {

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "UPDATE quests SET Validation = 'Rejeté' WHERE id='$id'";
		$result = mysqli_query($link, $sql);

		$sql = "DELETE FROM SendQuest WHERE id_quest='$id'";
		$result = mysqli_query($link, $sql);
		echo "<meta http-equiv='refresh' content='0;url=../liste-des-defis.php'>"; 
	}
	elseif (isset($_GET['update'])) {

		$id = $_GET['update'];
		$sql = "UPDATE quests SET Validation = 'Approuvé' WHERE id='$id'";
		$result = mysqli_query($link, $sql) or die("Failed".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=../liste-des-defis.php'>"; 
	}
}

 ?>