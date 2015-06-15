<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>

<div class="container text-center">

<h1>Bienvenue à vous <strong><?php echo $_SESSION['myusername']; ?></strong> !!</h1>

<?php include "include/menu.php"; ?>

</div>

<?php include "include/notif.php"; ?>