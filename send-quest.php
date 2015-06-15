<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<title>Utilisateurs</title>


<div class="liste-defis text-center">


<?php

//Liste d'amis

if (isset($_GET['send_friend'])) { ?>

	<h2><i class="fa fa-users"></i> Amis</h2>

<?php 

$quest = $_GET['send_friend']; 

$result = mysqli_query($link, "SELECT * FROM Amis WHERE Utilisateur_first!='$_SESSION[myusername]' AND Utilisateur_second='$_SESSION[myusername]'");

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li><strong>$row[Utilisateur_first]</strong><br><a href='quest.php?quest=$quest&send_friend=$row[Utilisateur_first]'><button class='btn btn-warning'>Envoyer</button></li></a></li>";
	}

	$result = mysqli_query($link, "SELECT * FROM Amis WHERE Utilisateur_first='$_SESSION[myusername]' AND Utilisateur_second!='$_SESSION[myusername]'");

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li><strong>$row[Utilisateur_second]</strong><br><a href='quest.php?quest=$quest&send_friend=$row[Utilisateur_second]'><button class='btn btn-warning'>Envoyer</button></a></li>";
	}	
	echo "</div>";
	echo "<center><a class='text-center' href='send-quest.php?quest=$quest'><button class='btn btn-purple'>Retour</button></a></center>";
}

//Inconnu

elseif (isset($_GET['send_unknown'])) { ?>

<h2><i class="fa fa-users"></i> Inconnu</h2>

<?php $quest = $_GET['send_unknown']; 

	$row = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM members WHERE username!='$_SESSION[myusername]' ORDER BY rand()"));

	 echo "<a href='quest.php?quest=$quest&send_unknown=$row[id]'><button class='btn btn-info'><i class='fa fa-envelope'></i> Envoyer à un inconnu </button></a></div>";
	 echo "<center><a class='text-center' href='send-quest.php?quest=$quest'><button class='btn btn-purple'>Retour</button></a></center>";
}


//Execution de la page par défault, les méthodes GET vont agir comme des ancres et générer dynamiquement le contenu de la page

else{ ?>

<h2><i class="fa fa-users"></i> Utilisateurs</h2>

<?php $quest = $_GET['quest']; 

echo "<a href='send-quest.php?send_friend=$quest'><button class='btn btn-success'><i class='fa fa-envelope'></i> Envoyer à un ami</button></a>
<a href='send-quest.php?send_unknown=$quest'><button class='btn btn-info'><i class='fa fa-envelope'></i> Envoyer à un inconnu</button></a></div>";

echo "<center><a class='text-center' href='quests-console.php'><button class='btn btn-purple'>Retour</button></a></center>";

}

?>