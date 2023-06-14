<?php
session_start();
require_once '../include/database.php';?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <?php include '../include/head_front.php' ?>
  <link href="../assets/css/connexionUser.css" rel="stylesheet"type="text/css">
  <title>Connexion</title>
 
</head>
<body>
<?php
if(isset($_POST['connecter'])){
  $login = $_POST['login'];
  $password = $_POST['password'];
  define('role','user');

  if(!empty($login) && !empty($password)){

    $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=? AND password=? AND role=?');
    $sqlState->execute([$login,$password,role]);

    if($sqlState->rowCount() > 0){
      $_SESSION['utilisateur'] = $sqlState->fetch();
      header('location:index.php');
    }else{
      ?>
      <div class="alert alert-danger" role="alert">
          Login ou password incorrectes.
      </div>
      <?php
    }


  }else{
    ?>
      <div class="alert alert-danger" role="alert">
          Login , password sont obligatoires
      </div>
      <?php
  }
}


?>


  <h1>Connexion</h1>
  <form method="post">
    <label for="login">Adresse e-mail:</label>
    <input type="email" id="email" name="login" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" value="Se connecter" name="connecter">
    
    <a href="findlogin.php" class="forgot-password-link">Mot de passe oublié?</a>
    
    <a href="registrementUser.php" class="register-link">Pas encore inscrit? Créez un compte ici.</a>
  </form>
</body>
</html>
