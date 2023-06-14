<?php

$sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES';
$total = 0;
$prixProduits = [];
foreach ($produits as $produit) {
    $idProduit = $produit['id'];
    $qty = $panier[$idProduit];
    $discount = $produit['discount'];
    $prix = calculerRemise($produit['prix'], $discount);
    $total += $qty * $prix;

    $prixProduits[$idProduit] = [ //pour le produit actuel (line par line) pour l'inserer dans table line_commande
        'id' => $idProduit,
        'prix' => $prix,
        'total' => $qty * $prix,
        'qty' => $qty
    ];
}

$sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
$sqlStateCommande->execute([$idUtilisateur, $total]);
$idCommande = $pdo->lastInsertId();

$args = [];
foreach ($prixProduits as $produit) {
    $id = $produit['id'];
    $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id),"; // pour pas executer la requete dans le boucle.
}

$sql = substr($sql, 0, -1); // pour supprimer la dernier caracter (,) de $sql

$sqlState = $pdo->prepare($sql);
foreach ($prixProduits as $produit) {
    $id = $produit['id'];
    $sqlState->bindParam(':id' . $id, $produit['id']);
    $sqlState->bindParam(':prix' . $id, $produit['prix']);
    $sqlState->bindParam(':qty' . $id, $produit['qty']);
    $sqlState->bindParam(':total' . $id, $produit['total']);
}
$inserted = $sqlState->execute();
// var_dump($sqlState->errorInfo());
if ($inserted) {
    $_SESSION['panier'][$idUtilisateur] = [];
    header('location: panier.php?success=true&total=' . $total);
} else {
    ?>
    <div class="alert alert-error" role="alert">
        Erreur (contactez l'administrateur).
    </div>
    <?php
}

?>