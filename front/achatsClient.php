<?php
try {
    session_start();
    require_once '../include/database.php';
    include '../include/nav_front.php';
    include '../include/head_front.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achats Client</title>
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Historique des achats</h1>

        <?php
            $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;

            $sql = "SELECT achats.id_achat, achats.id_produit, produit.libelle, produit.prix, produit.discount, achats.quantite, achats.date_achat, produit.image
                    FROM achats
                    INNER JOIN produit ON achats.id_produit = produit.id
                    WHERE achats.id_utilisateur = :idUtilisateur
                    ORDER BY achats.date_achat DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idUtilisateur', $idUtilisateur);
            $stmt->execute();
            $achats = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($achats) > 0) {
                echo '<div class="row">';
                foreach ($achats as $achat) {
                    $idAchat = $achat['id_achat'];
                    $idProduit = $achat['id_produit'];
                    $libelle = $achat['libelle'];
                    $prix = $achat['prix'];
                    $discount = $achat['discount'];
                    $quantite = $achat['quantite'];
                    $dateAchat = $achat['date_achat'];
                    $imagePath = '../upload/produit/' . $achat['image'];
        ?>

        <div class="col-md-4">
            <div class="card mb-4">
                <img src="<?php echo $imagePath; ?>" alt="<?php echo $libelle; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $libelle; ?></h5>
                    <p class="card-text">
                        <span class="info-label">Quantité:</span>
                        <span class="info-value">x<?php echo $quantite; ?></span>
                    </p>
                    <p class="card-text">
                        <span class="info-label">Prix unitaire:</span>
                        <span class="info-value"><?php echo $prix; ?><i class="fa fa-solid fa-dollar"></i></span>
                    </p>
                    <p class="card-text">
                        <span class="info-label">Discount:</span>
                        <span class="info-value"><?php echo $discount; ?>%</span>
                    </p>
                    <p class="card-text">
                        <span class="info-label">Date d'achat:</span>
                        <span class="info-value"><?php echo $dateAchat; ?></span>
                    </p>
                    <a href="produit.php?id=<?php echo $idProduit; ?>" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        </div>



        <?php
                }
                echo '</div>';
            } else {
                echo '<p>Aucun achat effectué.</p>';
            }
        ?>
    </div>
</body>
</html>

<?php
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
