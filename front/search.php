<?php
require_once '../include/database.php';

if (isset($_POST["query"])) {
    $str = $_POST["query"];
    $sth = $pdo->prepare("SELECT * FROM `produit` WHERE libelle LIKE '%$str%'");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    if ($sth->rowCount() > 0) {
        $count = 0; // Compteur pour alterner les couleurs
        echo '<ul>'; // Commencez la liste
        while ($row = $sth->fetch()) {
            $count++;
            $class = $count % 2 === 0 ? 'even' : 'odd'; // Classe CSS pour la couleur de fond
			echo '<li class="product ' . $class . '" data-id="' . $row->id . '">' . ltrim($row->libelle, '.') . '</li>';
        }
        echo '</ul>'; // Terminez la liste
    } else {
        echo "No results found";
    }
}
?>
