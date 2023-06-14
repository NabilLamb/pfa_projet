<?php
session_start();
require_once 'include/database.php';
$idContact = $_GET['id'];
$idAdmin = $_SESSION['admin']['id'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];
define('USAGE', 'RepondreClient');

$sqlState = $pdo->prepare('SELECT contact.*, utilisateur.* FROM contact
                          INNER JOIN utilisateur ON contact.id_utilisateur = utilisateur.id
                          WHERE contact.id = ?');
$sqlState->execute([$idContact]);
$contact = $sqlState->fetch(PDO::FETCH_ASSOC);
$login = $contact['login'];
if(isset($_POST['envoyer'])){
  try {
    $sqlState = $pdo->prepare('INSERT INTO reponse_admin(id_admin, id_contact, sujet, message)VALUES(?,?,?,?)');
    $sqlState->execute([$idAdmin,$idContact, $sujet, $message]);
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

  include 'PHPMailer.php';

}







?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contacter le client</title>
    <?php include 'include/head.php' ?>
    <?php include 'include/nav.php' ?>
    <link href="assets/css/message.css" rel="stylesheet"type="text/css">

</head>
  <body>
    <div class="container">
      <h1>Contactez le client</h1>
      <div class="user-data">
        <p><span class="title">Numero de message :</span> <?php echo $contact['id']?></p>
        <p><span class="title">Nom de client     :</span> <?php echo $contact['name']?></p>
        <p><span class="title">E-mail de client  :</span> <?php echo $contact['login']?></p>
        <hr>
        <p><span class="title">Sujet :</span> <?php echo $contact['sujet']?></p>
        <p><span class="title">Message :</span> <br> <?php echo $contact['message']?>
        </p>
        
        <button class="popup-btn">Contacter</button>
      </div>
    </div>
    <div class="overlay">
        <div class="popup">
            <span class="close">&times;</span>
            <h2>Contactez le client : </h2>
            <form method="POST">
            <label for="subject">Sujet :</label>
            <input type="text" id="subject" name="sujet">

            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>

            <input type="submit" value="Envoyer" name="envoyer">
            </form>
        </div>
    </div>

<script>
  // Récupération des éléments HTML
  const popupBtn = document.querySelector('.popup-btn');
  const overlay = document.querySelector('.overlay');
  const popup = document.querySelector('.popup');
  const close = document.querySelector('.close');

  // Fonction pour ouvrir la popup
  function openPopup() {
    overlay.style.display = 'block';
  }

  // Fonction pour fermer la popup
  function closePopup() {
    overlay.style.display = 'none';
  }

  // Ajout d'un écouteur d'événement sur le bouton d'ouverture de la popup
  popupBtn.addEventListener('click', openPopup);

  // Ajout d'un écouteur d'événement sur le bouton de fermeture de la popup
  close.addEventListener('click', closePopup);
</script>
</body>
</html>
