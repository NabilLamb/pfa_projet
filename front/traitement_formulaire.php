<?php
// Connexion à la base de données
require_once '../include/database.php';

// Récupération des données du formulaire
$idProduit = $_POST['idProduit'];
$idUtilisateur = $_POST['idUtilisateur'];

// Vérification si l'entrée existe déjà dans la table produitsfavoris
$sql = "SELECT id FROM produitsfavoris WHERE idProduit = :idProduit AND idUtilisateur = :idUtilisateur";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idProduit', $idProduit);
$stmt->bindParam(':idUtilisateur', $idUtilisateur);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // L'entrée existe déjà, donc nous devons la supprimer
    $sql = "DELETE FROM produitsfavoris WHERE idProduit = :idProduit AND idUtilisateur = :idUtilisateur";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProduit', $idProduit);
    $stmt->bindParam(':idUtilisateur', $idUtilisateur);
    if ($stmt->execute()) {
        echo "Entrée supprimée avec succès de la table produitsfavoris.";
    } else {
        echo "Erreur lors de la suppression de l'entrée : " . $stmt->errorInfo()[2];
    }
} else {
    // L'entrée n'existe pas, nous devons l'ajouter
    $sql = "INSERT INTO produitsfavoris (idProduit, idUtilisateur, dateAjout) VALUES (:idProduit, :idUtilisateur, CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idProduit', $idProduit);
    $stmt->bindParam(':idUtilisateur', $idUtilisateur);
    if ($stmt->execute()) {
        echo "Entrée ajoutée avec succès dans la table produitsfavoris.";
    } else {
        echo "Erreur lors de l'ajout de l'entrée : " . $stmt->errorInfo()[2];
    }
}

// Fermeture de la connexion à la base de données
$stmt = null;
$pdo = null;
?>
