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

  <title>find login</title>

</head>
<body>
  <h1>Saisir votre e-mail</h1>


<?php

require 'vendor/autoload.php';

if(isset($_POST['continue'])){
  $login = $_POST['login'];
  $role = $_POST['role'];
  define('USAGE', 'findlogin');
  

  if (!empty($login)) {

    $requete = $pdo->prepare('SELECT * FROM utilisateur WHERE login = ? AND role= ?');
    $requete->execute([$login,$role]);

    // Vérification si le login existe
    if ($requete->rowCount() > 0) {
        //echo 'Le login existe dans la base de données';

        $_SESSION['utilisateur'] = $requete->fetch();
        $idUser = $_SESSION['utilisateur']['id'];
        include 'PHPMailer.php';

    } else {
        //echo 'Le login n\'existe pas dans la base de données';
        ?>
            <div class="alert alert-danger" role="alert">
                Ce compte n'existe pas ! <a href="registrementUser.php" class="login-link">Creer un nouveau compte</a>
            </div>
        <?php
    }
      
  }else {
    ?>
    <div class="alert alert-danger" role="alert">
        Login est obligatoire !
    </div>
    <?php
}

//header('location: connexionUser.php');

}

?>  
  <form method="post" autocomplete="off">
    
    
    <label for="email">Adresse e-mail:</label>
    <input type="email" id="email" name="login" required>
    
    <input type="hidden" id="role" name="role" value="user" >
    
    <input type="submit" value="Continue" name="continue">


  </form>
  
</body>
</html>