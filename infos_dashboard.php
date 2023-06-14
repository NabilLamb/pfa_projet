<?php

// Fonction pour exécuter une requête SQL et récupérer le résultat
function executeQuery($pdo, $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Nombre d'utilisateurs
$resultUtilisateurs = executeQuery($pdo, "SELECT COUNT(*) AS nombre_utilisateurs FROM utilisateur");
$nombreUtilisateurs = $resultUtilisateurs['nombre_utilisateurs'];

// Nombre de produits
$resultProduits = executeQuery($pdo, "SELECT COUNT(*) AS nombre_produits FROM produit");
$nombreProduits = $resultProduits['nombre_produits'];

// Nombre de catégories
$resultCategories = executeQuery($pdo, "SELECT COUNT(*) AS nombre_categories FROM categorie");
$nombreCategories = $resultCategories['nombre_categories'];

// Nombre de commandes
$resultCommandes = executeQuery($pdo, "SELECT COUNT(*) AS nombre_commandes FROM commande");
$nombreCommandes = $resultCommandes['nombre_commandes'];

// Nombre de produits favoris
$resultProduitsFavoris = executeQuery($pdo, "SELECT COUNT(*) AS nombre_produits_favoris FROM produitsfavoris");
$nombreProduitsFavoris = $resultProduitsFavoris['nombre_produits_favoris'];

// Prix total des achats
$resultPrixTotal = executeQuery($pdo, "SELECT SUM(total) AS prix_total_achats FROM commande");
$prixTotalAchats = $resultPrixTotal['prix_total_achats'];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="assets/css/info_dashboard.css" rel="stylesheet" type="text/css">
    <title>Statistiques eCommerce</title>
</head>
<body>
    <h1>Statistiques eCommerce</h1>

    <div class="card-container">
        <div class="card blue" data-title="Nombre d'utilisateurs">
            <i class="fas fa-users"></i>
            <div><?php echo $nombreUtilisateurs; ?></div>
        </div>

        <div class="card green" data-title="Nombre de produits">
            <i class="fas fa-cubes"></i>
            <div><?php echo $nombreProduits; ?></div>
        </div>

        <div class="card yellow" data-title="Nombre de catégories">
            <i class="fas fa-list"></i>
            <div><?php echo $nombreCategories; ?></div>
        </div>

        <div class="card red" data-title="Nombre de commandes">
            <i class="fas fa-shopping-cart"></i>
            <div><?php echo $nombreCommandes; ?></div>
        </div>

        <div class="card purple" data-title="Nombre de produits favoris">
            <i class="fas fa-heart"></i>
            <div><?php echo $nombreProduitsFavoris; ?></div>
        </div>

        <div class="card cyan" data-title="Prix total des achats">
            <i class="fas fa-dollar-sign"></i>
            <div><?php echo $prixTotalAchats; ?></div>
        </div>
    </div>
</body>
</html>


