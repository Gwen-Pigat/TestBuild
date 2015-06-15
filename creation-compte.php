<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<meta charset="utf-8">


<title>Création de votre compte</title>


<div class="container text-center">
<h1>Création du compte</h1>

	<form class="form-inscription" method="POST" action="redirect.php">
		<input type="text" placeholder="Nom / Pseudo" name="myusername" required><br>
		<input type="password" placeholder="Mot de passe" name="mypassword" required><br>
		<input type="email" placeholder="Adresse e-mail" name="email" required><br>
		<input type="telephone" placeholder="Téléphone" name="telephone" required><br>
		<input class="btn btn-danger" type="submit" value="Valider">
	</form>
	<a href="index.html">
	<button class="btn btn-primary">Accueil</button></a>
</div>