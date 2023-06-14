<?php
session_start();
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Favoris Produits</title>
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php include '../include/nav_front.php' ?>

<div class="container py-2">
    <?php
    // Récupérer l'ID de l'utilisateur connecté
    $idUser = $_SESSION['utilisateur']['id'];

    // Requête pour récupérer les produits favoris de l'utilisateur, triés par date d'ajout
    $query = "SELECT produit.* FROM produit
              INNER JOIN produitsfavoris ON produit.id = produitsfavoris.idProduit
              WHERE produitsfavoris.idUtilisateur = :idUser
              ORDER BY produitsfavoris.dateAjout DESC";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
    $stmt->execute();
    $produitsFavoris = $stmt->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
            if (empty($_POST["submit"])) {
                ?>
                <div class="col mt-4">
                    <div class="row">
                        <?php
                        foreach ($produitsFavoris as $produit) {
                            $idProduit = $produit->id;
                            include 'showProduct.php';
                        }
                        if (empty($produitsFavoris)) {
                            ?>
                            <div class="alert alert-info" role="alert">
                                Pas de produits favoris pour l'instant
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="col mt-4">
                    <div class="row">
                        <?php include 'recherche.php'; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>
