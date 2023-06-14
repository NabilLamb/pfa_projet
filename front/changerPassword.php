<?php

session_start();
require_once '../include/database.php';

  $idUser = $_GET['id'];
  $pwd = $_POST['new-password'];
  $rpwd = $_POST['confirm-password'];
  $confirmed = 1;
 

if(isset($_POST['changer'])){


  if (!empty($pwd) && !empty($rpwd)) {
    if($pwd != $rpwd){
        ?>
          <div class="alert alert-danger" role="alert">
              Password Confirmation is not correct !
          </div>       
        <?php

    }else{
    
      if(strlen($pwd)< 8){

        ?>
        <div class="alert alert-danger" role="alert">
            Mot de passe doit contenir plus de 8 caracteres !
        </div>       
            <?php

      }else{

        $sqlState = $pdo->prepare('UPDATE utilisateur SET password = ?, confirmed = ? WHERE id = ?');
        $sqlState->execute([$pwd, $confirmed, $idUser]);


        if ($sqlState->rowCount() > 0) {     
          ?>
          <div class="alert alert-danger" role="alert">
            Votre mot de passe a ete change par succes !
          </div>  
          <?php

          header('Location: connexionUser.php');
          exit();
      }
    }

    }
  }else{
    ?>

    <div class="alert alert-danger" role="alert">
        Password Confirmation is not correct ! 
    </div> 
    
    <?php


  }

}

 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" href="../assets/css/changerPassword.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="success-message">Changer votre mot de passe</h1>
      <form method="post">

        <label for="new-password">Nouveau mot de passe:</label>
        <input type="password" name="new-password" id="new-password" required>

        <label for="confirm-password">Confirmez le nouveau mot de passe:</label>
        <input type="password" name="confirm-password" id="confirm-password" required>

        <input type="submit" value="Changer le mot de passe" name="changer">

        <a href="registrementUser.php" class="btn">Sign up</a>
        <a href="connexionUser.php" class="btn">Sign in</a>
      </form>
      
    </div>
  </body>
</html>
