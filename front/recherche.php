<?php

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	if (empty($str)) {
		$sth = $pdo->prepare("SELECT * FROM `produit`");
	} else {
		$sth = $pdo->prepare("SELECT * FROM `produit` WHERE libelle LIKE '%$str%'");
	}

	$sth->setFetchMode(PDO::FETCH_OBJ);
	$sth->execute();

	if ($sth->rowCount() > 0) {

        while ($produit = $sth->fetch()) {


            $idProduit = $produit->id;

            include 'showProduct.php';      
        
        }
		
			
		
	} else {
		echo "No results found";
	}
}
?>

<!--  -->
