<?php
session_start();
require_once '../include/database.php';
include '../include/head_front.php';
include '../include/nav_front.php';
if(isset($_POST['envoyer'])){
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $idUser = $_SESSION['utilisateur']['id'];

    $sqlState = $pdo->prepare('INSERT INTO contact(id_utilisateur, sujet, message) VALUES(?,?,?)');
    $inserted = $sqlState->execute([$idUser,$subject,$message]);

    if($inserted){
        ?>
        <div class="alert alert-success" role="alert">
            Merci d'avoir envoyé votre message ! Nous avons bien reçu votre demande et nous vous répondrons par e-mail dans les plus brefs délais. Nous apprécions votre patience et votre intérêt pour notre service.
        </div>
        <?php
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulaire de contact</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
			max-width: 500px;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Formulaire de contact</h1>
		<form method="post" action="">
			<p>Nous sommes toujours à votre disposition pour répondre à toutes vos questions et résoudre tout problème que vous pourriez rencontrer. Votre satisfaction est notre priorité.</p>
			<div class="form-group">
				<label for="subject">Sujet :</label>
				<input type="text" id="subject" name="subject" class="form-control">
			</div>
			<div class="form-group">
				<label for="message">Message :</label>
				<textarea id="message" name="message" rows="5" class="form-control" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
		</form>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>