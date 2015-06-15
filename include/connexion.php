<?php 

session_start();

if (isset($_SESSION['myusername']) && !empty($_SESSION['myusername'])) {


extract($_POST);
$host = "localhost"; 
$username = "root"; 
$password = "motdepasselocalhostgwen"; 
$db_name = "QuitDouble"; 
$tbl_name = "members";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

$sql = "SELECT * FROM $tbl_name WHERE username='$_SESSION[myusername]'";
$result = mysqli_query($link ,$sql);
$row = mysqli_fetch_assoc($result);

    echo "Salut <span class='user'> $_SESSION[myusername] </span> !!      
    <a href=php/logout.php><button class='btn btn-warning container'><i class='glyphicon glyphicon-user'></i> Déconnexion</button></a><br />";
    if ($row['credits'] < 1) {
   	echo "Crédits : <span class='danger'> $row[credits] <i class='glyphicon glyphicon-piggy-bank'></i></span>";
    }
    else{
    echo "Crédits : <span class='user'> $row[credits] <i class='fa fa-jpy'></i></span>";
	}
}

else{
	header('Location: php/logout.php');
}

$row = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM SendQuest WHERE Destinataire='$_SESSION[myusername]' AND Statut='En attente'"));

if ($row) { ?>
<br>
<div class="absolute red">
<a href="quests-console.php"><i class='fa fa-exclamation'></i> Défi disponible</a>
</div>
<?php }

$row = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM SendQuest WHERE Destinataire='$_SESSION[myusername]' AND Statut='En cours'"));

if($row){

echo "<br>
<div class='absolute blue'>
<a href='quests-console.php?'><i class='fa fa-cog fa-spin'></i> En cours</a>
</div>";
		}

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM RequeteAmi WHERE Invite='$_SESSION[myusername]' AND Statut='En attente'"));

if ($row) { 

$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM members WHERE username='$row[Nom]'"));

echo "<div class='absolute friend'>
<a href='fiche-profile.php?user=$row[id].php'><i class='fa fa-user-plus'></i> Requête d'ami</a>
</div>";

 } ?>
