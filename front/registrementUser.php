<?php
session_start();
require_once '../include/database.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <?php include '../include/head_front.php' ?>
  <link href="../assets/css/registrementUser.css" rel="stylesheet"type="text/css">

  <title>Formulaire d'inscription</title>

</head>
<body>

<?php

require 'vendor/autoload.php';

if(isset($_POST['inscrire'])){
  $userNmae = $_POST['username'];
  $login = $_POST['login'];
  $pwd = $_POST['password'];
  $rpwd = $_POST['passwordc'];
  $role = $_POST['role'];
  define('USAGE', 'registrementUser');

  $requete = $pdo->prepare('SELECT * FROM utilisateur WHERE login = ? ');
  $requete->execute([$login]);

    // Vérification si le login existe
  if ($requete->rowCount() > 0) {
    ?>
      <div class="alert alert-danger" role="alert">
          Ce compte existe deja !
      </div>
    <?php

  }else{
    if (!empty($login) && !empty($pwd)) {
      if($pwd != $rpwd){
          ?>
      <div class="alert alert-danger" role="alert">
          Confirmation de mot de passe est incorrect !
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
          $requete = $pdo->prepare('SELECT * FROM utilisateur WHERE login = ? AND role= ?');
          $requete->execute([$login,$role]);
        
          // Générer un code de confirmation aléatoire
          $confirmationCode = bin2hex(random_bytes(32));

          $date = date('Y-m-d');
          $sqlState1 = $pdo->prepare('INSERT INTO utilisateur(login,password,date_creation,name,role,confirmation_token) VALUES(?,?,?,?,?,?)');
          $sqlState1->execute([$login, $pwd, $date, $userNmae, $role, $confirmationCode]);

    


          $sqlState2 = $pdo->prepare('SELECT * FROM utilisateur 
                                                                  WHERE login=?
                                                                  AND   password=?
                                                                  AND role=?');
            $sqlState2->execute([$login,$pwd,$role]);

            if($sqlState2->rowCount()>=1){
              $_SESSION['utilisateur'] = $sqlState2->fetch();

              if(isset($_SESSION['utilisateur'])){
                  $idUser = $_SESSION['utilisateur']['id']; 

                  ////////////////////

                  include 'PHPMailer.php';


                  //////////////////////



              }else{

                  ?>
                    <div class="alert alert-danger" role="alert">
                      La variable de session 'utilisateur' n'est pas définie !
                    </div>
                  <?php

                
              }
            }else{
                  ?>
                    <div class="alert alert-danger" role="alert">
                        Login ou password est incorrectes !
                    </div>
                  <?php
            }
          }    
      }
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Login , password sont obligatoires !
        </div>
        <?php
    }
  }

}

?>   
  <h1>Inscription</h1>

  <form method="post" autocomplete="off">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="email">Adresse e-mail:</label>
    <input type="email" id="email" name="login" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" min="8" required>
    
    <label for="confirm-password">Confirmez votre mot de passe:</label>
    <input type="password" id="confirm-password" name="passwordc" required>

    <input type="hidden" id="role" name="role" value="user" >
    
    <input type="submit" value="S'inscrire" name="inscrire">

    <a href="connexionUser.php" class="login-link">Déjà inscrit? Connectez-vous ici.</a>

  </form>
  
</body>
</html>