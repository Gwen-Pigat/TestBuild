<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Profil</title>

<div class="liste-defis">

	<?php if (isset($_GET['user']) && !empty($_GET['user'])){ 

		$sql = "SELECT * FROM members WHERE id='$_GET[user]'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);

	?>

	<h2><i class="fa fa-user"></i> <?php echo $row['username']; ?></h2>

	<?php } else{ header('Location: liste-utilisateurs.php'); } ?>

	<?php 

	$myaccount = $_SESSION['myusername'];
	$user = $_GET['user'];

	if ($user != $myaccount) {

			$sql = mysqli_query($link ,"SELECT * FROM members WHERE username='$_SESSION[myusername]'");
			$friend = mysqli_query($link, "SELECT * FROM Amis WHERE (Utilisateur_first='$row[username]' AND Utilisateur_second='$myaccount') OR (Utilisateur_first='$myaccount' AND Utilisateur_second='$row[username]')");	

			if (mysqli_fetch_assoc($friend)) {
				echo "<p>Cet utilisateur est votre ami</p><br />
					  <a href='php/request-console.php?delete_user=$user'>
					  <button class='btn btn-danger'><i class='fa fa-user-times'> Supprimer ? </i></button></a>";
			}
			
			else{

				$sql = mysqli_query($link ,"SELECT * FROM members WHERE id='$user'");
				$row = mysqli_fetch_assoc($sql);
				
				$to_query = mysqli_query($link, "SELECT * FROM RequeteAmi WHERE Nom='$myaccount' AND Invite='$row[username]'");
				$from_query = mysqli_query($link, "SELECT * FROM RequeteAmi WHERE Nom='$row[username]' AND Invite='$myaccount'");

				if (mysqli_num_rows($from_query) == 1) {
					echo "<center>Cet utilisateur vous a envoyé une requête d'ami<br><br>
					<a href='php/request-console.php?accept_user=$user' class='btn btn-success'>Accepter</a> | <a href='php/request-console.php?refuse_user=$user' class='btn btn-danger'>Refuser</a></center>";
				}
				
				elseif (mysqli_num_rows($to_query) == 1) {
					echo "<p>Une requête d'ami a déja été envoyé.</p><br><a href='php/request-console.php?cancel_user=$user'><button class='btn btn-danger'><i class='fa fa-user-times'>Annuler la requête</i></button></a>";
				}
				
				else{
					echo "<p>Cet utilisateur ne fait pas encore partie de votre liste d'amis.</p><br><a href='php/request-console.php?send_user=$user'><button class='btn btn-success'><i class='fa fa-user-plus'>Envoyer une requête d'ami</i></button></a>";
				}
				
			}	
	} 

	?>

</div>

	<a class="text-center" href="liste-utilisateurs.php">
	<button class="btn btn-purple">Retour</button></a>