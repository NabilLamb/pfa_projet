<?php
require_once 'include/database.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    // Récupérer le fichier téléchargé
    $file = $_FILES['file']['tmp_name'];
    $dateE = date('Y-m-d');
    // Charger le fichier Excel
    $objPHPExcel = IOFactory::load($file);
    $worksheet = $objPHPExcel->getActiveSheet();
    $worksheetArray = $worksheet->toArray();

    // Parcourir les lignes du fichier Excel
    $uploadDirectory = 'upload/produit/'; // Spécifiez le répertoire de destination pour les images
    for ($row = 0; $row < count($worksheetArray); $row++) {
        $productNameE = $worksheetArray[$row][0];
        $prixE = $worksheetArray[$row][1];
        $discountE = $worksheetArray[$row][2];
        $idCategorieE = $worksheetArray[$row][3];
        $descriptionE = $worksheetArray[$row][4];

        $imageName = $_FILES['file']['name'] . '_' . uniqid() . '_' . $worksheetArray[$row][5]; // Générer un nom de fichier unique
        $imagePath = $uploadDirectory . $imageName;
        move_uploaded_file($_FILES['file']['tmp_name'], $imagePath); // Déplacer le fichier image vers le répertoire de destination
        // Insérer les données dans la base de données
        $sqlState = $pdo->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?)');
        $inserted = $sqlState->execute([$productNameE, $prixE, $discountE, $idCategorieE, $dateE, $descriptionE, $imageName]);
        if ($inserted) {
            header('location: produits.php');
        } else {
            $errorInfo = $sqlState->errorInfo();
            ?>
                    <div class="alert alert-danger" role="alert">
                        Erreur lors de l'insertion des données dans la base de données.
                    </div>
                    <?php
        }
    }
}
?>