
<?php

require_once 'include/database.php';

$idUser = $_GET['id'];
$confirmed = 1;


$sqlState = $pdo->prepare('UPDATE utilisateur SET confirmed = ? WHERE id = ?');
$sqlState->execute([$confirmed,$idUser]);

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Message de confirmation</title>
    <link rel="stylesheet" href="assets/css/verficationEmailSuccess.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="success-message">Votre email a été vérifié avec succès!</h1>
      <p class="description">
        Merci de votre confirmation. Vous pouvez maintenant se diriger vers le cote Admin en cliquant sur le bouton ci-dessous.
      </p>
      <a href="index.php" class="btn">Accéder en tant que Admin</a>
    </div>
  </body>
</html>


