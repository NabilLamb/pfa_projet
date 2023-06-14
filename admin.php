<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php' ?>
    <title>Admin <?php echo $_SESSION['admin']['id']?></title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    <?php
        if(!isset($_SESSION['admin'])){
            header('location: connexion.php');
        }
    ?>
        <h3> Bonjour <?php echo $_SESSION['admin']['name'] ?></h3>
</div>
</body>
</html>