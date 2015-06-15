<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>


<title>Soumettre un défi</title>

	<div class="container text-center">

		<h4>Votre défi</h4>

			<form class="form-inscription" method="POST" action="submit.php">
				<select class="btn btn-purple"name="select"> 
				   <option value="Autre">Autre</option> 
				   <option value="Trash">Trash</option> 
				   <option value="Musique">Musique</option> 
				   <option value="Sport">Sport</option>
				   <?php 
				   		if($_SESSION['myusername'] == "Admin"){
						echo "<option value='ADMIN'>ADMIN</option>"; 
						echo "<option value='The King Challenge'>The King Challenge</option>"; 
						
						$sql = "SELECT * FROM members WHERE username!='Admin'";
						$result = mysqli_query($link, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								echo "<option value='$row[username]'>$row[username]</option>";
							}	 
						}
					?>	 
				</select><br>
				<input maxlength="65" type="text" placeholder="Nom du défi" x-moz-errormessage="Veuillez entrer une adresse e-mail valide" name="defi" required><br>	
				<textarea maxlength="255" type="text" placeholder="Entrez la description de votre défi" style="margin: 0px; height: 59px; width: 290px;" name="description" required></textarea><br>
				<input class="chiffre" type="number" placeholder="Votre prime pour ce défi" name="chiffre" required><br>
				<p class='user'>PS : Prime maximale = "Vos crédits / 2" </p>
				<input class="btn btn-danger" type="submit" value="Envoyer">
			</form>

			<br>
			
			<a href="login_success.php">
			<button class="btn-lg btn-purple">Retour à l'Accueil</button></a>

	</div>