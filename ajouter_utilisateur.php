<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php';
    require_once 'include/database.php'; ?>
    <title>Ajouter utilisateur</title>
</head>
<body>
    <?php

    if (isset($_POST['ajouter'])) {
        $userNmae = $_POST['username'];
        $login = $_POST['login'];
        $pwd = $_POST['password'];
        $rpwd = $_POST['passwordc'];
        $role = $_POST['role'];
        define('USAGE', 'ajouter_utilisateur');



        if (!empty($login) && !empty($pwd)) {
            if($pwd != $rpwd || strlen($pwd)< 8){
                ?>
            <div class="alert alert-danger" role="alert">
                Password Confirmation is not correct !
            </div>       
                <?php

            }else{
                
                $requete = $pdo->prepare('SELECT * FROM utilisateur WHERE login = ? AND role= ?');
                $requete->execute([$login,$role]);

                // Vérification si le login existe
                if ($requete->rowCount() > 0) {

                ?>
                    <div class="alert alert-danger" role="alert">
                        Ce compte existe deja !
                    </div>
                <?php
                    
                }else{
                    $date = date('Y-m-d');
                    $confirmationCode = bin2hex(random_bytes(32));
                    $sqlState = $pdo->prepare('INSERT INTO utilisateur(login,password,date_creation,name,role,confirmation_token) VALUES(?,?,?,?,?,?)');
                    $sqlState->execute([$login, $pwd, $date, $userNmae, $role, $confirmationCode]);
                    
                    $sqlState2 = $pdo->prepare('SELECT * FROM utilisateur 
                                                                    WHERE login=?
                                                                    AND   password=?
                                                                    AND role=?');
                    $sqlState2->execute([$login,$pwd,$role]);

                    if($sqlState2->rowCount()>=1){
                        $_SESSION['admin'] = $sqlState2->fetch();

                        if(isset($_SESSION['admin'])){
                            $idUser = $_SESSION['admin']['id']; 
        
                            ////////////////////
        
                            include 'PHPMailer.php';
        
        
                            //////////////////////
        
        
        
                        }else{
                        echo "La variable de session 'utilisateur' n'est pas définie.";
                        }
                    }else{
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Login ou password est incorrectes
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
    ?>
    <h1>Ajouter un Admin</h1>
    <form method="post" autocomplete="off">

        <label class="form-label">User Name</label>
        <input type="text" class="form-control" name="username">

        <label class="form-label">e-mail</label>
        <input type="text" class="form-control" name="login">

        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">

        <label class="form-label">Password Confirmation</label>
        <input type="password" class="form-control" name="passwordc">

        <input type="hidden" class="form-control" name="role" value="admin">

        <input type="submit" value="Ajouter utilisateur" class="btn btn-primary my-2" name="ajouter">

        <a href="connexion.php" class="register-link">Déjà inscrit? Connectez-vous ici.</a>

    </form>


</body>
</html>