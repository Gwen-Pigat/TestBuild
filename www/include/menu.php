<?php include "functions.php"; ?>

<div class="container text-center">

<a href="liste-utilisateurs.php">
<button class="btn btn-info"><i class="fa fa-users"> Liste des utilisateurs </i></button></a>
<br><br>
<a href="defi.php">
<button class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Proposer un défi</button></a>
<br><br>
<a href="quests-console.php">
<button class="btn btn-warning"><i class="fa fa-list"></i> Défis</button></a>
<?php if ($_SESSION['myusername'] == "Admin") { ?>

<br><br>

<a href="liste-des-defis.php">
<button class="btn btn-primary">Liste des défis</button></a>
<br><br>

<?php

$sql = "SELECT * FROM members WHERE username='$_SESSION[myusername]'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);


echo "<a href='php/admin-money.php?addmoney=$row[credits]'><button class='btn btn-primary'>+10 C</button></a>
<a href='php/admin-money.php?delmoney=$row[credits]'><button class='btn btn-primary'>-10 C</button></a> <br>
<a href='php/admin-money.php?reset=$row[credits]'><button class='btn btn-primary'>Reset</button></a>";

 ?>


<?php } ?>

</div>