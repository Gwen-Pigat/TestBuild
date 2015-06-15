<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<meta charset="utf-8">

<?php 

extract($_POST);

$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");
$sql = "SELECT * FROM $tbl_name WHERE username='$_POST[myusername]' OR email='$_POST[email]'";

$result = mysqli_query($link, $sql);


if ($row = mysqli_num_rows($result)) { ?>
<br><br><br>
<div class="container text-center">
  <br><br>
  <p style="font-size: 20px"><strong><i class="fa fa-exclamation-triangle"></i> Nom ou adresse e-mail déja utilisé</strong></p><br />
<a href="creation-compte.php">
<button class="btn btn-purple">Ré-essayer</button> </a>

  
 <?php }

else { ?>

Bienvenue à vous "<strong><?php echo $_POST["myusername"]; ?></strong>" !!<br />
Votre compte à bien été crée !!

<br>

<a href="index.html">
  <button>Se connecter</button>
</a>


<?php

//ENVOI EN BDD

  if (isset($_POST) && isset($_POST['myusername']) && isset($_POST['mypassword']) && isset($_POST['email']) && isset($_POST['telephone'])) {
    if(!empty($_POST['myusername']) && !empty($_POST['mypassword']) && !empty($_POST['email']) && !empty($_POST['telephone'])){

      extract($_POST);
      $credit = 10;

      $sql = "INSERT INTO $tbl_name(username, password, email, telephone, credits) VALUES ('$myusername', '".md5($mypassword)."', '$email', '$telephone', '$credit')";
      mysqli_query($link, $sql);
      
      mysqli_close();
      
    }
  }
}

 ?>