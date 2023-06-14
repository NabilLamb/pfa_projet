<?php
require_once 'include/database.php';
try {
    $id = $_GET['id'];
    $sqlState = $pdo->prepare('DELETE FROM produit WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    if ($supprime) {
        header('location: produits.php');
    } else {
        echo "Erreur lors de la suppression de la ligne.";    
    }
} catch (PDOException $e) {
    echo "Erreur lors de la suppression de la ligne : " . $e->getMessage();
} catch (Exception $e) {
    echo "Une erreur s'est produite : " . $e->getMessage();
}
?>
