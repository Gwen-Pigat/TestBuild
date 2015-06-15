<?php include "include/header.php"; ?>
<?php include "include/connexion.php"; ?>


<title>En attente</title>


<div class="container text-center">

<?php 

$sql = "SELECT * FROM members WHERE username='$_SESSION[myusername]'";
$result = mysqli_query($link ,$sql);
$row = mysqli_fetch_assoc($result);


if($_POST['chiffre'] > ($row['credits'] / 2)) {

  echo "<p class='condition'>Votre mise doit au maximum correspondre à la moitié de vos crédits !! <br>(dans votre cas le maximum sera de <span class='user'>".($row['credits'] / 2)." <i class='fa fa-jpy'></i></span>)</p><br />
  <i class='fa fa-spinner fa-pulse fa-4x'></i>";
  
  header("refresh: 6; url=defi.php");

}

else{
?>

<h2>Votre proposition de défi nous a bien été envoyée.</h2>
<h3>A présent, celui-ci va être vérifié par notre équipe avant d'être validé.</h3>

<br>
<i class='fa fa-spinner fa-pulse fa-5x'></i>

<?php header("refresh: 4; url=login_success.php"); ?>

</div>

<?php

//ENVOI EN BDD

  if (isset($_POST) && isset($_POST['defi']) && isset($_POST['description']) && isset($_POST['select']) && isset($_POST['chiffre'])) {
    if(!empty($_POST['defi']) && !empty($_POST['description']) && !empty($_POST['chiffre'])){

      extract($_POST);

      $ajout =  "Le ".date("d/m/Y")." à ".date("H:i:s");
      $valeur = "En attente de validation";

      mysqli_query($link , "INSERT INTO quests(expediteur, Type, defi, description, date, validation, bounty) VALUES ('$_SESSION[myusername]', '$select', '$defi', '$description', '$ajout', '$valeur', '$chiffre')");

      mysqli_close();
      
    }
  }
 

//PHPMAILERl

if (isset($_POST) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['select'])) {
  if(!empty($_POST['nom']) && !empty($_POST['description'])){


    extract($_POST);


    require "PHPMailer/class.phpmailer.php";

    $mail = new phpmailer();
    $mail->AddStringAttachment($download, 'Facture_'.$nom.'_'.$date.'.pdf');

    $mail->FromName = "Un challenge vient d'arriver !!";
    $mail->Subject = "$defi - Défi proposé";
    
    $body = "L'utilisateur $_SESSION[myusername] a proposé un défi, voici ses infos :\n\n\n
    Nom du défi:           $nom
    Sa description : $description\n\n\n\n\n


    J’accepte les CGV et donne expressément mandat à la société LEGASPHERE de saisir en mon nom et pour mon compte la juridiction compétente.\n\n\n

    Le robot achat PixOFHeaven.\n
    ---------------------------------------\n
    Ceci est un mail automatique, Merci de ne pas y répondre.";

    $mail->Body = $body;

    // Add a recipient address
    $mail->AddAddress('pixofheaven@gmail.com');

    if(!$mail->Send())
        echo ('');
    else
        echo ('');
    }
  }
}

?>