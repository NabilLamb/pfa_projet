<?php
session_start();
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Panier</title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <?php
    if (isset($_POST['vider'])) {
        $_SESSION['panier'][$idUtilisateur] = [];
        header('location: panier.php');
    }
    $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;
    $panier = $_SESSION['panier'][$idUtilisateur] ?? [];

    if (!empty($panier)) {
        $idProduits = array_keys($panier);
        $idProduits = implode(',', $idProduits);
        $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
    }

    if(isset($_GET['is_success'])){

         // Insertion des données des produits du panier dans la table "achats"
         try{
            foreach ($panier as $idProduit => $quantite) {
                $sqlInsert = "INSERT INTO achats (id_utilisateur, id_produit, date_achat, quantite)
                            VALUES (:idUtilisateur, :idProduit, NOW(), :quantite)";
                $stmt = $pdo->prepare($sqlInsert);
                $stmt->bindParam(':idUtilisateur', $idUtilisateur);
                $stmt->bindParam(':idProduit', $idProduit);
                $stmt->bindParam(':quantite', $quantite);
                $stmt->execute();
            }
        }catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total,id_utilisateur) VALUES';
        $total = 0;
        $prixProduits = [];
        foreach ($produits as $produit) {
            $idProduit = $produit['id'];
            $qty = $panier[$idProduit];
            $discount = $produit['discount'];
            $prix = calculerRemise($produit['prix'], $discount);

            $total += $qty * $prix;
            $prixProduits[$idProduit] = [
                'id' => $idProduit,
                'prix' => $prix,
                'total' => $qty * $prix,
                'qty' => $qty
            ];
        }
        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
        $sqlStateCommande->execute([$idUtilisateur, $total]);
        $idCommande = $pdo->lastInsertId();
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id, '$idUtilisateur'),";
        }
        $sql = substr($sql, 0, -1);
        $sqlState = $pdo->prepare($sql);
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sqlState->bindParam(':id' . $id, $produit['id']);
            $sqlState->bindParam(':prix' . $id, $produit['prix']);
            $sqlState->bindParam(':qty' . $id, $produit['qty']);
            $sqlState->bindParam(':total' . $id, $produit['total']);
        }
        $inserted = $sqlState->execute();
        if ($inserted) {
            $_SESSION['panier'][$idUtilisateur] = [];
            header('location: panier.php?success=true&total=' . $total . '&idCommande=' . $idCommande);
        } else {
            ?>
            <div class="alert alert-error" role="alert">
                Erreur (contactez l'administrateur).
            </div>
            <?php
        }


    }
    if (isset($_GET['success'])) {

        ?>
        <h1>Merci ! </h1>
        <div class="alert alert-success" role="alert">
            Votre commande avec le montant <strong>(<?php echo $_GET['total'] ?? 0 ?>)</strong> <i class="fa fa-solid fa-dollar"></i> est bien ajoutée.
            <a class="btn btn-success btn-sm" href="./index.php">Acheter des produits</a>
        </div>
        <hr>
        <?php
        
        include 'feedback.php';

    }
    if (!isset($_GET['success'])) {

        ?>
        <h4>Panier (<?php echo $productCount; ?>)</h4>
        <?php
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (empty($panier)) {
                if (!isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre panier est vide !
                        Commençez vos achats <a class="btn btn-success btn-sm" href="./index.php">Acheter des
                            produits</a>
                    </div>
                    <?php
                }
            } else {

                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Remise</th>
                        <th scope="col"><i class="fa fa-percent"></i> prix remise</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($produits as $produit) {
                        $idProduit = $produit['id'];
                        $totalProduit = calculerRemise($produit['prix'], $produit['discount']) * $panier[$idProduit];
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit['id'] ?></td>
                            <td><img width="80px" src="../upload/produit/<?php echo $produit['image'] ?>" alt=""></td>
                            <td><?php echo $produit['libelle'] ?></td>
                            <td><?php include '../include/front/counter.php' ?></td>
                            <td><strike><?php echo $produit['prix'] ?> <i class="fa fa-solid fa-dollar"></i></strike></td>
                            <td> - <?= $produit['discount'] ?> %</td>
                            <td><?php echo calculerRemise($produit['prix'], $produit['discount']) ?> <i class="fa fa-solid fa-dollar"></i></td>
                            <td> <?php echo $totalProduit ?> <i class="fa fa-solid fa-dollar"></i></td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tfoot>
                    <tr>
                        <td colspan="7" align="right"><strong>Total</strong></td>
                        <td><?php echo $total ?> <i class="fa fa-solid fa-dollar"></i></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right" style="text-align: right;">
                                <div style="display: flex; justify-content: space-between;">
                                    <form method="post" style="display: inline-block; margin-left: auto;">
                                        <input onclick="return confirm('Voulez vous vraiment vider le panier ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le panier" style="height: 35px;">
                                        <input type="hidden" value="1" name="pay">  
                                    </form>
                                    <?php
                                    require('stripe/config.php');
                                    ?>
                                    <form action="stripe/submit.php" method="post" style="display: inline-block; margin-left: 10px;">
                                        <script 
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                                            data-key="<?php echo $publishableKey?>" 
                                            data-amount="<?php echo $total ?>"
                                            data-name="<?php echo $_SESSION['utilisateur']['name']?>"
                                            data-description="Acheter par carte" 
                                            data-image="../upload/paymentStripe.jpg" 
                                            data-currency="dol" 
                                            data-email="<?php echo $_SESSION['utilisateur']['login']?>">
                                        </script>
                                    </form>
                                </div>
                            </td>
                    </tr>
                    </tfoot>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>