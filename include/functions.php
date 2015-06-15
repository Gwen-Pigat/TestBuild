<?php

function Admin_rights(){

	$host = "localhost"; 
	$username = "root"; 
	$password = "motdepasselocalhostgwen"; 
	$db_name = "QuitDouble"; 

	$link = mysqli_connect("$host", "$username", "$password", "$db_name");

	$tbl_name = "quests";
	$sql = "SELECT * FROM $tbl_name";
	$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
	echo "<ul><li>Proposé par <span class='user'> $row[Expediteur] </span><br />
					Nom du défi	: <span class='user'> $row[Defi] </span><br />"; ?>

			<?php 
			if ($row['Type'] == "Musique") {
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-music'></i></span><br />";
			} 
			elseif ($row['Type'] == "ADMIN") {
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-linux'></i></span><br />";
			}
			elseif ($row['Type'] == "Trash") {
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-linux'></i></span><br />";
			}
			elseif ($row['Type'] == "Sport") {
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-linux'></i></span><br />";
			}
			elseif ($row['Type'] == "Autre") {
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-linux'></i></span><br />";
			}
			else{
			echo "Catégorie : <span class='user'> $row[Type]  <i class='fa fa-linux'></i></span><br />";	
			}
			?>

			<?php echo "Description : <span class='user'> $row[Description] </span><br />
		  	  	 	Prime à empocher : <span class='user'> $row[Bounty] <i class='glyphicon glyphicon-piggy-bank'></i></span><br />"; ?>

		  	<?php 
		  	if ($row['Validation'] == "Approuvé") {
		  	echo "<a href=php/admin-console.php?del=$row[id]>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Retirer</button></a></li></ul><br>";
		  } 
	  		else{
		  	echo "<a href=php/admin-console.php?del=$row[id]>
			<button class='btn btn-danger'><i class='fa fa-thumbs-down'></i> Retirer</button></a>
		  		<a href=php/admin-console.php?update=$row[id]>
			<button class='btn btn-info'><i class='fa fa-thumbs-up'></i> Approuver</button></a></li></ul>
			<br>";
		  }

 }
}

?>