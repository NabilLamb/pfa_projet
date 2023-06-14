<?php 
include 'include/head.php';
include 'include/nav.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Statistiques d'achats</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .graph-container {
            width: 50%;
            margin-right: 3%;
        }
    </style>
</head>
<body>

<?php include 'infos_dashboard.php';?>
    <div class="container">
        <div class="graph-container">
            <h2>Statistiques d'achats par produit</h2>
            <canvas id="productChart"></canvas>
        </div>



        <div class="graph-container">
            <h2>Statistiques d'achats par catégorie</h2>
            <canvas id="categoryChart"></canvas>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="graph-container">
            <h2>Produits favoris</h2>
            <canvas id="favoriteProductsChart"></canvas>
        </div>

        <div class="graph-container">
            <h2>Catégories les plus favorisées</h2>
            <canvas id="favoriteCategoriesChart"></canvas>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="graph-container">
            <h2>Ratings par nombre d'utilisateurs</h2>
            <canvas id="ratingUsersChart"></canvas>
        </div>

        <div class="graph-container">
            <h2>Ratings par nombre de commandes</h2>
            <canvas id="ratingOrdersChart"></canvas>
        </div>
    </div>


    <?php

    try {

        require_once 'include/database.php';
        
        // Requête SQL pour récupérer le nombre d'achats par produit avec les libellés des produits
        $productQuery = "SELECT p.libelle AS libelle_produit, COUNT(a.id_produit) AS total_achats FROM produit AS p
                  LEFT JOIN achats AS a ON p.id = a.id_produit
                  GROUP BY p.id";
        $productStmt = $pdo->prepare($productQuery);
        $productStmt->execute();

        // Tableaux pour stocker les données du graphe par produit
        $productLabels = [];
        $productData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $productStmt->fetch(PDO::FETCH_ASSOC)) {
            $productLabels[] = $row['libelle_produit'];
            $productData[] = $row['total_achats'];
        }

        // Requête SQL pour récupérer le nombre d'achats par catégorie
        $categoryQuery = "SELECT c.libelle AS libelle_categorie, COUNT(*) AS total_achats FROM achats AS a
                  INNER JOIN produit AS p ON a.id_produit = p.id
                  INNER JOIN categorie AS c ON p.id_categorie = c.id
                  GROUP BY p.id_categorie";
        $categoryStmt = $pdo->prepare($categoryQuery);
        $categoryStmt->execute();

        // Tableaux pour stocker les données du graphe par catégorie
        $categoryLabels = [];
        $categoryData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $categoryStmt->fetch(PDO::FETCH_ASSOC)) {
            $categoryLabels[] = $row['libelle_categorie'];
            $categoryData[] = $row['total_achats'];
        }

        //

        // Requête SQL pour récupérer les produits favoris avec le nombre d'utilisateurs les ayant ajoutés
        $favoriteProductsQuery = "SELECT p.libelle AS libelle_produit, COUNT(pf.idUtilisateur) AS total_utilisateurs FROM produit AS p
        LEFT JOIN produitsfavoris AS pf ON p.id = pf.idProduit
        GROUP BY p.id
        ORDER BY total_utilisateurs DESC";
        $favoriteProductsStmt = $pdo->prepare($favoriteProductsQuery);
        $favoriteProductsStmt->execute();

        // Tableaux pour stocker les données du graphe des produits favoris
        $favoriteProductsLabels = [];
        $favoriteProductsData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $favoriteProductsStmt->fetch(PDO::FETCH_ASSOC)) {
        $favoriteProductsLabels[] = $row['libelle_produit'];
        $favoriteProductsData[] = $row['total_utilisateurs'];
        }

        // Requête SQL pour récupérer les catégories les plus favorisées avec le nombre de produits favoris
        $favoriteCategoriesQuery = "SELECT c.libelle AS libelle_categorie, COUNT(pf.idProduit) AS total_produits_favoris FROM categorie AS c
        LEFT JOIN produit AS p ON c.id = p.id_categorie
        LEFT JOIN produitsfavoris AS pf ON p.id = pf.idProduit
        GROUP BY c.id
        ORDER BY total_produits_favoris DESC";
        $favoriteCategoriesStmt = $pdo->prepare($favoriteCategoriesQuery);
        $favoriteCategoriesStmt->execute();

        // Tableaux pour stocker les données du graphe des catégories favorisées
        $favoriteCategoriesLabels = [];
        $favoriteCategoriesData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $favoriteCategoriesStmt->fetch(PDO::FETCH_ASSOC)) {
        $favoriteCategoriesLabels[] = $row['libelle_categorie'];
        $favoriteCategoriesData[] = $row['total_produits_favoris'];
        }


        //

        // Requête SQL pour récupérer le nombre d'utilisateurs par rating
        $ratingUsersQuery = "SELECT rating, COUNT(DISTINCT idUtilisateur) AS total_utilisateurs FROM feedback GROUP BY rating";
        $ratingUsersStmt = $pdo->prepare($ratingUsersQuery);
        $ratingUsersStmt->execute();

        // Tableaux pour stocker les données du graphe des ratings par nombre d'utilisateurs
        $ratingLabels = [];
        $ratingData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $ratingUsersStmt->fetch(PDO::FETCH_ASSOC)) {
            $ratingLabels[] = $row['rating'];
            $ratingData[] = $row['total_utilisateurs'];
        }

        // Requête SQL pour récupérer le nombre de commandes par rating
        $ratingOrdersQuery = "SELECT rating, COUNT(*) AS total_commandes FROM feedback GROUP BY rating";
        $ratingOrdersStmt = $pdo->prepare($ratingOrdersQuery);
        $ratingOrdersStmt->execute();

        // Tableaux pour stocker les données du graphe des ratings par nombre de commandes
        $ratingOrdersLabels = [];
        $ratingOrdersData = [];

        // Récupérer les données de la requête et les stocker dans les tableaux
        while ($row = $ratingOrdersStmt->fetch(PDO::FETCH_ASSOC)) {
            $ratingOrdersLabels[] = $row['rating'];
            $ratingOrdersData[] = $row['total_commandes'];
        }

        //
        echo '<br><hr><br>';
        include 'comments.php';
        // Fermer la connexion à la base de données
       
        
        $pdo = null;
    } catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    
    ?>
<!--  -->
<script>
    var productCtx = document.getElementById('productChart').getContext('2d');
    var productChart = new Chart(productCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($productLabels); ?>,
            datasets: [{
                label: 'Nombre d\'achats',
                data: <?php echo json_encode($productData); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<script>
    var categoryCtx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(categoryCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($categoryLabels); ?>,
            datasets: [{
                label: 'Nombre d\'achats',
                data: <?php echo json_encode($categoryData); ?>,
                backgroundColor: 'rgba(204, 230, 186, 0.8)',
                borderColor: 'rgba(168, 213, 139, 0.8)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<!--  -->

<script>
    var favoriteProductsCtx = document.getElementById('favoriteProductsChart').getContext('2d');
    var favoriteProductsChart = new Chart(favoriteProductsCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($favoriteProductsLabels); ?>,
            datasets: [{
                label: 'Nombre d\'utilisateurs',
                data: <?php echo json_encode($favoriteProductsData); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<script>
    var favoriteCategoriesCtx = document.getElementById('favoriteCategoriesChart').getContext('2d');
    var favoriteCategoriesChart = new Chart(favoriteCategoriesCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($favoriteCategoriesLabels); ?>,
            datasets: [{
                label: 'Nombre de produits favoris',
                data: <?php echo json_encode($favoriteCategoriesData); ?>,
                backgroundColor: 'rgba(235, 209, 222, 0.8)',
                borderColor: 'rgba(225, 164, 195, 0.8)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<!--  -->

<script>
    var ratingUsersCtx = document.getElementById('ratingUsersChart').getContext('2d');
    var ratingUsersChart = new Chart(ratingUsersCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($ratingLabels); ?>,
            datasets: [{
                label: 'Nombre d\'utilisateurs',
                data: <?php echo json_encode($ratingData); ?>,
                fill: true,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>

<script>
    var ratingOrdersCtx = document.getElementById('ratingOrdersChart').getContext('2d');
    var ratingOrdersChart = new Chart(ratingOrdersCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($ratingOrdersLabels); ?>,
            datasets: [{
                label: 'Nombre de commandes',
                data: <?php echo json_encode($ratingOrdersData); ?>,
                backgroundColor: 'rgba(236, 235, 152, 0.8)',
                borderColor: 'rgba(203, 226, 56, 0.8)',
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
</script>

</body>
</html>