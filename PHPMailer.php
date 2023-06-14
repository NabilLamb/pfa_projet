<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'nabil22business@gmail.com';
$mail->Password = 'tpvkchehvsbcquru';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('nabil22business@gmail.com');

$mail->addAddress($login);

$mail->isHTML(true);

if(USAGE == 'RepondreClient'){

    $mail->Subject = $sujet;



    $mail->Body = $message;

    $mail->send();

}
if(USAGE == 'ajouter_utilisateur'){


    $mail->Subject = "Message de confirmation de compte en tant que Admin";

                // Créer le lien complet
    $lien = 'http://localhost/pfa_projet/verificationEmailSuccess.php?id='.$idUser;

    // Ajouter le lien à la chaîne de caractères du corps du message en utilisant la balise <a>
    $mail->Body = "Pour confirmer votre compte, veuillez cliquer sur <a href='$lien'>ce lien</a>.";

    $mail->send();

    echo "
    <script>
    if (confirm('Vous voulez confirmer votre e-mail ?')) {    
        alert('Nous vous demandons de vous connecter à votre compte email et de confirmer votre compte pour effectuer la vérification de votre compte.');
        document.location.href = 'http://gmail.com';
      } else {
        alert('Action annulée.');
      }
      
    </script>"; 

}
if(USAGE == 'findlogin'){
    
    $mail->Subject = "Message de confirmation de compte";

    // Créer le lien complet
    $lien = 'http://localhost/pfa_projet/changerPassword.php?id='.$idUser;

    // Ajouter le lien à la chaîne de caractères du corps du message en utilisant la balise <a>
    $mail->Body = "Pour changer votre mot de passe, veuillez cliquer sur <a href='$lien'>ce lien</a>.";

    $mail->send();

    echo "
    <script>
    if (confirm('Vous voulez changer votre mot de passe ?')) {
    alert('Nous vous demandons de vous connecter à votre compte email et de confirmer votre compte pour changer votre mot de passe.');
    document.location.href = 'http://gmail.com';
    } else {
    alert('Action annulée.');
    }
    </script>";
}


?>