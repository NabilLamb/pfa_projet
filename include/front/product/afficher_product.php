<?php
foreach ($produits as $produit) {
    $idProduit = $produit->id;
    // var_dump($idProduit);
    include 'showProduct.php';
}
if (empty($produits)) {
    ?>
    <div class="alert alert-info" role="alert">
        Pas de produits pour l'instant
    </div>

    <?php
}

?>