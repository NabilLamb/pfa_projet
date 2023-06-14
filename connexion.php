
<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Connexion</title>
</head>
<body>
    <?php
        if(isset($_POST['connexion'])){
            $login = $_POST['login'];
            $pwd   = $_POST['password'];
            define('role','admin');

            if(!empty($login) && !empty($pwd)){
                require_once 'include/database.php';
                $sqlState = $pdo->prepare('SELECT * FROM utilisateur 
                                                WHERE login=?
                                                AND   password=?
                                                AND role=?');
                $sqlState->execute([$login,$pwd,role]);
                if($sqlState->rowCount()>=1){
                    $_SESSION['admin'] = $sqlState->fetch();
                    header('location: admin.php');
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Login ou password incorrectes, (ou vous etes pas Admin)
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


    <h1>Connexion Admin</h1>
    <form method="post">
    <label for="login">Adresse e-mail:</label>
    <input type="email" id="email" name="login" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" value="Se connecter" name="connexion">
    
    <a href="findlogin.php" class="forgot-password-link">Mot de passe oublié?</a>
    
    <a href="ajouter_utilisateur.php" class="register-link">Pas encore inscrit? Créez un compte ici.</a>
  </form>

</body>
</html>